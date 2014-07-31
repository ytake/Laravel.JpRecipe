@section('styles')
<link href="/css/dataTables.bootstrap.css" rel="stylesheet" type='text/css' />
@stop
@section('content')
<h2>カテゴリー一覧</h2>
<h5></h5>
<div class="col-md-12">
    <!-- Advanced Tables -->
    {{\HTML::link(action('webmaster.category.form'), "カテゴリー追加", ['class'=>"btn btn-danger square-btn-adjust"])}}
    <div class="panel panel-default">
        <div class="panel-heading">
            {{Form::open(['route' => ['webmaster.category.list'], 'method' => 'get', 'role'=>"form", 'class'=>"form-inline"])}}
                {{Form::label('section_id', 'セクション')}}
                {{Form::select('section_id', $sections, Input::get('section_id'), ['class'=>"form-control"])}}
                <button type="submit" class="btn btn-default">検索</button>
            {{Form::close()}}
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <tr>
                        <th>カテゴリー名</th>
                        <th>詳細</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </tr>
                    @if(count($list))
                    @foreach($list as $row)
                    <tr>
                        <td>{{$row->name}}</td>
                        <td>{{$row->description}}</td>
                        <td>
                            {{HTML::link(action('webmaster.category.show', ['one' => $row->category_id]), '詳細', ['class' => 'btn btn-info btn-xs'])}}
                        </td>
                        <td>&nbsp;</td>
                    </tr>
                    @endforeach
                    @endif
                </table>
            </div>
        </div>
    </div>
</div>
@stop