<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\PaymentMethod;
use App\Models\Product;
use App\Models\Shipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->role_id==1){
            return redirect()->route('dashboard');
        }
        if(Auth::user()->role_id==2){
            return redirect()->route('page.home');
        }
    }

    public function dashboard()
    {
        $query = Order::query();
        if(request('payment_method') && request('payment_method')!='all'){
            $query->where('payment_method_id',request('payment_method'));
        }
        if(request('shipment') && request('shipment')!='all'){
            $query->where('shipment_id',request('shipment'));
        }
        if(request('product') && request('product')!='all'){
            $query->whereHas('orders', function($q){
                $q->where('product_id',request('product'));
            });
        }
        if(request('rating') && request('rating')!='all'){
            $query->whereHas('orders', function($q){
                $q->where('rating',request('rating'));
            });
        }

        $products = Product::all();
        $shipments = Shipment::all();
        $payment_methods = PaymentMethod::all();
        $orders = $query->get();
        $categories = Category::all();

        $profit = 0;
        $product_selling = 0;
        foreach ($orders as $order ) {
            $profit += $order->orders->sum('grandtotal');
            $product_selling += $order->orders->sum('qty');
        }

        $penjualan_before = array();
        $penjualan_before_total = 0;
        $penjualan_after = array();
        $penjualan_after_total = 0;
        $penjualan_now = 0;
        $category_name = $categories->pluck('category_name')->toArray();
        $category_total = array();
        $order_id = $orders->pluck('id')->toArray();
        for ($i=0; $i < 12; $i++) {
            $now = OrderDetail::whereIn('order_id',$order_id)->whereDate('created_at',date('Y-m-d'))->sum('grandtotal');
            $jum = OrderDetail::whereIn('order_id',$order_id)->whereYear('created_at',date('Y'))->whereMonth('created_at',sprintf('%02d',$i))->sum('grandtotal');
            $jum1 = OrderDetail::whereIn('order_id',$order_id)->whereYear('created_at',(int)date('Y')-1)->whereMonth('created_at',sprintf('%02d',$i))->sum('grandtotal');
            array_push($penjualan_after,$jum);
            array_push($penjualan_before,$jum1);
            $penjualan_after_total += $jum;
            $penjualan_now += $now;
            $penjualan_before_total += $jum1;
        }

        foreach ($categories as $cat ) {
            $id_cat = $cat->id;
            $jum2 = OrderDetail::whereIn('order_id',$order_id)->whereHas('product', function($q) use($id_cat){
                $q->where('category_id',$id_cat);
            })->count();
            array_push($category_total,$jum2);
        }
        return view('admin.dashboard', compact('orders','products','shipments','payment_methods','profit','product_selling','penjualan_after','penjualan_before','penjualan_before_total','penjualan_after_total','penjualan_now','category_name','category_total'));
    }
}
