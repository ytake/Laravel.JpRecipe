    <div class="row">
        <div class="col-md-6 col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading">このレシピサイトについて</div>
                <div class="panel-body">
                    <p>
                        このサイトは<a href="http://laravel-recipes.com/" target="_blank" alt="Laravel Recipes">Laravel Recipes</a>のレシピを日本語訳にしたものと、<br />
                        日本独自のレシピを含んでします。<br />
                        レシピの要望等がありましたら、お気軽にご連絡ください。<br />
                        またこのサイトはオープンソースで公開されています。<br />
                        Laravelの学習等にお役立てください<br />
                        <a class="label label-info" href="https://github.com/ytake/Laravel.JpRecipe" alt="Laravel.JpRecipe">Laravel.JpRecipe</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading">feed</div>
                <div class="panel-body">
                    <a href="/feed/atom" alt="Laravel recipes(JP) Atom feed" title="Laravel recipes(JP) Atom feed" target="_blank"><img src="/images/rss-64.png"></a>
                    <a href="/feed/rss" alt="Laravel recipes(JP) RSS feed" title="Laravel recipes(JP) RSS feed" target="_blank"><img src="/images/rss-64-black.png"></a>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default text-center">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;Packalyst::Latest Packages
                </div>
                <div class="panel-body">
                    <ul class="list-unstyled">
                    @foreach($feeder as $feed)
                        <li>
                            <span class="glyphicon glyphicon-send"></span>&nbsp;&nbsp;
                            {{HTML::link($feed->link, $feed->title, ['title' => $feed->content])}}&nbsp;
                            <small>release:{{date('Y-m-d H:i', strtotime($feed->dateModified->date))}}</small>
                        </li>
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>