<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $data = Product::all();
        return view('admin.product.index', compact('data'));
    }

    public function create()
    {
        return view('admin.product.create');
    }

    public function edit(Product $product)
    {
        return view('admin.product.edit', compact('product'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $file = $request->file('image');
        $file_name = $file->getClientOriginalName();
        $file->storeAs('public/product',$file_name);
        $data['image'] = 'storage/product/'.$file_name;
        Product::create($data);
        return redirect()->route('product.index')->with('success','Data berhasil ditambahkan!');
    }

    public function update(Product $product, Request $request)
    {
        $data = $request->all();
        if($request->image){
            $file = $request->file('image');
            $file_name = $file->getClientOriginalName();
            $file->storeAs('public/product',$file_name);
            $data['image'] = 'storage/product/'.$file_name;
        }
        $product->update($data);
        return redirect()->route('product.index')->with('success','Data berhasil disimpan!');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index')->with('success','Data berhasil dihapus!');
    }
}
