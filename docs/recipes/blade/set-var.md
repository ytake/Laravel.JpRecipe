---
Title:    Bladeテンプレートで変数を代入する
Topics:   Blade
Position: 23
---

{problem}
Bladeテンプレートで変数に代入したい
{/problem}

{solution}
代入の為の構文は特に用意されていません

ビューはロジックから分離されるべきものです  
ただし、テンプレート内で変数を代入した方が簡単な場合もありますので、  
ここではトリックとして紹介します

BladeテンプレートではいつでもPHPタグを利用する事が出来ます

```html
<?php $var = 'test'; ?>
{{$var}}
```

またはBladeのコメントを使うこともできます

```html
{{--*/ $var = 'test' /*--}}
{{$var}}
```

Bladeのコメントは以下の形式を利用しているため、  
上記のコメントを使った代入方法で動作させる事が出来ます

```php
<?php /*COMMENT*/ ?>
```

したがって、上記の変数の代入は次のPHPコードに変換されます

```php
<?php /**/ $var = 'test' /**/ ?>
```

[[Bladeテンプレートのコメント]]
{/solution}

{discussion}
Bladeを買う徴して、`@setvar`の様な、新しい構文として追加することができます

[[Bladeテンプレートを拡張する]]
{/discussion}
