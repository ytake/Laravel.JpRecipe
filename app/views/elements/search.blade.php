<div class="row">
    @if(!Request::is('auth/login*'))
    <div class="col-md-12 text-center">
        <section id="title" class="search">
            <div class="row">
                <div class="col-sm-12">
                    <h1>レシピ検索</h1>
                </div>
            </div>
            {{\Form::open(['action' => 'search.index', 'method' => 'GET'])}}
            <div class="input-group">
                {{Form::text('words', Input::get('words'), ['class' => "form-control", 'autocomplete' => "off", 'placeholder' => "検索したいキーワードを入力して下さい"])}}
                <span class="input-group-btn">
                    <button class="btn btn-danger" type="submit">
                        <i class="glyphicon glyphicon-search"></i>
                    </button>
                </span>
            </div>
            {{\Form::close()}}
        </section>
    </div>
    @endif
</div>