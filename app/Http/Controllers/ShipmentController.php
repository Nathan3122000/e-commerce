<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use Illuminate\Http\Request;

class ShipmentController extends Controller
{
    public function index()
    {
        $data = Shipment::all();
        return view('admin.shipment.index', compact('data'));
    }

    public function create()
    {
        return view('admin.shipment.create');
    }

    public function edit(Shipment $shipment)
    {
        return view('admin.shipment.edit', compact('shipment'));
    }

    public function store(Request $request)
    {
        Shipment::create($request->all());
        return redirect()->route('shipment.index')->with('success','Data berhasil ditambahkan!');
    }

    public function update(Shipment $shipment, Request $request)
    {
        $shipment->update($request->all());
        return redirect()->route('shipment.index')->with('success','Data berhasil disimpan!');
    }

    public function destroy(Shipment $shipment)
    {
        $shipment->delete();
        return redirect()->route('shipment.index')->with('success','Data berhasil dihapus!');
    }
}