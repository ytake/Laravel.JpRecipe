@section('styles')
<link href="/css/dataTables.bootstrap.css" rel="stylesheet" type='text/css' />
@stop
@section('content')
<h2>レシピ一覧</h2>
<h5></h5>
<div class="col-md-12">
    <!-- Advanced Tables -->
    {{\HTML::link(action('webmaster.recipe.form'), "レシピ追加", ['class'=>"btn btn-danger square-btn-adjust"])}}
    <div class="panel panel-default">
        <div class="panel-heading">
            {{Form::open(['route' => ['webmaster.recipe.list'], 'method' => 'get', 'role'=>"form", 'class'=>"form-inline"])}}
                {{Form::label('category_id', 'カテゴリー')}}
                {{Form::select('category_id', $categories, Input::get('category_id'), ['class'=>"form-control"])}}
                <button type="submit" class="btn btn-default">検索</button>
            {{Form::close()}}
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <tr>
                        <th>タイトル</th>
                        <th>カテゴリ</th>
                        <th>詳細</th>
                        <th>&nbsp;</th>
                    </tr>
                    @if(count($list))
                    @foreach($list as $row)
                    <tr>
                        <td>{{$row->title}}</td>
                        <td>{{$row->name}}</td>
                        <td>
                            {{HTML::link(action('webmaster.recipe.show', ['one' => $row->recipe_id]), '詳細', ['class' => 'btn btn-info btn-xs'])}}
                        </td>
                        <td>&nbsp;</td>
                    </tr>
                    @endforeach
                    @endif
                </table>
            </div>
            {{$list->appends(Input::only(['category_id']))->links()}}
        </div>
    </div>
</div>
@stop