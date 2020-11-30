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
                        // console.log(response);

                    }
                })
            }

        });
        <?php }?>
    });
</script>
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
        @foreach($cartItem as $row)
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
                        <a href="" title="" id="update-cart">Cập nhật giỏ hàng</a>
                        <a href="?page=checkout" title="" id="checkout-cart">Thanh toán</a>
                    </div>
                </div>
            </td>
        </tr>
        </tfoot>
    </table>
</div>