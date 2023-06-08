@extends('layouts.admin')
@section('title','Customer Management')
@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('customer.create') }}" class="btn btn-sm btn-success"><i class="fas fa-plus"></i> Create</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table nowrap table-bordered">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Birthdate</th>
                            <th>Gender</th>
                            <th>Phone Number</th>
                            <th>Address</th>
                            <th>Province</th>
                            <th>City</th>
                            <th>Postalcode</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->first_name }}</td>
                            <td>{{ $item->last_name }}</td>
                            <td>{{ date('d/m/Y',strtotime($item->birthdate)) }}</td>
                            <td>{{ $item->gender }}</td>
                            <td>{{ $item->phone_number }}</td>
                            <td>{{ $item->address }}</td>
                            <td>{{ $item->province }}</td>
                            <td>{{ $item->city }}</td>
                            <td>{{ $item->postalcode }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('customer.edit',$item) }}" class="btn btn-sm btn-primary"><i class="fas fa-pencil-alt"></i> Edit</a>
                                    <form action="{{ route('customer.destroy',$item) }}" method="post">
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
