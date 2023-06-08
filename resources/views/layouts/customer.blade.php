<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('title','E-commerce')</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="{{ asset('assets/libs') }}/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/libs') }}/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/libs') }}/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/libs') }}/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/libs') }}/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/libs') }}/css/user.css?{{ date('his') }}" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__option">
            <div class="offcanvas__links">
                @if (Auth::check())
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" style="border: none; background:transparent; color:white">Logout</button>
                </form>
                @else
                <a href="{{ route('login') }}">Sign in</a>
                @endif
                {{-- <a href="#">FAQs</a>    --}}
            </div>
            {{-- <div class="offcanvas__top__hover">
                <span>Usd <i class="arrow_carrot-down"></i></span>
                <ul>
                    <li>USD</li>
                    <li>EUR</li>
                    <li>IDR</li>
                </ul>
            </div> --}}
        </div>
        <div class="offcanvas__nav__option">
            <a href="#" class="search-switch"><img src="{{ asset('assets/images') }}/icon/search.png" alt=""></a>
            <a href="{{ route('page.wishlist') }}">
                <img src="{{ asset('assets/images') }}/icon/heart.png" alt="">
                <span class="like-count">0</span></a>
            </a>
            <a href="{{ route('page.cart') }}">
                <img src="{{ asset('assets/images') }}/icon/cart.png" alt="">
                <span class="cart-count">0</span>
            </a>
            <div class="price cart-sum d-none d-md-block">-</div>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__text">
            <p>Free shipping, 30-day return or refund guarantee.</p>
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-7">
                        <div class="header__top__left">
                            <p>Free shipping, 30-day return or refund guarantee.</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-5">
                        <div class="header__top__right">
                            <div class="header__top__links">
                                @if (Auth::check())
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button type="submit" style="border: none; background:transparent; color:white">Logout</button>
                                </form>
                                @else
                                <a href="{{ route('login') }}">Sign in</a>
                                @endif
                                {{-- <a href="#">FAQs</a> --}}
                            </div>
                            {{-- <div class="header__top__hover">
                                <span>Usd <i class="arrow_carrot-down"></i></span>
                                <ul>
                                    <li>USD</li>
                                    <li>EUR</li>
                                    <li>IDR</li>
                                </ul>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="header__logo">
                        <a href="/"><img src="img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <nav class="header__menu mobile-menu">
                        <ul>
                            <li class="@yield('menu-home')"><a href="/">Home</a></li>
                            <li class="@yield('menu-shop')"><a href="{{ route('page.shop') }}">Shop</a></li>
                            {{-- <li class="@yield('menu-contact')"><a href="./contact.html">Contacts</a></li> --}}
                            <li class="@yield('menu-profile')"><a href="{{ route('page.profile') }}">My Profile</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="header__nav__option">
                        <a href="#" class="search-switch"><img src="{{ asset('assets/images') }}/icon/search.png" alt=""></a>
                        <a href="{{ route('page.wishlist') }}"><img src="{{ asset('assets/images/') }}/icon/heart.png" alt=""></a>
                        <a href="{{ route('page.cart') }}"><img src="{{ asset('assets/images') }}/icon/cart.png" alt=""> <span class="cart-count">0</span></a>
                        <div class="price cart-su d-none d-md-blockm">-</div>
                    </div>
                </div>
            </div>
            <div class="canvas__open"><i class="fa fa-bars"></i></div>
        </div>
    </header>
    <!-- Header Section End -->

    @yield('content')

    <!-- Footer Section Begin -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__logo">
                            <a href="#"><img src="img/footer-logo.png" alt=""></a>
                        </div>
                        <p>The customer is at the heart of our unique business model, which includes design.</p>
                        <a href="#"><img src="img/payment.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1 col-md-3 col-sm-6">
                    <div class="footer__widget">
                        <h6>Links</h6>
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li><a href="/shop">Shop</a></li>
                            <li><a href="/profile">Profile</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="footer__widget">
                        <h6>Shopping</h6>
                        <ul>
                            <li><a href="{{ route('page.shop',['category'=>2]) }}">Hoodie</a></li>
                            <li><a href="{{ route('page.shop',['category'=>1]) }}">Sweatshirts</a></li>
                            <li><a href="{{ route('page.shop',['category'=>4]) }}">Pants</a></li>
                            <li><a href="{{ route('page.shop',['category'=>5]) }}">Jeans</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1 col-md-6 col-sm-6">
                    <div class="footer__widget">
                        <h6>NewLetter</h6>
                        <div class="footer__newslatter">
                            <p>Be the first to know about new arrivals, look books, sales & promos!</p>
                            <form action="#">
                                <input type="text" placeholder="Your email">
                                <button type="submit"><span class="icon_mail_alt"></span></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="footer__copyright__text">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        <p>Copyright © {{ date('Y') }}
                            All rights reserved </a>
                        </p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Search Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form action="{{ route('page.shop') }}" class="search-model-form">
                <input type="text" name="product_name" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search End -->

    <!-- Js Plugins -->
    <script src="{{ asset('assets') }}/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="{{ asset('assets') }}/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="{{ asset('assets/libs/') }}/js/jquery.nice-select.min.js"></script>
    <script src="{{ asset('assets/libs/') }}/js/jquery.nicescroll.min.js"></script>
    <script src="{{ asset('assets/libs/') }}/js/jquery.magnific-popup.min.js"></script>
    <script src="{{ asset('assets/libs/') }}/js/jquery.countdown.min.js"></script>
    <script src="{{ asset('assets/libs/') }}/js/jquery.slicknav.js"></script>
    <script src="{{ asset('assets/libs/') }}/js/mixitup.min.js"></script>
    <script src="{{ asset('assets/libs/') }}/js/owl.carousel.min.js"></script>
    <script src="{{ asset('assets/libs/') }}/js/main.js"></script>
    <script>
        function addToCart(id){
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                url: "{{ route('cart.add') }}",
                data: {
                    user_id:@json(Auth::id()??0),
                    product_id:id,
                },
                success: function (response) {
                    if (response.status) {
                        $('.cart-su d-none d-md-blockm').html('Rp. '+response.sum);
                        $('.cart-count').html(response.count);
                        alert('Berhasil ditambahkan ke keranjang')
                        if(response.wishlist){
                            location.reload();
                        }
                    } else {
                        alert('Anda harus login terlebih dahulu');
                    }
                }
            });
        }

        function addToLike(id){
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                url: "{{ route('like.store') }}",
                data: {
                    customer_id:@json(Auth::user()->customer->id??0),
                    product_id:id,
                },
                success: function (response) {
                    if (response.status) {
                        $('.like-count').html(response.count);
                        alert('Berhasil ditambahkan ke wishlist')
                    } else {
                        alert('Anda harus login terlebih dahulu');
                    }
                }
            });
        }

        function getCart(){
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    user_id:@json(Auth::id()??0),
                },
                type: "POST",
                url: "{{ route('cart.get') }}",
                success: function (response) {
                    $('.cart-su d-none d-md-blockm').html('Rp. '+response.sum);
                    $('.cart-count').html(response.count);
                    $('.like-count').html(response.likes);
                }
            });
        }

        getCart();
    </script>
    @stack('script')
</body>

</html>
