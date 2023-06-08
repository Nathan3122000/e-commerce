<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Like;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $query = Cart::query();
        if(request('user_id')){
            $query->where('user_id',request('user_id'));
        }
        $data = $query->get();
        return view('admin.cart.index', compact('data'));
    }

    public function create()
    {
        return view('admin.cart.create');
    }

    public function edit(Cart $cart)
    {
        return view('admin.cart.edit', compact('cart'));
    }

    public function store(Request $request)
    {
        Cart::create($request->all());
        return redirect()->route('cart.index')->with('success','Data berhasil ditambahkan!');
    }

    public function update(Cart $cart, Request $request)
    {
        $cart->update($request->all());
        return redirect()->route('cart.index')->with('success','Data berhasil disimpan!');
    }

    public function destroy(Cart $cart)
    {
        $cart->delete();
        return back()->with('success','Data berhasil dihapus!');
    }

    public function getCart()
    {
        if(request('user_id')==0){
            return [
                'count' => 0,
                'sum' => number_format(0),
            ];
        }
        $user = User::find(request('user_id'));
        $carts = Cart::where('user_id',request('user_id'))->get();
        $likes = Like::where('customer_id',$user->customer->id)->get();
        return response([
            'likes' => $likes->count(),
            'count' => $carts->count(),
            'sum' => number_format($carts->sum('subtotal')),
        ]);
    }

    public function addToCart()
    {
        if(request('user_id')==0){
            return [
                'status' => false
            ];
        }
        $user = User::find(request('user_id'));
        $cart = Cart::where('user_id',request('user_id'))->where('product_id',request('product_id'))->first();
        $wishlist = Like::where('customer_id',$user->customer->id)->where('product_id',request('product_id'))->first();
        $qty = request('qty') ?? 1;
        $discount = request('discount') ?? 0;
        $product = Product::find(request('product_id'));
        $is_wishlist = false;
        if($wishlist){
            $is_wishlist = true;
            $wishlist->delete();
        }
        if($cart){
            $cart->update([
                'qty' => $cart->qty + $qty,
                'subtotal' => $product->price * ($cart->qty + $qty),
                'price_item' => $product->price,
            ]);
        }else{
            $cart = Cart::create([
                'discount' => $discount,
                'user_id' => request('user_id'),
                'product_id' => request('product_id'),
                'qty' => $qty,
                'price_item' => $product->price,
                'subtotal' => $product->price * $qty
            ]);
        }

        $carts = Cart::where('user_id',request('user_id'))->get();
        return response([
            'wishlist' => $is_wishlist,
            'status' => true,
            'count' => $carts->count(),
            'sum' => number_format($carts->sum('subtotal')),
        ]);
    }
}
