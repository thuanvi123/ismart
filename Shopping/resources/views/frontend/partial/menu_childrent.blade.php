@if($category->childrentCategory->count())
    <ul class="sub-menu">
        @foreach($category->childrentCategory as $categoryItem)
            <li>
                <a href="{{route('category',['slug'=>$categoryItem->slug,'id'=>$categoryItem->id])}}">
                    {{$categoryItem->name}}</a>
                @if($categoryItem->childrentCategory->count())
                    @include('frontend.partial.menu_childrent',['category'=>$categoryItem])
                @endif
            </li>
        @endforeach
    </ul>
@endif