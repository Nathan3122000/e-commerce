<div class="product__item">
    <div class="product__item__pic set-bgs" style="background-image: url('{{ asset($product->image) }}')">
        <span class="label">New</span>
        <ul class="product__hover">
            <li onclick="addToCart({{ $product->id }})"><img src="{{ asset('assets/images') }}/icon/cart.png" alt=""></li>
            <li onclick="addToLike({{ $product->id }})"><img src="{{ asset('assets/images') }}/icon/heart.png" alt=""></li>
        </ul>
    </div>
    <div class="product__item__text">
        <h6>{{ $product->product_name }}</h6>
        <a href="{{ route('page.product',$product) }}" class="add-cart">Show Detail</a>
        <div class="rating">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
        </div>
        <h5>Rp. {{ number_format($product->price) }}</h5>
    </div>
</div>
