<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $data = Category::all();
        return view('admin.category.index', compact('data'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    public function store(Request $request)
    {
        Category::create($request->all());
        return redirect()->route('category.index')->with('success','Data berhasil ditambahkan!');
    }

    public function update(Category $category, Request $request)
    {
        $category->update($request->all());
        return redirect()->route('category.index')->with('success','Data berhasil disimpan!');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('category.index')->with('success','Data berhasil dihapus!');
    }
}