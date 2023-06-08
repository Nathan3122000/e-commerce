<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index($name=null)
    {
        $query = Order::query();
        if($name){
            $query->where('status',$name);
        }
        $data = $query->get();
        return view('admin.order.index', compact('data'));
    }

    public function create()
    {
        return view('admin.order.create');
    }

    public function edit(Order $order)
    {
        return view('admin.order.edit', compact('order'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['status'] = 'IN PROCESS';
        $order = Order::create($data);
        if($request->customer_id){
            $customer = Customer::find($request->customer_id);
            $customer->update($data['customer']);
            $carts = Cart::where('user_id',$customer->user_id)->get();
            foreach ($carts as $cart ) {
                $product = Product::find($cart->product_id);
                $product->update([
                    'stock' => $product->stock - $cart->qty,
                    'sold_count' => $product->sold_count + $cart->qty
                ]);
                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $cart->product_id,
                    'price' => $cart->price_item,
                    'qty' => $cart->qty,
                    'discount' => $cart->discount,
                    'subtotal' => $cart->subtotal,
                    'grandtotal' => $cart->subtotal - ($cart->subtotal * $cart->discount)
                ]);
            }
            Cart::where('user_id',$customer->user_id)->delete();
        }
        return redirect()->route('page.profile')->with('success','Data berhasil ditambahkan!');
    }

    public function update(Order $order, Request $request)
    {
        $order->update($request->all());
        return redirect()->route('order.index')->with('success','Data berhasil disimpan!');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('order.index')->with('success','Data berhasil dihapus!');
    }
}
