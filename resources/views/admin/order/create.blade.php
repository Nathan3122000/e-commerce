@extends('layouts.admin')
@section('title','Tambah Order')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-title">Tambah Order</div>
        </div>
        <div class="card-body">
            <form action="{{ route('order.store') }}" method="post">
                @csrf
                @include('admin.order.form')
                <div class="btn-group">
                    <a class="btn btn-sm btn-primary" href="{{ route('order.index') }}"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
                    <button type="submit" onclick="return confirm('are you sure?')" class="btn btn-sm btn-success"><i class="fas fa-save"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
