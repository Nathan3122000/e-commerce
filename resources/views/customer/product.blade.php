@extends('layouts.customer')
@section('menu-shop','active')
@section('content')
<section class="shop-details">
    <div class="product__details__pic">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product__details__breadcrumb">
                        <a href="/">Home</a>
                        <i class="fas fa-caret-right"></i>
                        <a href="/shop">Shop</a>
                        <i class="fas fa-caret-right"></i>
                        <span>Product Details</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab" aria-selected="false">
                                <div class="product__thumb__pic set-bg" data-setbg="{{ asset($product->image) }}" style="background-image: url('{{ asset($product->image) }}'');">
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6 col-md-9">
                    <div class="tab-content">
                        <div class="tab-pane active show" id="tabs-1" role="tabpanel">
                            <div class="product__details__pic__item">
                                <img src="{{ asset($product->image) }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="product__details__content">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <div class="product__details__text">
                        <h4>{{ $product->product_name }}</h4>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                            <span> - {{ $product->order_detail->whereNotNull('title')->count() }} Reviews</span>
                        </div>
                        <h3>Rp. {{ number_format($product->price) }}</h3>
                        <p>{{ $product->description }}</p>
                        <div class="product__details__option">
                            <div class="product__details__option__size">
                                <span>Size:</span>
                                <label for="{{ $product->size }}" class="active">{{ $product->size }}
                                </label>
                            </div>
                            <div class="product__details__option__size">
                                <span>Color:</span>
                                <label for="{{ $product->color }}" class="active">{{ $product->color }}
                                </label>
                            </div>
                        </div>
                        <div class="product__details__cart__option">
                            <div class="quantity">
                                <div class="pro-qty"><span class="fa fa-angle-up dec qtybtn"></span>
                                    <input type="text" value="1">
                                <span class="fa fa-angle-down inc qtybtn"></span></div>
                            </div>
                            <button onclick="addToCart({{$product->id}})" class="primary-btn">add to cart</a>
                        </div>
                        {{-- <div class="product__details__btns__option">
                            <a href="#"><i class="fa fa-heart"></i> add to wishlist</a>
                            <a href="#"><i class="fa fa-exchange"></i> Add To Compare</a>
                        </div> --}}
                        {{-- <div class="product__details__last__option">
                            <h5><span>Guaranteed Safe Checkout</span></h5>
                            <img src="img/shop-details/details-payment.png" alt="">
                            <ul>
                                <li><span>SKU:</span> PROD-00006</li>
                                <li><span>Categories:</span> T-Shirt</li>
                                <li><span>Tag:</span> Product, Fashion, Clothing </li>
                            </ul>
                        </div> --}}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-5" role="tab" aria-selected="true">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-6" role="tab" aria-selected="false">Customer
                                Previews({{ $product->order_detail->whereNotNull('title')->count() }})</a>
                            </li>
                            {{-- <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-7" role="tab" aria-selected="false">Additional
                                information</a>
                            </li> --}}
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-5" role="tabpanel">
                                <div class="product__details__tab__content">
                                    <p class="note">{{ $product->product_name }}</p>
                                    <div class="product__details__tab__content__item">
                                        <h5>Products Infomation</h5>
                                        <p>{{ $product->description }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-6" role="tabpanel">
                                <div class="product__details__tab__content">
                                    <div class="product__details__tab__content__item">
                                        <h5>Customer Previews</h5>
                                        <p>
                                            @foreach ($product->order_detail->whereNotNull('content') as $review)
                                                {{ $review->content }} <br>
                                            @endforeach
                                        </p>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="tab-pane" id="tabs-7" role="tabpanel">
                                <div class="product__details__tab__content">
                                    <div class="product__details__tab__content__item">
                                        <h5>Material used</h5>
                                        <p>Polyester is deemed lower quality due to its none natural quality’s. Made
                                            from synthetic materials, not natural like wool. Polyester suits become
                                            creased easily and are known for not being breathable. Polyester suits
                                            tend to have a shine to them compared to wool and cotton suits, this can
                                            make the suit look cheap. The texture of velvet is luxurious and
                                            breathable. Velvet is a great choice for dinner party jacket and can be
                                        worn all year round.</p>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="related spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="related-title">Related Product</h3>
            </div>
        </div>
        <div class="row">
            @foreach ($products as $item)
                <div class="col-lg-3 col-md-6 col-sm-6 col-sm-6">
                    <livewire:product :product="$item" >
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
