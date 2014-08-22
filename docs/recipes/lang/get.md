---
Title:    翻訳で使われているキーを取得する
Topics:   localization
Code:     Lang::get()
Id:       249
Position: 1
---

{problem}
言語固有のメッセージを返却する様にしたい
{/problem}

{solution}
`Lang::get()`メソッドを利用します

`Lang::get()`にキーを指定すると、  
現在設定されている言語のファイルの中から指定キーを探します。  
指定されたモノが見つからない場合は、元のキーが返却されます

```php
echo \Lang::get('message.hello');
```

上記のサンプルは、`app/lang/XX/message.php`の`'hello'`キーを探します  
_(XXは、現在の言語環境です)_  

メッセージにプレースホルダが含まれている場合は、  
第二引数にそれを指定してください。  
`app/lang/en/message.php`とした場合・・・

```php
<?php
return [
    'hello' => 'Hi there',
    'hello2' => 'Hi there, :person',
];
```

"Hi there, Chuck"としたい場合は、次の様にします

```php
echo \Lang::get('message.hello2', ['person' => 'Chuck']);
```

特定の言語を指定したい場合は、第三引数に言語を指定します

```php
echo \Lang::get('message.hello', array(), 'en');
```

`en` つまり常に英語で取得する事になります
{/solution}

{discussion}
それぞれの言語に対応したファイルを設置する場合に、  
`app/lang`ディレクトリには次の様に設置しましょう  

```
/app
   /lang
      /en
         pagination.php
         reminders.php
         validation.php
      /ja
         pagination.php
         reminders.php
         validation.php
```

この様にそれぞれの言語に対応したファイルを設置します
{/discussion}
