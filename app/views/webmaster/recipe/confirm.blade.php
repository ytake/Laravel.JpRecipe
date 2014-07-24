@section('styles')
<link href="/css/dataTables.bootstrap.css" rel="stylesheet" type='text/css' />
@stop
@section('scripts')
@stop
@section('content')
<h2>レシピ追加</h2>
<h5>レシピの追加ができます</h5>
<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="table-responsive">
                {{Form::open(['route' => ['webmaster.recipe.apply', 'id' => $id], 'role'=>"form"])}}
                    {{$hidden}}
                    <div class="form-group">
                        {{Form::label('title', 'レシピ タイトル')}}
                        {{Input::get('title')}}
                    </div>
                    <div class="form-group">
                        {{Form::label('category_id', 'カテゴリー')}}
                        {{Form::select('category_id', $categories, Input::get('category_id'), ['class'=>"form-control", 'disabled'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('problem', '困った時')}}
                        {{Input::get('problem')}}
                    </div>
                    <div class="form-group">
                        {{Form::label('solution', '解決策:markdown記法')}}
                        <div id="markdown">
                            {{Input::get('solution')}}
                        </div>
                    </div>
                    {{Form::submit('戻る', ['class' => "btn btn-warning", 'name' => '_return'])}}
                    {{Form::submit('レシピを追加', ['class' => "btn btn-primary", 'name' => '_apply'])}}
                {{Form::close()}}
            </div>
        </div>
    </div>
</div>
@stop