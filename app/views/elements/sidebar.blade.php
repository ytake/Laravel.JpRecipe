<ul class="nav nav-stacked">
    <li><h3 class="highlight">Category</h3></li>
    @foreach($categories as $category)
    <li>
        <a href="{{route('home.category', ['one' => $category->category_id])}}"><strong>{{$category->name}}</strong>&nbsp;&nbsp;<span class="badge badge-info">{{$category->recipe_count}}</span></a>
    </li>
    @endforeach
</ul>
