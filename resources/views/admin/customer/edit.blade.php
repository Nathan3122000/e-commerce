@extends('layouts.admin')
@section('title','Edit Customer')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-title">Edit Customer</div>
        </div>
        <div class="card-body">
            <form action="{{ route('customer.update',$customer) }}" method="post">
                @csrf
                @method('PUT')
                @include('admin.customer.form')
                <div class="btn-group">
                    <a class="btn btn-sm btn-primary" href="{{ route('customer.index') }}"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
                    <button type="submit" onclick="return confirm('are you sure?')" class="btn btn-sm btn-success"><i class="fas fa-save"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
