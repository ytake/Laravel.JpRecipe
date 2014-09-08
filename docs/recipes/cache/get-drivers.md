---
Title:    すべてのキャッシュドライバーを取得する
Topics:   cache
Position: 12
---

{problem}
生成されたキャッシュドライバのリストを取得する。

{/problem}

{solution}
`Cache::getDrivers()`メソッドを利用します

このメソッドは配列を返します  
配列のキーはドライバの名前、値はドライバのインスタンスになります

```php
$createdDrivers = \Cache::getDrivers();
```
{/solution}

{discussion}
どのドライバーも生成されていない場合は、空の配列が返却されます
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
