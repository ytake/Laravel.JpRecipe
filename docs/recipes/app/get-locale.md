---
Title:    アプリケーションで定義されている言語環境を取得する
Topics:   -
Code:     App::getLocale(), Config::get()
Id:       207
Position: 25
---

{problem}
アプリケーションで主に利用する言語環境を決定しておく必要があります。
{/problem}

{solution}
`App::getLocale()`メソッドを利用します

```php
if (\App::getLocale() == 'en') {
    echo "It's English!";
}
```

言語環境を指定する場合は、  
`app/config/app.php`、または`環境ごとのapp.php`の`locale`で設定することができます。  
デフォルトは`en`で設定されています。  
英語以外に日本語などで他言語化する場合は`app/lang/`内に言語に対応したファイルを設置することで、  
任意の言語で表示などをすることができます。  
{/solution}

{discussion}
他にも設定内容を直接取得する方法があります。

`Config::get('app.locale')`が利用できます。  
返却される値は、`App::getLocale()`と同じものが返却されます。
{/discussion}
