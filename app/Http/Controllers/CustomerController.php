<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function index()
    {
        $data = Customer::all();
        return view('admin.customer.index', compact('data'));
    }

    public function create()
    {
        return view('admin.customer.create');
    }

    public function edit(Customer $customer)
    {
        return view('admin.customer.edit', compact('customer'));
    }

    public function store(Request $request)
    {
        Customer::create($request->all());
        if(Auth::user()->role_id==1){
            return redirect()->route('customer.index')->with('success','Data berhasil ditambahkan!');
        }
        return back()->with('success','Data berhasil ditambahkan!');
    }

    public function update(Customer $customer, Request $request)
    {
        $customer->update($request->all());
        if(Auth::user()->role_id==1){
            return redirect()->route('customer.index')->with('success','Data berhasil disimpan!');
        }
        return back()->with('success','Data berhasil disimpan!');
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customer.index')->with('success','Data berhasil dihapus!');
    }
}
