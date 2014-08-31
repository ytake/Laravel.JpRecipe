---
Title:    Bladeでコンテンツの挿入を開始する
Topics:   -
Code:     @section
Id:       241
Position: 13
---

{problem}
Bladeテンプレートでセクションを開始したい
{/problem}

{solution}
`@section` を利用します

セクションにコンテンツ挿入を開始します
これは`@stop`, `@show`, `@overwrite` または `@append` が
記述されている行まで続きます

次のサンプルは特になにもしませんが、moviesセクションに`Transformers`を加えます

```html
@section('movies')
    Transformers
@stop
```

同じ処理をさせる場合に下記の様に記述する事も出来ます

```html
@section('movies', 'Transformers')
```

_第二引数でコンテンツ内容を記述する場合は `@stop` で終了させる必要はありません_

その後で `@yield('movies')` を記述すると、`movies`セクションがコンテンツとして出力されます

```html
@yield('movies')
```
{/solution}

{discussion}
セクションは常に`@section`で開始されます

第二引数でコンテンツを指定する場合を除いて、
`@section`は下記の5つの方法のうち、いずれかの方法で終了させなければなりません

1. `@stop` [[セクションへの挿入を終了する]].
2. `@endsection` `@stop`のエイリアスです
3. `@show` [[Bladeテンプレートで現在のセクションを取得する]].
4. `@append` [[レンダリングを停止してセクションを追加する]].
5. `@overwrite` [[コンテンツの挿入を停止してセクションを上書きする]].
{/discussion}
