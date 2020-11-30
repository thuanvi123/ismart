@extends('admin.layouts.master')
@section('title')
    Danh sách đơn hàng
@endsection
@section('content')
    <style>
        .label {
            display: inline;
            padding: .2em .6em .3em;
            font-size: 75%;
            font-weight: 700;
            line-height: 1;
            color: #fff;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: .25em;
        }

        .label-default {
            background-color: #777;
        }

        .label-success {
            background-color: #5cb85c;
        }

        .label-danger {
            background-color: #d9534f;
        }

    </style>

    <div id="content" class="container-fluid">
        <div class="card">
            <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
                <h5 class="m-0 ">Danh sách đơn hàng</h5>
                <div class="form-search form-inline">
                    <form action="#">
                        <input type="" class="form-control form-search" placeholder="Tìm kiếm">
                        <input type="submit" name="btn-search" value="Tìm kiếm" class="btn btn-primary">
                    </form>
                </div>
            </div>
            <div class="card-body">
                <div class="analytic">
                    <a href="" class="text-primary">Trạng thái 1<span class="text-muted">(10)</span></a>
                    <a href="" class="text-primary">Trạng thái 2<span class="text-muted">(5)</span></a>
                    <a href="" class="text-primary">Trạng thái 3<span class="text-muted">(20)</span></a>
                </div>
                <div class="form-action form-inline py-3">
                    <select class="form-control mr-1" id="">
                        <option>Chọn</option>
                        <option>Tác vụ 1</option>
                        <option>Tác vụ 2</option>
                    </select>
                    <input type="submit" name="btn-search" value="Áp dụng" class="btn btn-primary">
                </div>
                <table class="table table-striped table-checkall">
                    <thead>
                    <tr>
                        <th>
                            <input type="checkbox" name="checkall">
                        </th>
                        <th scope="col">#</th>
                        <th scope="col">Khách hàng</th>
                        <th scope="col">Địa chỉ</th>
                        <th scope="col">Giá trị</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Tác vụ</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>
                                <input type="checkbox">
                            </td>
                            <td>{{$order->id}}</td>
                            <td>
                                {{$order->name}} <br>
                                {{$order->phone}}
                            </td>
                            <td>{{$order->address}}</td>
                            <td>{{number_format($order->total_price)}}₫</td>
                            <td>
                                <a href="{{route('admin.get.action.order',['active',$order->id])}}" class="badge  {{$order->getStatus($order->status)['class']}}">{{$order->getStatus($order->status)['name']}}</a>
                            </td>
                            <td>
                                <a href="" class="label label-danger btn-sm rounded-0 text-white" type="button"
                                   data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                                <a href="{{route('admin.get.view.order',$order->id)}}" data-id="{{$order->id}}"
                                   class="label label-default btn-sm rounded-0 text-white js_order_item"
                                   type="button"><i class="fa fa-eye" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$orders->links()}}
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="myModalOrder" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Chi tiết mã đơn hàng #<b class="order_id"></b></h4>
                </div>
                <div class="modal-body" id="md_content">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
@endsection
@section('js')
    <script>
        $(function () {
            $(".js_order_item").click(function (event) {
                event.preventDefault();
                let $this = $(this);
                let url = $this.attr('href');
                $("#md_content").html('');

                $("#myModalOrder").modal("show");
                $('.order_id').text('').text($this.attr('data-id'));
                $.ajax({
                    url: url,
                }).done(function (result) {
                    console.log(result);
                    if (result) {
                        $("#md_content").append(result);
                    }
                });
            });

        })
    </script>
@endsection