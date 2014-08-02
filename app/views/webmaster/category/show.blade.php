@section('styles')
<link href="/css/dataTables.bootstrap.css" rel="stylesheet" type='text/css' />
<link href="/css/dist/prism/prism.css" rel="stylesheet" />
@stop
@section('scripts')
<script src="//cdnjs.cloudflare.com/ajax/libs/prism/0.0.1/prism.min.js"></script>
@stop
@section('content')
<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="form-group">
                {{Form::label('name', 'カテゴリー名')}}
                {{$category->name}}
            </div>
            <div class="form-group">
                {{Form::label('section_id', 'セクション')}}
                {{$section->name}}
            </div>
            <div class="form-group">
                {{Form::label('description', '詳細')}}
                {{$category->description}}
            </div>
            <hr />
            {{HTML::link(action('webmaster.category.form', ['one' => $category->category_id]), '編集', ['class' => 'btn btn-primary'])}}
        </div>
    </div>
</div>
@stop