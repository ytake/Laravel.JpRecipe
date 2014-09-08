---
Title:    Bladeテンプレートのコメント
Topics:   Blade
Position: 6
---

{problem}
Bladeテンプレートでコメントを記述したい

HTMLコメントでは無く、内容を残さずにコメントを記述したい
{/problem}

{solution}
Bladeのコメントは次の様に利用します

`{{--`, `--}}`で囲む事でコメントになります

```html
<html>
{{-- ----------------------------------------------------------------------
  -- Here's a big long comment block
  -- ----------------------------------------------------------------------
  --
  -- I want to document what this template does. Right now it only shows
  -- comments, but who knows? Maybe in the future it will do something else.
  --
  --}

  <body>
    {{-- of course, you can have single line comments too --}}
    Hey, punk.
  </body>
</html>
```
{/solution}

{discussion}
BladeのコメントにPHPのコメントを利用しないでください

Bladeはレンダリング時に`{{--`,`--}}`を`/*`, `*/`に置換える為、  
PHPコメントを記述すると、**"コメント内容 */"** と表示されてしまいます

```php
{{-- PHPコメントを記述しない様にしましょう */ comment --}}
```
{/discussion}
