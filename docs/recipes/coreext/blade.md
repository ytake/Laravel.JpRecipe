---
Title:    Bladeテンプレートを拡張する
Topics:   extension
Position: 5
---

{problem}
Bladeテンプレートを拡張してfunctionなどを追加したい
{/problem}

{solution}
`Blade::extend()`メソッドを利用します

サンプルで、`@break`を追加してみましょう  
例に習って追加してみてください

```php
\Blade::extend(function($value) {
    return preg_replace('/(\s*)@break(\s*)/', '$1<?php break; ?>$2', $value);
});
```

テンプレートで`break`を使う事ができる様になります

```html
@foreach ($value_array as $value)
    @if ($value == 'end')
        @break;
    @endif
    {{$value}}<br>
@endforeach
```

'$value'が'end'の場合に停止します
{/solution}

{discussion}
Bladeテンプレートの拡張はどこで実装しますか？

基本的には、ビューが描画される前であればどこでも実装出来ます  
一番ベストな実装場所はサービスプロバイダーです  
他には`app/start/global.php`、またはヘルパーファイル形式で実装する事もできます  
[[ヘルパーファイルの作成]]

### views コンパイルファイルを削除しましょう！

新しいfunction等を追加した場合、  
かならず`app/storage/views`内のファイルを削除しましょう！

{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
