<div class="panel panel-default">
    <div class="panel-body">
        <ul class="nav nav-stacked pt35 pc-sns-btn">
            <li>
                <div class="fb-like" data-href="{{Request::url()}}" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
            </li>
            <li>
                <a href="https://twitter.com/share" class="twitter-share-button" data-url="{{Request::url()}}" data-text="@yield('title', Config::get('recipe.title'))">Tweet</a>
            </li>
            <li>
                <a href="http://b.hatena.ne.jp/entry/{{Request::url()}}" class="hatena-bookmark-button" data-hatena-bookmark-title="@yield('title', Config::get('recipe.title'))" data-hatena-bookmark-layout="standard-balloon" data-hatena-bookmark-lang="ja" title="このエントリーをはてなブックマークに追加"><img src="http://b.st-hatena.com/images/entry-button/button-only@2x.png" alt="このエントリーをはてなブックマークに追加" width="20" height="20" style="border: none;" /></a>
            </li>
            <li>
                <div class="g-plus" data-action="share" data-href="{{Request::url()}}"></div>
            </li>
        </ul>
    </div>
</div>
<div class="panel panel-default panel-feed">
    <div class="panel-body">
        <a href="/feed/atom" alt="Laravel recipes(JP) Atom feed" title="Laravel recipes(JP) Atom feed" target="_blank"><img src="/images/rss-64.png"></a>
        <a href="/feed/rss" alt="Laravel recipes(JP) RSS feed" title="Laravel recipes(JP) RSS feed" target="_blank"><img src="/images/rss-64-black.png"></a>
        <a href="https://github.com/ytake/Laravel.JpRecipe" alt="Laravel.JpRecipe" title="Laravel.JpRecipe" target="_blank"><img src="/images/github-64.png"></a>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading"><h4>Category</h4></div>
    <div class="panel-body">
        <ul class="list-group">
        @foreach($categories as $category)
            <li class="list-group-item">
                <a href="{{route('home.category', ['one' => $category->category_id])}}" alt="{{$category->description}}" title="{{$category->description}}"><strong>{{$category->name}}</strong>&nbsp;&nbsp;<span class="badge badge-info">{{$category->recipe_count}}</span></a>
            </li>
        @endforeach
        </ul>
    </div>
</div>
