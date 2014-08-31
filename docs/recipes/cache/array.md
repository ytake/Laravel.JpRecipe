---
Title:    キャッシュドライバーに配列を利用する
Topics:   cache, configuration
Code:     -
Id:       97
Position: 6
---

{problem}
キャッシュを無効にしたい

キャッシュを利用しているコードなどを変更せずに、
キャッシュの保存機能を無効にしてみましょう
{/problem}

{solution}
Arrayキャッシュドライバーを利用します

`app/config/cache.php`ファイルのdriverを`'array'`に変更します

```php
'driver' => 'array',
```
{/solution}

{discussion}
これはテスト時に設定されると思います

Laravelは、`app/config/test/cache.php`でテスト時にキャッシュに配列を利用する様に
設定ファイルが提供されています

配列を利用する場合は、内部の配列にキャッシュされたすべての値を格納します
この値は他のリクエストやページ等では利用する事は出来ません

_キャッシュされた値は、同じリクエスト内でのみ利用可能です_
同じクエスト内で、`Cache::put('mykey')`で値を保存した場合に、
`Cache::get('mykey')`をコールするとその値を取得する事が出来ます
{/discussion}
