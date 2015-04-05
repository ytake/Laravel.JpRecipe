<div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
    <a class="btn-floating waves-effect red waves-light btn modal-trigger" href="#about">
        <i class="fa fa-info-circle"></i>
    </a>
</div>
<div id="about" class="modal" style="z-index: 10000;">
    <div class="modal-content">
        <p>
            このサイトは<a href="http://laravel-recipes.com/" target="_blank" title="Laravel Recipes">Laravel Recipes</a>のレシピを日本語訳にしたものと、<br/>
            日本独自のレシピを含んでします。<br/>
            レシピの要望等がありましたら、お気軽にご連絡ください。<br/>
            またこのサイトはオープンソースで公開されています。<br/>
            Laravelの学習等にお役立てください<br/>
            <a class="label label-laravel" href="https://github.com/ytake/Laravel.JpRecipe"
               title="Laravel.JpRecipe">Laravel.JpRecipe</a>
        </p>
        <ul class="linker">
            <li><a href="http://laravel.com" target="_blank">Laravel</a></li>
            <li><a href="http://laravel.jp" target="_blank">Laravel(JP)</a></li>
            <li><a href="http://readouble.com/" target="_blank">ドキュメント</a></li>
            <li><a href="{{route('faq.index')}}">FAQ</a></li>
            <li><a href="{{route('feed.index', ['atom'])}}" title="Laravel recipes(JP) Atom feed" target="_blank">Atom&nbsp;<img
                            src="/images/rss-16-black.png"></a></li>
            <li><a href="{{route('feed.index', ['rss'])}}" title="Laravel recipes(JP) RSS feed" target="_blank">RSS&nbsp;<img
                            src="/images/rss-16-black.png"></a></li>
        </ul>
    </div>
</div>
