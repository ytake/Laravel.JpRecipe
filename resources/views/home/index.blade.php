@extends('layouts.default')
@section('content')
    <div class="row">
        @include('elements.search')
        <div class="col s6">
            <div class="card white center">
                <div class="card-content">
                    <p class="promo-caption"><i class="fa fa-pie-chart"></i>&nbsp;最新レシピ</p>
                    <hr/>
                    <ul>
                        <li class="light center">
                            @foreach($latest as $late)
                                <i class="fa fa-cutlery"></i>
                                <a href="{{route('home.recipe', ['one' => $late->recipe_id])}}"
                                   title="{{$late->title}}">
                                    {{mb_strimwidth($late->title, 0, 50, "...")}}
                                </a><br/>
                                <small>
                                    <i class="fa fa-cogs"></i>
                                    <a href="{{route('home.category', ['one' => $late->category_id])}}">
                                        {{$late->name}}
                                    </a>/&nbsp;{{datetime_format($late->created_at, "%Y年%m月%d日 %H:%M")}}
                                </small>
                                <br/>
                            @endforeach
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col s6">
            <div class="card white center">
                <div class="card-content">
                    <p class="promo-caption"><i class="fa fa-line-chart"></i>&nbsp;人気レシピ</p>
                    <hr/>
                    <ul>
                        <li class="light center">
                            @foreach($popular as $row)
                                <i class="fa fa-cutlery"></i>
                                <a href="{{route('home.recipe', ['one' => $row->recipe_id])}}" title="{{$row->title}}">
                                    {{mb_strimwidth($row->title, 0, 50, "...")}}
                                </a><br/>
                                <small>
                                    <i class="fa fa-cogs"></i><a
                                            href="{{route('home.category', ['one' => $row->category_id])}}">
                                        {{$row->name}}
                                    </a>
                                    <i class="fa fa-eye"></i>&nbsp;&nbsp;{{$row->views}}:views
                                </small>
                                <br/>

                            @endforeach
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        @for($i = 1; $i <= count($sections); $i++)
            <div class="col s6">
                <div class="card white center">
                    <div class="card-content">
                        <a href="{{route('home.section', ['one' => $sections[$i - 1]->section_id])}}"
                           title="{{$sections[$i - 1]->description}}" class="pull-right"><i
                                    class="fa fa-search"></i></a>

                        <p class="promo-caption"><i class="fa fa-area-chart"></i>&nbsp;{{$sections[$i - 1]->name}}</p>
                        <hr/>
                        <ul>
                            <li>
                                @foreach($sections[$i - 1]->recipes as $recipe)
                                    <p class="light center">
                                        <i class="fa fa-share"></i>&nbsp;
                                        <a href="{{route('home.recipe', ['one' => $recipe->recipe_id])}}"
                                           title="{{$recipe->title}}">
                                            {{mb_strimwidth($recipe->title, 0, 50, "...")}}
                                        </a>
                                    </p>
                                @endforeach
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        @endfor
    </div>
    @include('elements.information')
@stop
