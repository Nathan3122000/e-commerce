@extends('layouts.customer')
@section('content')
<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <h4>Wishlist</h4>
                    <div class="breadcrumb__links">
                        <a href="/">Home</a>
                        <i class="fas fa-caret-right"></i>
                        <span>Wishlist</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="shopping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="shopping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($wishlists as $wishlist)
                            <tr>
                                <form action="{{ route('like.destroy',$wishlist) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <td class="product__cart__item">
                                        <div class="product__cart__item__pic">
                                            <img src="{{ asset($wishlist->product->image) }}" alt="">
                                            <h6>{{ $wishlist->product->product_name }}</h6>
                                            <h5>Rp. {{ number_format($wishlist->product->price) }}</h5>
                                        </div>
                                        {{-- <div class="product__cart__item__text">
                                            <h6>{{ $wishlist->product->product_name }}</h6>
                                            <h5>Rp. {{ number_format($wishlist->product->price) }}</h5>
                                        </div> --}}
                                    </td>
                                    <td class="cart__price">Rp. {{ number_format($wishlist->product->price) }}</td>
                                    <td class="cart__close">
                                        <button type="submit" style="border: none; background:transparent"><i class="fas fa-trash"></i></button>
                                        <button type="button" onclick="addToCart({{ $wishlist->product_id }})" style="border: none; background:transparent"><i class="fas fa-shopping-cart"></i></button>
                                    </td>
                                </form>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="continue__btn">
                            <a href="{{ route('page.shop') }}">Continue Shopping</a>
                        </div>
                    </div>
                    {{-- <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="continue__btn update__btn">
                            <a href="#"><i class="fa fa-spinner"></i> Update cart</a>
                        </div>
                    </div> --}}
                </div>
            </div>
            <div class="col-lg-4">
                {{-- <div class="cart__discount">
                    <h6>Discount codes</h6>
                    <form action="#">
                        <input type="text" placeholder="Coupon code">
                        <button type="submit">Apply</button>
                    </form>
                </div> --}}
                <div class="cart__total">
                    {{-- <h6>Cart total</h6>
                    <ul>
                        <li>Total <span>Rp. {{ number_format($wishlists->sum('subtotal')) }}</span></li>
                    </ul> --}}
                    <a href="{{ route('page.cart') }}" class="primary-btn">Go to Cart</a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('script')
<script>
    $('span.qtybtn').hide();
    $('span.qtybtn').click(function (e) {
        console.log('sa');
    });
    $('span.qtybtn').change(function (e) {
        console.log('sa');
    });
</script>
@endpush
