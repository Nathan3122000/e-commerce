@extends('layouts.customer')
@section('menu-profile','active')
@section('content')
<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <h4>My Profile</h4>
                    <div class="breadcrumb__links">
                        <a href="/">Home</a>
                        <span>My Profile</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="my-4">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-toggle="tab" data-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Order</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-toggle="tab" data-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Profile</button>
                    </li>
                </ul>
                <div class="tab-content mt-5" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Order ID</th>
                                    <th>Payment</th>
                                    <th>Shipment</th>
                                    <th>Paid Date</th>
                                    <th>Ship Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>ORD{{ sprintf('%05d',$order->id) }}</td>
                                        <td>{{ $order->payment_method->payment_method }}</td>
                                        <td>{{ $order->shipment->company_name }}</td>
                                        <td>{{ is_null($order->paid_date) ? '-' : date('d/m/Y',strtotime($order->paid_date)) }}</td>
                                        <td>{{ is_null($order->ship_date) ? '-' : date('d/m/Y',strtotime($order->ship_date)) }}</td>
                                        <td>{{ $order->status }}</td>
                                        <td>
                                            <a href="{{ route('page.order',$order) }}" class="btn btn-sm btn-primary">Detail</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <form action="{{ route('customer.update',$customer) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Fist Name<span>*</span></p>
                                        <input type="text" name="first_name" value="{{ old('first_name',$customer->first_name) }}" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Last Name<span>*</span></p>
                                        <input type="text" name="last_name" value="{{ old('last_name',$customer->last_name) }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
                                <input type="text" name="address" value="{{ old('address',$customer->address) }}" placeholder="Street Address" class="checkout__input__add" required>
                            </div>
                            <div class="checkout__input">
                                <p>Town/City<span>*</span></p>
                                <input type="text"  name="city" value="{{ old('city',$customer->city) }}" required>
                            </div>
                            <div class="checkout__input">
                                <p>Province<span>*</span></p>
                                <input type="text"  name="province" value="{{ old('province',$customer->province) }}" required>
                            </div>
                            <div class="checkout__input">
                                <p>Postcode / ZIP<span>*</span></p>
                                <input type="text"  name="postalcode" value="{{ old('postalcode',$customer->postalcode) }}" required>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Phone<span>*</span></p>
                                        <input type="text"  name="phone_number" value="{{ old('phone_number',$customer->phone_number) }}" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 mt-5">
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
