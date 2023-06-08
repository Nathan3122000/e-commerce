@extends('layouts.admin')
@section('title','Shipment Management')
@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('shipment.create') }}" class="btn btn-sm btn-success"><i class="fas fa-plus"></i> Create</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table nowrap table-bordered">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Company Name</th>
                            <th>Shipper Phone Number</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->company_name }}</td>
                            <td>{{ $item->shipper_phone_number }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('shipment.edit',$item) }}" class="btn btn-sm btn-primary"><i class="fas fa-pencil-alt"></i> Edit</a>
                                    <form action="{{ route('shipment.destroy',$item) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('are you sure?')"><i class="fas fa-trash-alt"></i> Hapus</button>
                                    </form>
                                </div>
                            </td>
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
