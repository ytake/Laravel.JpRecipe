@extends('layouts.default')
@section('styles')
<link href="/css/dist/prism/prism.css" rel="stylesheet" />
@stop
@section('scripts')
<script src="//cdnjs.cloudflare.com/ajax/libs/prism/0.0.1/prism.min.js"></script>
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
                            <h1><img src="/images/logos/laravel_jp.png" width="45px" height="45px">{{$recipe->title}}</h1>
                            <table class="table">
                                <tr>
                                    <td>
                                        <h2>
                                            <span class="glyphicon glyphicon-question-sign"></span>&nbsp;&nbsp;悩み事
                                        </h2>
                                        {{Markdown::render($recipe->problem)}}
                                        <h2>
                                            <span class="glyphicon glyphicon-info-sign"></span>&nbsp;&nbsp;解決方法
                                        </h2>
                                        {{Markdown::render($recipe->solution)}}
                                        <h2>
                                            <span class="glyphicon glyphicon-info-sign"></span>&nbsp;&nbsp;アドバイス
                                        </h2>
                                        {{Markdown::render($recipe->discussion)}}
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/.col-md-8-->
    </div><!--/.row-->
</section>
@stop