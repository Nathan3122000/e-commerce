<ul class="navbar-nav flex-column">
    <li class="nav-divider">
        Overview
    </li>
    <li class="nav-item">
        <a class="nav-link {{ isActive('/') }}" href="{{ route('dashboard') }}"><i class="fa fa-fw fa-adjust"></i>Dashboard</a>
    </li>
    <li class="nav-divider">
        Master Data
    </li>
    <li class="nav-item">
        <a class="nav-link {{ isActive('category') }}" href="{{ route('category.index') }}"><i class="fa fa-fw fa-box-open"></i>Category Product</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ isActive('customer') }}" href="{{ route('customer.index') }}"><i class="fa fa-fw fa-users"></i>Customer</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ isActive('payment-method') }}" href="{{ route('payment-method.index') }}"><i class="fa fa-fw fa-credit-card"></i>Payment Method</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ isActive('shipment') }}" href="{{ route('shipment.index') }}"><i class="fa fa-fw fa-truck"></i>Shipment</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ isActive('product') }}" href="{{ route('product.index') }}"><i class="fa fa-fw fa-box"></i>Produk</a>
    </li>
    <li class="nav-divider">
        Order
    </li>
    <li class="nav-item">
        <a class="nav-link {{ isActive('cart') }}" href="{{ route('cart.user') }}"><i class="fa fa-fw fa-shopping-bag"></i>Cart List</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ isActive('order') }}" href="{{ route('order.index') }}"><i class="fa fa-fw fa-shopping-cart"></i>All Order</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ isActive('order.process',url('admin/get/order/IN%20PROCESS')) }}" href="{{ route('order.filter',['name'=>'IN PROCESS']) }}"><i class="fa fa-fw fa-hourglass-end"></i>Order In Process</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ isActive('order.delivery',url('admin/get/order/ON%20DELIVERY')) }}" href="{{ route('order.filter',['name'=>'ON DELIVERY']) }}"><i class="fa fa-fw fa-truck-moving"></i>Order On Delivery</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ isActive('order.arrived',url('admin/get/order/ARRIVED')) }}" href="{{ route('order.filter',['name'=>'ARRIVED']) }}"><i class="fa fa-fw fa-check-circle"></i>Order Arrived</a>
    </li>
</ul>


{{-- <li class="nav-item ">
    <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fa-fw fa-user-circle"></i>Dashboard <span class="badge badge-success">6</span></a>
    <div id="submenu-1" class="collapse submenu" style="">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1-2" aria-controls="submenu-1-2">E-Commerce</a>
                <div id="submenu-1-2" class="collapse submenu" style="">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="index.html">E Commerce Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="ecommerce-product.html">Product List</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="ecommerce-product-single.html">Product Single</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="ecommerce-product-checkout.html">Product Checkout</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="dashboard-finance.html">Finance</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="dashboard-sales.html">Sales</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1-1" aria-controls="submenu-1-1">Infulencer</a>
                <div id="submenu-1-1" class="collapse submenu" style="">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="dashboard-influencer.html">Influencer</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="influencer-finder.html">Influencer Finder</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="influencer-profile.html">Influencer Profile</a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</li> --}}
