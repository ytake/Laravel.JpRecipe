<header class="navbar navbar-inverse navbar-fixed-top header-color" role="banner">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle bg-black" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="/"><img class="header-logo" src="/images/logos/logo.png" /></a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li>{{HTML::linkAction('auth.login', 'Login', null, ['alt' => "ログイン"])}}</li>
            </ul>
        </div>
    </div>
</header><!--/header-->
@if(!Request::is('auth/login*'))
<div class="title-back">
	<section id="title" class="search">
		<div>
			<div class="row">
				<div class="col-sm-12">
					<h1>レシピ検索</h1>
				</div>
			</div>
			{{\Form::open(['action' => 'search.index', 'method' => 'GET'])}}
				<div class="input-group">
					{{Form::text('words', Input::get('words'), ['class' => "form-control", 'autocomplete' => "off", 'placeholder' => "検索したいキーワードを入力して下さい"])}}
					<span class="input-group-btn">
						<button class="btn btn-danger" type="submit">
    						<i class="glyphicon glyphicon-search"></i>
						</button>
					</span>
				</div>
			{{\Form::close()}}
		</div>
	</section>
</div>
@endif
