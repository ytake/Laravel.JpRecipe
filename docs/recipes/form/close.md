---
Title:    フォームを閉じる
Topics:   forms
Code:     Form::close()
Id:       152
Position: 3
---

{problem}
作成したフォームを閉じたい

シンプルに`</form>`タグを使うだけですが、Laravel流のcloseを利用してみましょう
{/problem}

{solution}
`Form::close()`メソッドを利用します

通常はBladeテンプレートで利用します

```html
{{Form::close()}}
```
{/solution}

{discussion}
実際には`</form>`生成するだけのメソッドではありません

定義されたラベルやフォームモデルを利用してる場合は、
内部でそれらをリセットします
実装しているwebページで複数のフォームを実装している場合に重要なポイントとなります
{/discussion}
