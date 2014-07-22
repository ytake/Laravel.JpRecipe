<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
            <li>
                <a @if(Request::is("webmaster"))class="active-menu"@endif href="/webmaster">
                    <i class="fa fa-dashboard fa-3x"></i> Dashboard
                </a>
            </li>
            <li>
                <a @if(Request::is("webmaster/recipe*"))class="active-menu"@endif href="/webmaster/recipe/list">
                    <i class="fa fa-desktop fa-3x"></i>レシピ
                </a>
            </li>
        </ul>
    </div>
</nav>