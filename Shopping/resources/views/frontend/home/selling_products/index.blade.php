<div class="section" id="selling-wp">
    <div class="section-head">
        <h3 class="section-title">Sản phẩm bán chạy</h3>
    </div>
    <div class="section-detail">
        <ul class="list-item">
            @foreach($selling_product as $productItem)
                <li class="clearfix">
                    <a href="{{route('product.detail',[$productItem->slug,$productItem->id])}}" title="" class="thumb fl-left">
                        <img src="{{asset($productItem->feature_image)}}" alt="">
                    </a>
                    <div class="info fl-right">
                        <a href="?page=detail_product" title="" class="product-name">{{$productItem->name}}</a>
                        <div class="price">
                            <span class="new">{{number_format($productItem->price)}}đ</span>
{{--                            <span class="old">7.190.000đ</span>--}}
                        </div>
                        <a href="" title="" class="buy-now">Mua ngay</a>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>