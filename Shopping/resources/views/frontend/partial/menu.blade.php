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