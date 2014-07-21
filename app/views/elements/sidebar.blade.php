<div class="col col-sm-3">
    <div id="sidebar">
        <div id="reactCategory"></div>
        <ul class="nav nav-stacked">
            <li><h3 class="highlight">Category<i class="glyphicon glyphicon-dashboard pull-right"></i></h3></li>
            @foreach($categories as $category)
            <li><a href="#"><strong>{{$category->name}}</strong></a></li>
            @endforeach
        </ul>
    </div>
</div>