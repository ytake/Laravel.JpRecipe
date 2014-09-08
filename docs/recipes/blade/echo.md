---
Title:    Bladeテンプレートで変数を表示する
Topics:   Blade
Position: 3
---

{problem}
webページで変数を表示したい

`<?php echo $variable; ?>`の代わりに、  
Bladeテンプレートで用意されているメソッドを利用してみましょう
{/problem}

{solution}
変数を表示するには、"{", "}"括弧文を使用します

#### シンプルな構文

Bladeテンプレートで中括弧2つで *echo* を意味します

Example:

```html
<html>
  <body>
    Hello {{ $name }}
  </body>
</html>
```

`$name = 'Chuck'` の場合、 **Hello Chuck** と出力されます

#### エスケープ

出力する値をエスケープしたい場合に、  
中括弧2つの代わりに中括弧3つを利用します

```html
<html>
  <body>
    Hello {{{ $name }}}
  </body>
</html>
```

webページに表示される前に`htmlentities()`を介します

#### 変数のデフォルト値

変数が存在しない場合、以下の手法が利用できます

```html
<html>
  <body>
    Hello {{{ $name or 'No name' }}}
  </body>
</html>
```

この例では、  
変数`$name`が設定されていない場合に、代わりに **No name** が出力されます

#### 中括弧を表示

中括弧を表示したい場合にどうすれば良いでしょうか？  
中括弧の前に`@`を追記します

```html
<html>
  <body>
    @{{ This is displayed WITH the braces on each side }}
  </body>
</html>
```
{/solution}

{discussion}
これは基本的なものです
{/discussion}
