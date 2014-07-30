@section('styles')
<link href="/css/dataTables.bootstrap.css" rel="stylesheet" type='text/css' />
@stop
@section('scripts')
@stop
@section('content')
<h2>カテゴリー@if($id) 編集@else 追加@endif</h2>
<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="table-responsive">
                {{Form::open(['route' => ['webmaster.category.apply', 'one' => $id], 'role'=>"form"])}}
                    {{$hidden}}
                    <div class="form-group">
                        {{Form::label('name', 'カテゴリー名')}}
                        {{e(Input::get('name'))}}
                    </div>
                    <div class="form-group">
                        {{Form::label('section_id', 'セクション')}}
                        {{Form::select('section_id', $sections, Input::get('section_id'), ['class'=>"form-control", 'disabled'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('description', '詳細')}}
                        {{e(Input::get('description'))}}
                    </div>
                    {{Form::submit('戻る', ['class' => "btn btn-warning", 'name' => '_return'])}}
                    @if($id)
                    {{Form::submit('カテゴリーを編集', ['class' => "btn btn-primary", 'name' => '_apply'])}}
                    @else
                    {{Form::submit('カテゴリーを追加', ['class' => "btn btn-primary", 'name' => '_apply'])}}
                    @endif
                {{Form::close()}}
            </div>
        </div>
    </div>
</div>
@stop