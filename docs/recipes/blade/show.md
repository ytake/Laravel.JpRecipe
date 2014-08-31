---
Title:    Bladeテンプレートで現在のセクションを取得する
Topics:   -
Code:     @show
Id:       240
Position: 12
---

{problem}
現在のセクションの内容を取得したい
{/problem}

{solution}
`@show` を利用します

現在のセクションを終了して、その内容を取得し、
そのセクションの内容がすぐに出力されます

```html
@section('one')
  ここはstopで停止させているが、まだ出力しません
@stop

@section('two')
  出力します
@show
```

HTML出力は下記の様になります

```html
出力します
```
{/solution}

{discussion}
`@show`は、`@stop`後に`@yield('section')`を実行して出力するのと同じ様なものと考えて下さい
{/discussion}
