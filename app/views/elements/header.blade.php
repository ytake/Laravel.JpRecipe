<header class="navbar navbar-inverse navbar-fixed-top wet-asphalt" role="banner">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Laravel Recipes(日本語版)

            </a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="/">Home</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Category <span class="glyphicon glyphicon-chevron-down"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="career.html">Career</a></li>
                    </ul>
                </li>
                <li>{{HTML::linkAction('auth.login', 'Login', null, ['alt' => "ログイン"])}}</li>
            </ul>
        </div>
    </div>
</header><!--/header-->
<section id="title" class="search">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1>レシピ検索</h1>
            </div>
        </div>
        <form role="form">
            <div class="input-group">
                <input type="text" class="form-control" autocomplete="off" placeholder="Search">
                <span class="input-group-btn">
                    <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-search"></i></button>
                </span>
            </div>
        </form>
    </div>
</section>