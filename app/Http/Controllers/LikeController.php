<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function index()
    {
        $data = Like::all();
        return view('admin.like.index', compact('data'));
    }

    public function create()
    {
        return view('admin.like.create');
    }

    public function edit(Like $like)
    {
        return view('admin.like.edit', compact('like'));
    }

    public function store(Request $request)
    {
        $like = Like::where('product_id',$request->product_id)->where('customer_id',$request->customer_id)->first();
        if(!$like){
            try {
                //code...
                $like = Like::create($request->all());
            } catch (\Throwable $th) {
                //throw $th;
                return response([
                    'status' => false,
                    'count' => 0
                ]);
            }
        }

        $count = Like::where('customer_id',$request->customer_id)->get()->count();
        return response([
            'status' => true,
            'count' => $count
        ]);
    }

    public function update(Like $like, Request $request)
    {
        $like->update($request->all());
        return redirect()->route('like.index')->with('success','Data berhasil disimpan!');
    }

    public function destroy(Like $like)
    {
        $like->delete();
        return back()->with('danger','Wishlist berhasil dihapus!');
    }
}
