    <table class="table table-striped table-checkall">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Tên sản phẩm</th>
            <th scope="col">Hình ảnh</th>
            <th scope="col">Số lượng </th>
            <th scope="col">Thành tiền</th>
            <th scope="col">Thao tác</th>
        </tr>
        </thead>
        <tbody>
        <?php $i=1; ?>
        @foreach($order_detail as $orders)
            <tr>
                <td>{{$i}}</td>
                <td>{{$orders->product->name}}</td>
                <td><img style="height: 40px" src="{{asset($orders->product->feature_image)}}"></td>
                <td>{{$orders->qty}}</td>
                <td>{{number_format($orders->price)}}₫</td>
                <td>
                    <a href="" class="label label-danger btn-sm rounded-0 text-white" type="button"
                       data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
            <?php $i++ ?>
        @endforeach
        </tbody>
    </table>
