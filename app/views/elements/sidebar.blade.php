<ul class="nav nav-stacked">
    <li>
        <div class="fb-like" data-href="{{url()}}" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
    </li>
    <li>
        <a href="https://twitter.com/share" class="twitter-share-button" data-url="{{url()}}" data-text="laravel-recipes.comnect.jp.net">Tweet</a>
    </li>
    <li>
        <a href="http://b.hatena.ne.jp/entry/{{url()}}" class="hatena-bookmark-button" data-hatena-bookmark-title="111111" data-hatena-bookmark-layout="standard-balloon" data-hatena-bookmark-lang="ja" title="このエントリーをはてなブックマークに追加"><img src="http://b.st-hatena.com/images/entry-button/button-only@2x.png" alt="このエントリーをはてなブックマークに追加" width="20" height="20" style="border: none;" /></a>
    </li>
    <li>
        <div class="g-plus" data-action="share" data-href="{{url()}}"></div>
    </li>
</ul>
<ul class="nav nav-stacked">
    <li><h3 class="highlight">Category</h3></li>
    @foreach($categories as $category)
    <li>
        <a href="{{route('home.category', ['one' => $category->category_id])}}"><strong>{{$category->name}}</strong>&nbsp;&nbsp;<span class="badge badge-info">{{$category->recipe_count}}</span></a>
    </li>
    @endforeach
</ul>
