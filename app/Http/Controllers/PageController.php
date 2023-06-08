<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Like;
use App\Models\Order;
use App\Models\PaymentMethod;
use App\Models\Product;
use App\Models\Shipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function home()
    {
        $categories = Category::all();
        $products = Product::all()->groupBy('category_id');
        return view('customer.home', compact('categories','products'));
    }

    public function shop()
    {
        $categories = Category::all();
        $query = Product::query();
        if(request('category') && request('category')!='all'){
            $query->where('category_id',request('category'));
        }
        if (request('size') && request('size')!='all') {
            $query->where('size','LIKE',request('size'));
        }
        if (request('product_name')) {
            $query->where('product_name','LIKE','%'.request('product_name').'%');
        }
        if(request('price') && request('price')!='all'){
            if(request('price')==1){
                $query->where('price','>=',1000)->where('price','<=',50000);
            }
            if(request('price')==2){
                $query->where('price','>=',50000)->where('price','<=',150000);
            }
            if(request('price')==3){
                $query->where('price','>=',150000)->where('price','<=',300000);
            }
            if(request('price')==4){
                $query->where('price','>=',300000);
            }
        }

        if(request('sort_price')){
            if(request('sort_price')=='height_to_low'){
                $query->orderBy('price','desc');
            }else{
                $query->orderBy('price','asc');
            }
        }else{
            $query->orderBy('price','desc');
        }

        $products = $query->get();

        return view('customer.shop', compact('products','categories'));
    }

    public function product(Product $product)
    {
        $products = Product::all()->where('category_id',$product->category_id);
        return view('customer.product', compact('product','products'));
    }

    public function cart()
    {
        $carts = Cart::where('user_id',Auth::id())->get();
        return view('customer.cart', compact('carts'));
    }

    public function wishlist()
    {
        $wishlists = Like::where('customer_id',Auth::user()->customer->id)->get();
        return view('customer.wishlist', compact('wishlists'));
    }

    public function profile()
    {
        $customer = Auth::user()->customer;
        $orders = Order::where('customer_id',$customer->id)->orderBy('status')->get();
        return view('customer.profile', compact('customer','orders'));
    }

    public function checkout()
    {
        $customer = Auth::user()->customer;
        $payments = PaymentMethod::all();
        $shipments = Shipment::all();
        $carts = Cart::where('user_id',Auth::id())->get();
        return view('customer.checkout', compact('carts','customer','payments','shipments'));
    }

    public function orderDetail(Order $order)
    {
        return view('customer.order',compact('order'));
    }
}
