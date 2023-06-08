@extends('layouts.admin')
@section('title','Tambah Shipment')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-title">Tambah Shipment</div>
        </div>
        <div class="card-body">
            <form action="{{ route('shipment.store') }}" method="post">
                @csrf
                @include('admin.shipment.form')
                <div class="btn-group">
                    <a class="btn btn-sm btn-primary" href="{{ route('shipment.index') }}"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
                    <button type="submit" onclick="return confirm('are you sure?')" class="btn btn-sm btn-success"><i class="fas fa-save"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
