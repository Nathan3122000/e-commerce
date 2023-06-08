@extends('layouts.admin')
@section('title','Cart Management')
@section('content')
    <div class="card">
        <div class="card-header">
            {{-- <a href="{{ route('cart.create') }}" class="btn btn-sm btn-success"><i class="fas fa-plus"></i> Create</a> --}}
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table nowrap table-bordered">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Customer</th>
                            <th>Product</th>
                            <th>Qty</th>
                            <th>Price Item</th>
                            <th>Discount</th>
                            <th>Subtotal</th>
                            {{-- <th>Action</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->product->product_name }}</td>
                            <td>{{ $item->qty }}</td>
                            <td>Rp. {{ number_format($item->price_item) }}</td>
                            <td>{{ $item->discount }}</td>
                            <td>Rp. {{ number_format($item->subtotal) }}</td>
                            {{-- <td>
                                <div class="btn-group">
                                    <a href="{{ route('cart.edit',$item) }}" class="btn btn-sm btn-primary"><i class="fas fa-pencil-alt"></i> Edit</a>
                                    <form action="{{ route('cart.destroy',$item) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('are you sure?')"><i class="fas fa-trash-alt"></i> Hapus</button>
                                    </form>
                                </div>
                            </td> --}}
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('script')
<script>
    $('.table').dataTable();
</script>
@endpush
