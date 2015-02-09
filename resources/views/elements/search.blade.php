<div class="row">
    @if(!Request::is('auth/login*'))
    <div class="col-md-12 text-center">
        <section id="title" class="search">
            <div class="row">
                <div class="col-sm-12">
                    <h1>レシピ検索</h1>
                </div>
            </div>
            <form action="{{route('search.index')}}" method="get">
            <div class="input-group">
                <input type="text" name="words" value="{{Input::old('words')}}" class="form-control" autocomplete="off" placeholder="検索したいキーワードを入力して下さい">
                <span class="input-group-btn">
                    <button class="btn btn-danger" type="submit">
                        <i class="glyphicon glyphicon-search"></i>
                    </button>
                </span>
            </div>
            </form>
        </section>
    </div>
    @endif
</div>