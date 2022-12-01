<div class="site-navbar-top">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
                <form action="/ket-qua" method="GET" class="site-block-top-search">
                    <span class="icon icon-search2"></span>
                    <input type="text" class="form-control border-0" placeholder="tìm kiếm sản phẩm" name="query">

                </form>
            </div>

            <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
                <div class="site-logo">
                    <a href="#" class="js-logo-clone">Shoppers</a>
                </div>
            </div>

            <div class="col-6 col-md-4 order-3 order-md-3 text-right">
                <div class="site-top-icons">
                    <ul>
                        <li><a href="{{ route('login') }}"><span class="icon icon-person"></span></a></li>
                        <li>

                            <div class="dropdown">                               
                                <a href="#" class="site-cart" data-toggle="dropdown">
                                    <span class="icon icon-shopping_cart"></span>
                                    <span class="count">{{ count((array) session('cart')) }}</span>
                                </a>
                                <div class="dropdown-menu">
                                    <div class="row total-header-section">
                                        <div class="col-lg-6 col-sm-6 col-6">
                                            <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span
                                                class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                                        </div>
                                        @php $total = 0 @endphp
                                        @foreach ((array) session('cart') as $id => $details)
                                            @php $total += $details['price'] * $details['quantity'] @endphp
                                        @endforeach
                                        <div class="col-lg-6 col-sm-6 col-6 total-section text-right">
                                            <p>Total: <span class="text-info">{{ $total }} VND</span></p>
                                        </div>
                                    </div>
                                    @if (session('cart'))
                                        @foreach (session('cart') as $id => $details)
                                            <div class="row cart-detail">
                                                <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                                    <img src="{{ $details['image'] }}" />
                                                </div>
                                                <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                                    <p>{{ $details['name'] }}</p>
                                                    <span class="price text-info"> {{ $details['price'] }} VND</span> <span
                                                        class="count"> Số lượng:{{ $details['quantity'] }}</span>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                    <div class="row">
                                        <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                                            <a href="{{ route('cart') }}" class="btn btn-primary btn-block text-white">Xem giỏ hàng</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="d-inline-block d-md-none ml-md-0"><a href="#"
                                class="site-menu-toggle js-menu-toggle"><span class="icon-menu"></span></a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>
@if(session('success'))
<div class="alert alert-success">
  {{ session('success') }}
</div> 
@endif
