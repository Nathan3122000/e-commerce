@extends('layouts.customer')
@section('content')
<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <h4>Check Out</h4>
                    <div class="breadcrumb__links">
                        <a href="/">Home</a>
                        <a href="/shop">Shop</a>
                        <span>Check Out</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="checkout spad">
    <div class="container">
        <div class="checkout__form">
            <form action="{{ route('order.store') }}" method="post">
                @csrf
                <input type="hidden" name="customer_id" value="{{ $customer->id }}">
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        {{-- <h6 class="coupon__code"><span class="icon_tag_alt"></span> Have a coupon? <a href="#">Click
                        here</a> to enter your code</h6> --}}
                        <h6 class="checkout__title">Billing Details</h6>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Fist Name<span>*</span></p>
                                    <input type="text" name="customer[first_name]" value="{{ old('first_name',$customer->first_name) }}" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Last Name<span>*</span></p>
                                    <input type="text" name="customer[last_name]" value="{{ old('last_name',$customer->last_name) }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="checkout__input">
                            <p>Address<span>*</span></p>
                            <input type="text" name="customer[address]" value="{{ old('address',$customer->address) }}" placeholder="Street Address" class="checkout__input__add" required>
                        </div>
                        <div class="checkout__input">
                            <p>Town/City<span>*</span></p>
                            <input type="text"  name="customer[city]" value="{{ old('city',$customer->city) }}" required>
                        </div>
                        <div class="checkout__input">
                            <p>Province<span>*</span></p>
                            <input type="text"  name="customer[province]" value="{{ old('province',$customer->province) }}" required>
                        </div>
                        <div class="checkout__input">
                            <p>Postcode / ZIP<span>*</span></p>
                            <input type="text"  name="customer[postalcode]" value="{{ old('postalcode',$customer->postalcode) }}" required>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Phone<span>*</span></p>
                                    <input type="text"  name="customer[phone_number]" value="{{ old('phone_number',$customer->phone_number) }}" required>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="checkout__input">
                            <p>Order notes<span>(optional)</span></p>
                            <input type="text" name="note" placeholder="Notes about your order, e.g. special notes for delivery.">
                        </div> --}}
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            <h4 class="order__title">Your order</h4>
                            <div class="checkout__order__products">Product <span>Total</span></div>
                            <ul class="checkout__total__products">
                                @foreach ($carts as $cart)
                                    <li>{{ sprintf('%02d',$loop->iteration) }}. {{ $cart->product->product_name }}<span>Rp. {{ number_format($cart->subtotal) }}</span></li>
                                @endforeach
                            </ul>
                            <ul class="checkout__total__all">
                                {{-- <li>Subtotal <span>$1647.00</span></li> --}}
                                <li>Total <span>Rp. {{ number_format($carts->sum('subtotal')) }}</span></li>
                            </ul>
                            @foreach ($payments as $payment)
                            <div class="checkout__input__checkbox">
                                <label for="payment-{{ $payment->id }}">
                                    {{ $payment->payment_method }}
                                    <input type="radio" {{ $loop->first?'checked':'' }} id="payment-{{ $payment->id }}" name="payment_method_id" value="{{ $payment->id }}">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            @endforeach
                            <hr>
                            @foreach ($shipments as $shipment)
                            <div class="checkout__input__checkbox">
                                <label for="shipment-{{ $shipment->id }}">
                                    {{ $shipment->company_name }}
                                    <input type="radio" {{ $loop->first?'checked':'' }} id="shipment-{{ $shipment->id }}" name="shipment_id" value="{{ $shipment->id }}">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            @endforeach
                            <button type="submit" onclick="return confirm('are you sure?')" class="site-btn">PLACE ORDER</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
