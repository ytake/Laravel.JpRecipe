<ul id="nav-mobile" class="side-nav fixed">
    <li class="no-padding">
        <ul class="collapsible collapsible-accordion">
            <li class="logo">
                <a id="logo-container" href="{{route('home.index')}}">
                    <img src="/images/logos/laravel-slant.png" alt="laravel logo" class="logo">
                </a>
            </li>
            @foreach($categories as $category)
                <li class="list-group-item">
                    <a href="{{route('home.category', ['one' => $category->category_id])}}"
                       title="{{$category->description}}" class="collection-item">
                        <strong class="basic">{{$category->name}}</strong>
                        <span class="badge">{{$category->recipe_count}}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </li>
</ul>
