@extends('layouts.default')
@section('content')
    <div class="row">
        <div class="col s12 card-panel">
            <h3>
                <i class="fa fa-comments"></i>検索キーワード : {{Input::get('words')}}
            </h3>
            <div class="panel-body recipe-body">
                @if($list->getIterator()->count())
                    @foreach($list as $row)
                        <p>
                            <i class="fa fa-cutlery"></i>
                            &nbsp;&nbsp;
                            <a href="{{route('home.recipe', ['one' => $row->recipe_id])}}" title="{{$row->title}}">
                                {{$row->title}}
                            </a>
                            &nbsp;/&nbsp;
                            <small>
                                <a href="{{route('home.category', ['one' => $row->category_id])}}">
                                    <span class="glyphicon glyphicon-link"></span>&nbsp;&nbsp;{{$row->name}}:カテゴリー
                                </a>
                            </small>
                        </p>
                    @endforeach
                    {!!$list->appends(['words' => \Input::get('words')])->setPath('search')->render()!!}
                @else
                    <span class="glyphicon glyphicon-search"></span>&nbsp;{{Input::get('words')}} 関連のレシピは見つかりませんでした
                @endif
            </div>
        </div>
    </div>

@stop