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
                        <a class="btn btn-info center-block" href="https://github.com/ytake/Laravel.JpRecipe" alt="Laravel.JpRecipe">Laravel.JpRecipe</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading">レシピを探す</div>
                <div class="panel-body">
                    LaravelのFacadeに沿って、レシピを探す事ができます。<br />
                    希望のレシピが無い、レシピを持っているよ！という方はお気軽にご連絡、<br />
                    またはレシピをGitHub等を通じて送って下さい。<br />
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
                            {{HTML::link($feed->link, $feed->content)}}&nbsp;
                            <small>release:{{date('Y-m-d H:i', strtotime($feed->dateModified->date))}}</small>
                        </li>
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>