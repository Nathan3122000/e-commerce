<?php

namespace App\Http\Controllers;

use App\Models\PaymentMethod;
use Illuminate\Http\Request;

class PaymentMethodController extends Controller
{
    public function index()
    {
        $data = PaymentMethod::all();
        return view('admin.paymentmethod.index', compact('data'));
    }

    public function create()
    {
        return view('admin.paymentmethod.create');
    }

    public function edit(PaymentMethod $payment_method)
    {
        return view('admin.paymentmethod.edit', compact('paymentmethod'));
    }

    public function store(Request $request)
    {
        PaymentMethod::create($request->all());
        return redirect()->route('paymentmethod.index')->with('success','Data berhasil ditambahkan!');
    }

    public function update(PaymentMethod $payment_method, Request $request)
    {
        $payment_method->update($request->all());
        return redirect()->route('paymentmethod.index')->with('success','Data berhasil disimpan!');
    }

    public function destroy(PaymentMethod $payment_method)
    {
        $payment_method->delete();
        return redirect()->route('paymentmethod.index')->with('success','Data berhasil dihapus!');
    }
}
