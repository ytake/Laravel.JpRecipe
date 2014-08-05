@extends('layouts.default')
@section('scripts')
@stop
@section('content')
<section class="container">
    <div class="row">
        <aside class="col-sm-3 col-sm-push-9">
            <div class="widget categories">
                @include('elements.sidebar')
            </div><!--/.categories-->
        </aside>
        <div class="col-sm-9 col-sm-pull-3">
            <div class="recipe-content">
                <div class="recipe-item">
                    <div id="pricing-table" class="row">
                        <div class="col-md-12 col-xs-12">
                            <h1><span class="glyphicon glyphicon-glass"></span>{{$category->name}} カテゴリー</h1>
                            <p class="lead">{{$category->description}}</p>
                            <hr />
                            @foreach($list as $row)
                            <p><span class="glyphicon glyphicon-cutlery">&nbsp;{{HTML::linkAction('home.recipe', $row->title, ['one' => $row->recipe_id], ['alt' => $row->title, 'title' => $row->title])}}</p>
                            @endforeach
                        </div><!--/.col-md-3-->
                    </div>
                </div>
            </div>
        </div><!--/.col-md-8-->
    </div><!--/.row-->
</section>
@stop