---
Title:    config全てを取得する
Topics:   configuration
Position: 5
---

{problem}
configの全ての項目を表示したい

正しくない値が返却された場合等に、すべてのconfig値を取得して確認をしたい
{/problem}

{solution}
`Config::getItems()`利用します

このメソッドは、**ロードされた** すべてのconfigの値を多次元配列で返却します

```php
// ロードされた全てのconfigを返却
var_dump(\Config::getItems())
```

特定のグループ(config/配下のファイル名等)のconfigを主取るする場合は、  
`Config::('groupname')`を使用します

```php
// databaseグループのconfigを取得
var_dump(\Config::get('database'));
```
{/solution}

{discussion}
`Config::getItems()`はロードされたものだけを出力します

例えば、 _queue_ がまだロードされていない場合は、  
`Config::getItems()`では取得出来ません

この場合は、取得したい項目を直接指定してアクセスします

```php
\Config::get('queue.driver');

// アクセスすると、ロードされますので、次回からは下記で取得されます
var_dump(\Config::getItems());
```
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
