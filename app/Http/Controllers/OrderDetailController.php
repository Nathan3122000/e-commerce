<?php

namespace App\Http\Controllers;

use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    public function index()
    {
        $data = OrderDetail::all();
        return view('admin.orderdetail.index', compact('data'));
    }

    public function create()
    {
        return view('admin.orderdetail.create');
    }

    public function edit(OrderDetail $order_detail)
    {
        return view('admin.orderdetail.edit', compact('orderdetail'));
    }

    public function store(Request $request)
    {
        OrderDetail::create($request->all());
        return redirect()->route('orderdetail.index')->with('success','Data berhasil ditambahkan!');
    }

    public function update(OrderDetail $order_detail, Request $request)
    {
        $order_detail->update($request->all());
        return back()->with('success','Data berhasil disimpan!');
    }

    public function destroy(OrderDetail $order_detail)
    {
        $order_detail->delete();
        return redirect()->route('orderdetail.index')->with('success','Data berhasil dihapus!');
    }
}
