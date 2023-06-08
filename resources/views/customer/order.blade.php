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
                        <a href="/profile">My Profile</a>
                        <span>Order</span>
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
                <div class="shopping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Rating</th>
                                <th>Review</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->orders as $order)
                            <tr>
                                <form action="{{ route('order-detail.update',$order) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="rating" id="rating-{{ $order->id }}">
                                    <td class="product__cart__item">
                                        <div class="product__cart__item__pic">
                                            <img src="{{ asset($order->product->image) }}" alt="">
                                            <h6>{{ $order->product->product_name }}</h6>
                                            <h5>Rp. {{ number_format($order->product->price) }}</h5>
                                        </div>
                                        {{-- <div class="product__cart__item__text">
                                            <h6>{{ $order->product->product_name }}</h6>
                                            <h5>Rp. {{ number_format($order->product->price) }}</h5>
                                        </div> --}}
                                    </td>
                                    <td class="quantity__item">
                                        <div class="quantity">
                                            <div class="pro-qty-2s">
                                                <input type="text" style="border:none" value="{{ $order->qty }}" onchange="submit()">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="cart__price">Rp. {{ number_format($order->product->price * $order->qty) }}</td>
                                    <td>
                                        @if ($order->rating)
                                            @for ($i = 0; $i < $order->rating; $i++)
                                            <i class="fa fa-star text-warning"></i>
                                            @endfor
                                        @else
                                        <i class="fa fa-star" id="star-1-{{ $order->id }}" onclick="starRating(1,{{ $order->id }})"></i>
                                        <i class="fa fa-star" id="star-2-{{ $order->id }}" onclick="starRating(2,{{ $order->id }})"></i>
                                        <i class="fa fa-star" id="star-3-{{ $order->id }}" onclick="starRating(3,{{ $order->id }})"></i>
                                        <i class="fa fa-star" id="star-4-{{ $order->id }}" onclick="starRating(4,{{ $order->id }})"></i>
                                        <i class="fa fa-star" id="star-5-{{ $order->id }}" onclick="starRating(5,{{ $order->id }})"></i>
                                        @endif
                                    </td>
                                    <td class="cart__price"><input type="text" name="title" id="title" value="{{ $order->title }}"></td>
                                    <td class="cart__close">
                                        <button type="submit" style="border: none; background:transparent"><i class="fas fa-save"></i></button>
                                    </td>
                                </form>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('script')
    <script>
        function starRating(num,id){
            for (let i = 1; i <= 5; i++) {
                $('#star-'+i+'-'+id).removeClass('text-warning');
            }
            for (let i = 1; i <= num; i++) {
                $('#star-'+i+'-'+id).addClass('text-warning');
            }
            $('#rating-'+id).val(num);
        }
    </script>
@endpush
