@extends('frontend.index')
@section('content')
    <style>
        .btn_2fA- {
            width: 160px;
            height: 45px;
            display: inline-block;
            padding: .6rem 1.2rem;
            text-align: center;
            color: #fff;
            background-color: #e5101d;
            border-radius: 3px;
            margin-right: 2px;
            margin-top: 30px;
        }

        #main-content-wp {
            background: #FFFFFF;
        }

        .imageSquare_1DFl, .home_cart {
            margin-left: 470px;
        }

        .title_1x2N {
            display: block;
            margin-left: 488px;
        }
    </style>

    <div id="main-content-wp" class="cart-page">
        <div class="section" id="breadcrumb-wp">
            <div class="wp-inner">
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <li>
                            <a href="?page=home" title="">Trang chủ</a>
                        </li>
                        <li>
                            <a href="" title=" ">Giỏ hàng </a>
                        </li>
                        <strong style="float:right"> GIỎ HÀNG CỦA BẠN ({{Cart::count()}}) </strong>
                    </ul>

                </div>
            </div>
        </div>

        <div id="wrapper" class="wp-inner clearfix">
            @if(Cart::count()>0)
                <div class="section" id="info-cart-wp">
                    <div id="updateDiv">
                        <div class="section-detail table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <td>Mã sản phẩm</td>
                                    <td>Ảnh sản phẩm</td>
                                    <td>Tên sản phẩm</td>
                                    <td>Giá sản phẩm</td>
                                    <td>Số lượng</td>
                                    <td colspan="2">Thành tiền</td>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $count = 1 ?>
                                @foreach(Cart::content() as $row)
                                    <tr>
                                        <td>{{$row->options->code}}</td>
                                        <td>
                                            <a href="" title="" class="thumb">
                                                <img src="{{asset($row->options->feature_image)}}" alt="">
                                            </a>
                                        </td>
                                        <td>
                                            <a href="" title="" class="name-product">{{$row->name}}</a>
                                        </td>
                                        <td>{{number_format($row->price)}}đ</td>
                                        <td>
                                            <input type="hidden" id="proId<?php echo $count; ?>" value="{{$row->id}}">
                                            <input type="hidden" id="rowId<?php echo $count; ?>" value="{{$row->rowId}}">
                                            <input type="number" name="qty" value="{{$row->qty}}"
                                                   class="num-order<?php echo $count; ?>">
                                        </td>
                                        <td>{{number_format($row->total)}}đ</td>
                                        <td>
                                            <a href="{{route('cart.remove',$row->rowId)}}" title="" class="del-product"><i
                                                        class="fa fa-trash-o"></i>Xóa</a>
                                        </td>
                                    </tr>
                                    <?php $count++;?>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="7">
                                        <div class="clearfix">
                                            <p id="total-price" class="fl-right">Tổng giá:
                                                <span>{{ Cart::total()}}đ</span>
                                            </p>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="7">
                                        <div class="clearfix">
                                            <div class="fl-right">
                                                <a href="?page=checkout" title="" id="checkout-cart">Thanh toán</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="section" id="action-cart-wp">
                    <div class="section-detail">
                        <a href="?page=home" title="" id="buy-more">Mua tiếp</a><br/>
                        <a href="{{route('cart.destroy')}}" title="" id="delete-cart">Xóa giỏ hàng</a>
                    </div>
                </div>
            @else
                <div class="contentEmpty_1POQ">
                    <div class="imageSquare_1DFl">
                        <img style="width: 85px;margin-left: 25px;margin-bottom: 3px "
                             src="{{asset('font/images/cart.png')}}" alt="Giỏ hàng đang trống">
                    </div>
                    <strong class="title_1x2N">Giỏ hàng đang trống</strong>
                    <a class="home_cart" href="{{route('home')}}">
                        <button class="btn_2fA-">Tiếp tục mua sắm</button>
                    </a></div>
            @endif

        </div>
    </div>
    <script>
        $(document).ready(function () {
            <?php for ($i = 1;$i < 20;$i++){ ?>
            $('.num-order<?php echo $i; ?>').on('change keyup', function () {
                var newqty = $('.num-order<?php echo $i; ?>').val();
                var rowId = $('#rowId<?php echo $i; ?>').val();
                var proId = $('#proId<?php echo $i; ?>').val();

                if (newqty <= 0) {
                    alert('enter only valid qty')
                } else {
                    $.ajax({
                        type: 'GET',
                        url: '<?php echo url('/frontend/cart/update'); ?>/' + proId,
                        dataType: 'html',
                        data: "qty=" + newqty + "&rowId=" + rowId + "&proId=" + proId,
                        success: function (response) {
                            $("#updateDiv").html(response);
                        }
                    })
                }

            });
            <?php }?>
        });
    </script>
@endsection