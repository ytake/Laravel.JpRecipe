---
Title:    モデルをベースにしたフォームを作成する
Topics:   forms
Code:     Form::checkbox(), Form::input(), Form::model(), Form::open(),
          Form::radio(), Form::select(), Form::textarea()
Id:       151
Position: 2
---

{problem}
フォームのフィールドをモデルと結びつけたい
{/problem}

{solution}
`Form::model()`を利用してフォームを構築します

これはBladeテンプレートで行います

```html
{{Form::model($item, ['route' => ['items.update', $item->id]])}}
```

**`Form::open()`の代わりに利用します**

`Form::input()`, `Form::textarea()`, `Form::select()`はモデルから取得してデータを取り込みます
{/solution}

{discussion}
フォームを取り込むための優先順位は以下の順番です **FEM**.

1. **セッションから取得されるデータ** 以前のリクエストの値がセッションに保存され、バリデート等のエラー時に以前に入力したデータを利用する事が出来ます
2. **明示的に指定したデータ** 例えば、`Form::input()`をコールする際に`$value`引数に値を指定した場合に、次にこの値が使用されます
3. **モデル データ** フォームフィールドと同じ名前の属性を持っている場合に、その値が使用されます
{/discussion}
