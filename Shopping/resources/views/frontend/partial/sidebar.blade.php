<style>
    .colo{
        color: #352727;
    }
</style>
<div class="sidebar fl-left">
    <div class="section" id="category-product-wp">
        <div class="section-head">
            <h3 class="section-title">Danh mục sản phẩm</h3>
        </div>
        <div class="secion-detail">
            <ul class="list-item">
                @foreach($categories as $category)
                    <li>
                        <a href="{{route('category',['slug'=>$category->slug,'id'=>$category->id])}}" title="">{{$category->name}}</a>
                        @include('frontend.partial.menu_childrent',['category'=>$category])
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="section" id="filter-product-wp">
        <div class="section-head">
            <h3 class="section-title">Bộ lọc</h3>
        </div>
        <div class="section-detail">
            <ul>
                <li><a class="colo{{Request::get('price')==1?'active':''}}" href="{{request()->fullUrlWithQuery(['price' => '1'])}}">Dưới 1.000.000đ</a> </li>
                <li><a class="colo{{Request::get('price')==2?'active':''}}"  href="{{request()->fullUrlWithQuery(['price' => '2'])}}">1.000.000-3.000.000đ</a> </li>
                <li><a class="colo{{Request::get('price')==3?'active':''}}"  href="{{request()->fullUrlWithQuery(['price' => '3'])}}">3.000.000-5.000.000đ</a> </li>
                <li><a class="colo{{Request::get('price')==4?'active':''}}"  href="{{request()->fullUrlWithQuery(['price' => '4'])}}">5.000.000-10.000.000đ</a> </li>
                <li><a class="colo{{Request::get('price')==5?'active':''}}"  href="{{request()->fullUrlWithQuery(['price' => '5'])}}">10.000.000-25.000.000đ</a> </li>
                <li><a class="colo{{Request::get('price')==6?'active':''}}"  href="{{request()->fullUrlWithQuery(['price' => '6'])}}">Lớn hơn 25.000.000đ</a> </li>

            </ul>
        </div>
    </div>
    <div class="section" id="banner-wp">
        <div class="section-detail">
            <a href="?page=detail_product" title="" class="thumb">
                <img src="public/images/banner.png" alt="">
            </a>
        </div>
    </div>
</div>