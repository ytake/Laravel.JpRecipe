<div class="container">
    @if(!Request::is('auth/login*'))
    @include('elements.disqus')
    @endif
</div>
<section id="bottom" class="wet-asphalt">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <h4>Laravel JP</h4>
            </div><!--/.col-md-3-->
            <div class="col-md-3 col-sm-6">
                <h4>Contributors</h4>
                <div>
                    <ul class="arrow">
                        <li>sample.name</li>
                    </ul>
                </div>
            </div><!--/.col-md-3-->
            <div class="col-md-3 col-sm-6">
                <h4>日本語書籍</h4>
                <div>
                    <ul class="arrow">
                        <li>sample.name</li>
                    </ul>
                </div>
            </div><!--/.col-md-3-->
            <div class="col-md-3 col-sm-6">
                <h4>Author</h4>
                <address>
                    <strong>Yuuki Takezawa</strong><br>
                </address>
            </div>
            <!--/.col-md-3-->
        </div>
    </div>
</section><!--/#bottom-->
<footer id="footer" class="midnight-blue">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                Laravel Recipes(JP) &copy; 2014 yuuki takezawa. All Rights Reserved.
            </div>
            <div class="col-sm-6">
                <ul class="pull-right">
                    <li><a href="/">Home</a></li>
                    <li><a href="#">Faq</a></li>
                    <li>
                        <a id="gototop" class="gototop" href="#">
                            <span class="glyphicon glyphicon-chevron-up"></span>
                        </a>
                    </li>
                    <!--#gototop-->
                </ul>
            </div>
        </div>
    </div>
</footer><!--/#footer-->