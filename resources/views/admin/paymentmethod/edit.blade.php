@extends('layouts.admin')
@section('title','Edit PaymentMethod')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-title">Edit PaymentMethod</div>
        </div>
        <div class="card-body">
            <form action="{{ route('payment-method.update',$paymentmethod) }}" method="post">
                @csrf
                @method('PUT')
                @include('admin.paymentmethod.form')
                <div class="btn-group">
                    <a class="btn btn-sm btn-primary" href="{{ route('paymentmethod.index') }}"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
                    <button type="submit" onclick="return confirm('are you sure?')" class="btn btn-sm btn-success"><i class="fas fa-save"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
