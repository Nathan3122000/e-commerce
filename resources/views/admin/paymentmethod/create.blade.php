@extends('layouts.admin')
@section('title','Tambah Payment Method')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-title">Tambah Payment Method</div>
        </div>
        <div class="card-body">
            <form action="{{ route('payment-method.store') }}" method="post">
                @csrf
                @include('admin.paymentmethod.form')
                <div class="btn-group">
                    <a class="btn btn-sm btn-primary" href="{{ route('payment-method.index') }}"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
                    <button type="submit" onclick="return confirm('are you sure?')" class="btn btn-sm btn-success"><i class="fas fa-save"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
