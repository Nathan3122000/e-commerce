@extends('layouts.customer')
@section('menu-home','active')
@section('content')
        <!-- Hero Section Begin -->
        <section class="hero">
            <div class="hero__slider owl-carousel">
                <div class="hero__items set-bg" data-setbg="{{ asset('assets/images') }}/hero/hero-1.jpg">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-5 col-lg-7 col-md-8">
                                <div class="hero__text">
                                    <h6>Fall - Winter Collection</h6>
                                    <h2>Fall - Winter Collections 2023</h2>
                                    <p>A specialist label creating men's fashion essentials. Ethically crafted with an unwavering
                                    commitment to exceptional quality.</p>
                                    <a href="{{ route('page.shop') }}" class="primary-btn">Shop now <span class="arrow_right"></span></a>
                                    <div class="hero__social">
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-pinterest"></i></a>
                                        <a href="#"><i class="fa fa-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hero__items set-bg" data-setbg="{{ asset('assets/images') }}/hero/hero-2.jpg">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-5 col-lg-7 col-md-8">
                                <div class="hero__text">
                                    <h6>Fall - Winter Collection</h6>
                                    <h2>Fall - Winter Collections 2023</h2>
                                    <p>A specialist label creating men's fashion essentials. Ethically crafted with an unwavering
                                    commitment to exceptional quality.</p>
                                    <a href="{{ route('page.shop') }}" class="primary-btn">Shop now <span class="arrow_right"></span></a>
                                    <div class="hero__social">
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-pinterest"></i></a>
                                        <a href="#"><i class="fa fa-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Hero Section End -->

        <!-- Banner Section Begin -->
        <section class="banner spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 offset-lg-4">
                        <div class="banner__item">
                            <div class="banner__item__pic">
                                <img src="{{ asset('assets/images') }}/banner/banner-1.jpg" alt="">
                            </div>
                            <div class="banner__item__text">
                                <h2>Clothing Collections 2023</h2>
                                <a href="{{ route('page.shop') }}">Shop now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="banner__item banner__item--middle">
                            <div class="banner__item__pic">
                                <img src="{{ asset('assets/images') }}/banner/banner-2.jpg" alt="">
                            </div>
                            <div class="banner__item__text">
                                <h2>Accessories</h2>
                                <a href="{{ route('page.shop') }}">Shop now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="banner__item banner__item--last">
                            <div class="banner__item__pic">
                                <img src="{{ asset('assets/images') }}/banner/banner-3.jpg" alt="">
                            </div>
                            <div class="banner__item__text">
                                <h2>Shoes Spring 2023</h2>
                                <a href="{{ route('page.shop') }}">Shop now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Banner Section End -->

        <!-- Product Section Begin -->
        <section class="product spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="filter__controls">
                            @foreach ($categories as $category)
                                <li data-filter=".{{ $category->category_name }}">{{ $category->category_name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="row product__filter">
                    @foreach ($products as $product)
                        @foreach ($product as $item)
                            <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix {{ $product->first()->category->category_name }}">
                                <livewire:product :product="$item"/>
                            </div>
                        @endforeach
                    @endforeach
                </div>
            </div>
        </section>
        <!-- Product Section End -->

        <!-- Categories Section Begin -->
        {{-- <section class="categories spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="categories__text">
                            <h2>Clothings Hot <br /> <span>Shoe Collection</span> <br /> Accessories</h2>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="categories__hot__deal">
                            <img src="{{ asset('assets/images') }}/product-sale.png" alt="">
                            <div class="hot__deal__sticker">
                                <span>Sale Of</span>
                                <h5>$29.99</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 offset-lg-1">
                        <div class="categories__deal__countdown">
                            <span>Deal Of The Week</span>
                            <h2>Multi-pocket Chest Bag Brown</h2>
                            <div class="categories__deal__countdown__timer" id="countdown">
                                <div class="cd-item">
                                    <span>3</span>
                                    <p>Days</p>
                                </div>
                                <div class="cd-item">
                                    <span>1</span>
                                    <p>Hours</p>
                                </div>
                                <div class="cd-item">
                                    <span>50</span>
                                    <p>Minutes</p>
                                </div>
                                <div class="cd-item">
                                    <span>18</span>
                                    <p>Seconds</p>
                                </div>
                            </div>
                            <a href="{{ route('page.shop') }}" class="primary-btn">Shop now</a>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <!-- Categories Section End -->

        <!-- Instagram Section Begin -->
        {{-- <section class="instagram spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="instagram__pic">
                            <div class="instagram__pic__item set-bg" data-setbg="img/instagram/instagram-1.jpg"></div>
                            <div class="instagram__pic__item set-bg" data-setbg="img/instagram/instagram-2.jpg"></div>
                            <div class="instagram__pic__item set-bg" data-setbg="img/instagram/instagram-3.jpg"></div>
                            <div class="instagram__pic__item set-bg" data-setbg="img/instagram/instagram-4.jpg"></div>
                            <div class="instagram__pic__item set-bg" data-setbg="img/instagram/instagram-5.jpg"></div>
                            <div class="instagram__pic__item set-bg" data-setbg="img/instagram/instagram-6.jpg"></div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="instagram__text">
                            <h2>Instagram</h2>
                            <p>Check out  Instagram #malefashion to get interesting fashion contents for men and useful tips & tricks. Thank you for supporting our business!</p>
                            <h3>#MaleFashion</h3>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <!-- Instagram Section End -->

        <!-- Latest Blog Section Begin -->
        {{-- <section class="latest spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <span>Latest News</span>
                            <h2>Fashion New Trends</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="blog__item">
                            <div class="blog__item__pic set-bg" data-setbg="img/blog/blog-1.jpg"></div>
                            <div class="blog__item__text">
                                <span><img src="{{ asset('assets/images') }}/icon/calendar.png" alt=""> 14 May 2023</span>
                                <h5>From Classic to Contemporary: "Discovering the Spectrum of Men's Fashion Brands"</h5>
                                <a href="#">Read More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="blog__item">
                            <div class="blog__item__pic set-bg" data-setbg="img/blog/blog-2.jpg"></div>
                            <div class="blog__item__text">
                                <span><img src="{{ asset('assets/images') }}/icon/calendar.png" alt=""> 14 May 2023</span>
                                <h5>Timeless Elegance: Exploring Eternity Bands</h5>
                                <a href="#">Read More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="blog__item">
                            <div class="blog__item__pic set-bg" data-setbg="img/blog/blog-3.jpg"></div>
                            <div class="blog__item__text">
                                <span><img src="{{ asset('assets/images') }}/icon/calendar.png" alt=""> 10 May 2023</span>
                                <h5>The Health Benefits Of Sunglasses</h5>
                                <a href="#">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <!-- Latest Blog Section End -->
@endsection
