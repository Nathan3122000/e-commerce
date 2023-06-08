@extends('layouts.customer')
@section('menu-shop','active')
@section('content')
<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <h4>Shop</h4>
                    <div class="breadcrumb__links">
                        <a href="/">Home</a>
                        <i class="fas fa-caret-right"></i>
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="shop spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="shop__sidebar">
                    <div class="shop__sidebar__search">
                        <form action="#">
                            <input type="text" placeholder="Search...">
                            <button type="submit"><span class="icon_search"></span></button>
                        </form>
                    </div>
                    <form action="{{ route('page.shop') }}" method="GET" class="shop__sidebar__accordion">
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-heading">
                                    <a data-toggle="collapse" data-target="#collapseOne">Categories</a>
                                </div>
                                <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="shop__sidebar__categories">
                                            <ul class="nice-scroll" tabindex="1" style="overflow-y: hidden; outline: none;">
                                                <li><input type="radio" name="category" {{ request('category')=='all'?'checked':'' }} value="all"> All</li>
                                                @foreach ($categories as $category)
                                                <li><input type="radio" name="category" {{ request('category')==$category->id?'checked':'' }} value="{{ $category->id }}"> {{ $category->category_name }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-heading">
                                    <a data-toggle="collapse" data-target="#collapseThree">Filter Price</a>
                                </div>
                                <div id="collapseThree" class="collapse show" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="shop__sidebar__price">
                                            <ul>
                                                <li><input type="radio" name="price" {{ request('price')=='all'?'checked':'' }} value="all"> All</li>
                                                <li><input type="radio" name="price" {{ request('price')==1?'checked':'' }} value="1"> Rp.10.000 - Rp.50.000</li>
                                                <li><input type="radio" name="price" {{ request('price')==2?'checked':'' }} value="2"> Rp.50.000 - Rp.150.000</li>
                                                <li><input type="radio" name="price" {{ request('price')==3?'checked':'' }} value="3"> Rp.150.000 - Rp.300.000</li>
                                                <li><input type="radio" name="price" {{ request('price')==4?'checked':'' }} value="4"> 300.00+</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-heading">
                                    <a data-toggle="collapse" data-target="#collapseFour">Size</a>
                                </div>
                                <div id="collapseFour" class="collapse show" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="shop__sidebar__size">
                                            <label for="all" class="{{ request('size')=='all'?'active': '' }}">All
                                                <input type="radio" name="size" value="all" {{ request('size')=='all'?'checked':'' }} id="all">
                                            </label>
                                            <label for="xs" class="{{ request('size')=='XS'?'active': '' }}">xs
                                                <input type="radio" name="size" value="XS" {{ request('size')=='XS'?'checked':'' }} id="xs">
                                            </label>
                                            <label for="sm" class="{{ request('size')=='S'?'active': '' }}"">s
                                                <input type="radio" name="size" value="S" {{ request('size')=='S'?'checked':'' }} id="sm">
                                            </label>
                                            <label for="md" class="{{ request('size')=='M'?'active': '' }}"">m
                                                <input type="radio" name="size" value="M" {{ request('size')=='M'?'checked':'' }} id="md">
                                            </label>
                                            <label for="2xl" class="{{ request('size')=='L'?'active': '' }}"">l
                                                <input type="radio" name="size" value="L" {{ request('size')=='L'?'checked':'' }} id="l">
                                            </label>
                                            <label for="xl" class="{{ request('size')=='XL'?'active': '' }}">xl
                                                <input type="radio" name="size" value="XL" {{ request('size')=='XL'?'checked':'' }} id="xl">
                                        </label></div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <button class="btn btn-sm btn-primary" type="submit">Filter</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="shop__product__option">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="shop__product__option__left">
                                <p>Showing {{ $products->count() }} results</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <form action="{{ route('page.shop') }}" method="GET" class="shop__product__option__right">
                                <input type="hidden" name="size" value="{{ request('size') }}">
                                <input type="hidden" name="price" value="{{ request('price') }}">
                                <input type="hidden" name="category" value="{{ request('category') }}">
                                <p>Sort by Price:</p>
                                <select style="display: none;" name="sort_price" onchange="submit()">
                                    <option value="low_to_height" {{ request('sort_price')=='low_to_height'?'selected':'' }}>Low To High</option>
                                    <option value="height_to_low" {{ request('sort_price')=='height_to_low'?'selected':'' }}>Hight To Low</option>
                                </select>
                                <div class="nice-select" tabindex="0">
                                    <span class="current">{{ request('sort_price')=='low_to_height'?'Low To Height':'Height To Low' }}</span>
                                    <ul class="list">
                                        <li data-value="low_to_height" class="option {{ request('sort_price')=='low_to_height'?'selected':'' }}">Low To High</li>
                                        <li data-value="height_to_low" class="option {{ request('sort_price')=='height_to_low'?'selected':'' }}">Hight To Low</li>
                                    </ul>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($products as $product)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <livewire:product :product="$product"/>
                    </div>
                    @endforeach
                </div>
                {{-- <div class="row">
                    <div class="col-lg-12">
                        <div class="product__pagination">
                            <a class="active" href="#">1</a>
                            <a href="#">2</a>
                            <a href="#">3</a>
                            <span>...</span>
                            <a href="#">21</a>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</section>
@endsection
