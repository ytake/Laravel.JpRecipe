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
            投稿順
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <tr>
                        <th>#</th>
                        <th>タイトル</th>
                        <th>カテゴリ</th>
                        <th>作成者</th>
                    </tr>
                    @if(count($list))
                    @foreach($list as $row)
                    <tr>
                        <td>{{$row->recipe_id}}</td>
                        <td>{{$row->title}}</td>
                        <td>{{$row->name}}</td>
                        <td>&nbsp;</td>
                    </tr>
                    @endforeach
                    @endif
                </table>
            </div>
            {{$list->links()}}
        </div>
    </div>
</div>
@stop