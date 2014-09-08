---
Title:    CSRFトークンを生成する
Topics:   forms
Position: 4
---

{problem}
CSRF(クロスサイトリクエストフォージェリ)トークンを生成して利用したい

Laravelは、`Form::open()` または `Form::model()`を利用すると  
自動でCSRFトークンを生成して、hiddenのフィールドを作成しますが、  
それを用いずに任意で生成してみましょう
{/problem}

{solution}
`Form::token()`メソッドを利用します

```html
{{Form::token()}}
```

これは次の様に出力されます

```html
<input name="_token" type="hidden" value="somelongvalue">
```
{/solution}

{discussion}
とくにありません
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
