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
<div class="title-back">
	<section id="title" class="search">
		<div>
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
</div>
