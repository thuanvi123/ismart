<div id="header-wp">
    @include('frontend.partial.menu_header')
    <div id="head-body" class="clearfix">
        <div class="wp-inner">
            <a href="?page=home" title="" id="logo" class="fl-left"><img
                        src="{{asset('font/images/logo.png')}}"/></a>
            <div id="search-wp" class="fl-left">
                <form method="get" action="{{url('frontend/search')}}">
                    @csrf
                    <input type="search" name="Search" value="{{request()->input('Search')}}" id="s" placeholder="Nhập từ khóa tìm kiếm tại đây!">
                    <button type="sb" id="sm-s">Tìm kiếm</button>
                </form>
            </div>
            <div id="action-wp" class="fl-right">
                <div id="advisory-wp" class="fl-left">
                    <span class="title">Tư vấn</span>
                    <span class="phone">{{getConfigValueSettingTable('phone_contact')}}</span>
                </div>
                <div id="btn-respon" class="fl-right"><i class="fa fa-bars" aria-hidden="true"></i></div>
                <a href="{{route('cart.show_add')}}" title="giỏ hàng" id="cart-respon-wp" class="fl-right">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    <span id="num">{{Cart::count()}}</span>
                </a>
                <div id="cart-wp" class="fl-right">
                    <div id="btn-cart">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        <span id="num">{{Cart::count()}}</span>
                    </div>
                    @if(Cart::count()>0)
                        <div id="dropdown">
                            <p class="desc">Có <span>{{Cart::count()}} sản phẩm</span> trong giỏ hàng</p>
                            <ul class="list-cart">
                                @foreach(Cart::content() as $row)
                                    <li class="clearfix">
                                        <a href="" title="" class="thumb fl-left">
                                            <img src="{{asset($row->options->feature_image)}}" alt="">
                                        </a>
                                        <div class="info fl-right">
                                            <a href="" title="" class="product-name">{{$row->name}}</a>
                                            <p class="price">{{number_format($row->total)}}đ</p>
                                            <p class="qty">Số lượng: <span>{{$row->qty}}</span></p>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="total-price clearfix">
                                <p class="title fl-left">Tổng:</p>
                                <p class="price fl-right">{{Cart::subtotal()}}đ</p>
                            </div>
                            <dic class="action-cart clearfix">
                                <a href="{{url('frontend/cart/show-add')}}" title="Giỏ hàng" class="view-cart fl-left">Giỏ
                                    hàng</a>
                                <a href="{{route('payment.index')}}" title="Thanh toán" class="checkout fl-right">Thanh
                                    toán</a>
                            </dic>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>