<div class="navbar navbar-static">
    <div class="container">
        <a class="navbar-toggle" data-toggle="collapse" data-target=".nav-collapse">
            <span class="glyphicon glyphicon-chevron-down"></span>
        </a>
        <div class="nav-collapse collase">
            <ul class="nav navbar-nav">
                <li><a href="/">Home</a></li>
                <li><a href="#">Contents</a></li>
                <li><a href="#">FAQ</a></li>
            </ul>
            <ul class="nav pull-right navbar-nav">
                <li >
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-user"></i> <i class="glyphicon glyphicon-chevron-down"></i></a>
                    <ul class="dropdown-menu">
                        <li>{{HTML::linkAction('auth.login', 'Login', null, ['alt' => "ログイン"])}}</li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- /.navbar -->