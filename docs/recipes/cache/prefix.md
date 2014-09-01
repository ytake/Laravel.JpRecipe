---
Title:    キャッシュキーにプレフィックスを利用する
Topics:   cache
Code:     -
Id:       276
Position: 24
---

{problem}
複数台のサーバのアプリケーションでキャッシュを共有して利用したい
{/problem}

{solution}
アプリケーション固有のキャッシュキーにするため、プレフィックスを設定します

`app/config/cache.php` ファイルの `prefix` で設定します

```php
<?php
// app/config/cache.php
return [
    ...
    'prefix' => 'myprefix',
];
```
{/solution}

{discussion}
キャッシュを保存する場合や、検索する場合に自動的に指定したプレフィックスが使われます

ファイル、配列をキャッシュドライバーをお使いの場合は利用できません。
これらのドライバーはそのアプリケーション固有のキャッシュに利用されるため、プレフィックスは使用されません
{/discussion}
