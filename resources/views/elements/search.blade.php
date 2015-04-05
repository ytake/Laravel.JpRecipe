<div class="col s12 card-panel">
    @if($errors->first('words'))
    <h6 class="left-align">
        {{$errors->first('words')}}
    </h6>
    @endif
    <form action="{{route('search.index')}}" method="get">
        <div class="input-field col s10">
            <input type="text" name="words" id="words" value="{{Input::old('words')}}" class="validate"
                   autocomplete="off" placeholder="検索したいキーワードを入力して下さい">
            <label for="words" class="active">レシピ検索</label>
        </div>
        <div class="col s2">
        <button class="btn-floating waves-effect waves-light red darken-1 searchButton" type="submit" name="action">
            <i class="fa fa-paper-plane"></i>
        </button>
        </div>
    </form>
</div>
