@extends('layouts.admin')
@section('title','Tambah Category')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-title">Tambah Category</div>
        </div>
        <div class="card-body">
            <form action="{{ route('category.store') }}" method="post">
                @csrf
                @include('admin.category.form')
                <div class="btn-group">
                    <a class="btn btn-sm btn-primary" href="{{ route('category.index') }}"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
                    <button type="submit" onclick="return confirm('are you sure?')" class="btn btn-sm btn-success"><i class="fas fa-save"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
