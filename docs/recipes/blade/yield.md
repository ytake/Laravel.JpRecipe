---
Title:    Bladeのセクションをコンテンツに出力する
Topics:   Blade
Code:     @yield
Id:       35
Position: 2
---

{problem}
Bladeテンプレートでセクションを出力したい
{/problem}

{solution}
`@yield` を利用します

次の様なBladeテンプレートを考えてみます

```html
@section('bottom')
  This is the bottom
@stop
@section('top')
  This is the top
@stop
@yield('top')
@yield('bottom')
```

次の様に出力されます

```html
This is the top
This is the bottom
```


`@yield`にデフォルト値を指定する事もできます

以下の様な単純なレイアウトを考えてみましょう
_(レイアウトについては [[Bladeのレイアウトを使って拡張する]] を参照して下さい)_

```html
<html>
  <body>
    <div class="container">
      @yield('content','No content')
    </div>
  </body>
</html>
```

ビューに `@section('content')` が無い場合、
下記の様に出力されます

```html
<html>
  <body>
    <div class="container">
      No content
    </div>
  </body>
</html>
```
{/solution}

{discussion}
`@yield`でデフォルトを使用するのは、
条件や処理によってコンテンツが無い場合等に非常に有用です

レイアウトで以下の様にしておくのも良いかもしれません

```html
@yield('content', '<span style="background:red">MISSING CONTENT</span>')
```

コンテンツが無い場合には、赤いブロックで **MISSING CONTENT** と表示されます

他にも各metaタグや、title, keywords, dexcription等に使用するのもおすすめです
{/discussion}
