---
Title:    configの値を確認する
Topics:   configuration
Position: 1
---

{problem}
あるconfigの値が存在するか確認したい

`Config::get()`メソッドで _default_ を設定できるのはご存知ですか？  
この方法とは別に指定したconfigキーの値が存在するかどうかだけを取得してみましょう
{/problem}

{solution}
`Config::has()`を利用します

```php
if (\Config::has('app.mykey')) {
    echo "Yea! 'mykey' is in config/app.php\n";
}
```
{/solution}

{discussion}
`Config::has()`メソッドは、  
内部で`Config::get()`を利用していますが、  
デフォルト値に`microtime()`の値が使用されています


```php
$default = microtime(true);
return $this->get($key, $default) !== $default;
```
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
