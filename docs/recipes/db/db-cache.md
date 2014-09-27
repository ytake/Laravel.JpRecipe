---
Title:    クエリー結果をキャッシュする
Topics:   database, eloquent, cache
Position: 2
---

{problem}
クエリー結果をキャッシュしてデータベースアクセスを軽減したい

クエリーをキャッシュすることで、アプリケーションの実行速度や、  
レスポンスなどを改善する事が出来ます
{/problem}

{solution}
##キャッシュのセッティング
`app/config/cache.php`ファイルのdriverをお使いの環境に合わせて変更します  

ドライバーの指定方法は下記を参照して下さい:
* [[キャッシュドライバーにAPCを利用する]]  
* [[キャッシュドライバーにデータベースを利用する]]  
* [[キャッシュドライバーにファイルを利用する]]  
* [[キャッシュドライバーにmemcachedを利用する]]  
* [[キャッシュドライバーにRedisを利用する]]  
* [[キャッシュドライバーにWinCacheを利用する]]  
* [[キャッシュドライバーにXCacheを利用する]]  

##クエリー結果のキャッシュ方法
`remember`を利用します  
このメソッドが利用できるのは、クエリービルダー、Eloquentの場合のみとなります  

###シンプルなキャッシュ

```php
\DB::table('table')->remember(120)->get();
\DB::table('table')->where('id', 1)->remember(120)->first();
```
それぞれのクエリー結果が第一引数で指定した時間キャッシュされます  
単位は`分`です

このときのキャッシュキーは、`app/config/cache.php`ファイルの`prefix`を利用して、  
```php
prefix:e5ca7b2b11f122e4e236b3b20dc569dd
```
の様に生成されます


###キャッシュキーを指定する
```php
\DB::table('table')->remember(120, 'table.all')->get();
\DB::table('table')->where('id', 1)->remember(120, 'table.find.1')->first();
```

第二引数にキャッシュキーを指定する事で、任意のキーで生成する事が出来ます  
キャッシュはLaravelのCacheコンポーネントを利用して生成されますので、  
任意のタイミングでキャッシュを操作できる様になります

例えばユーザーのデータなどで、更新されるまでキャッシュキーを保持し、  
更新時にそれまでのキャッシュを破棄して新たに生成する事で、  
アプリケーション自体の高速化等が期待できます  

```php
$id = 1;
// クエリー結果をキャッシュ
\DB::table('users')->where('user_id', $id)
    ->remember(120, "user:{$id}")->first();
// キャッシュキーを指定して削除
\Cache::forget("user:{$id}");
// データ更新ご再度キャッシュを生成する
\DB::table('users')->where('user_id', $id)->update($params);
\DB::table('users')->where('user_id', $id)
    ->remember(120, "user:{$id}")->first();
```

###キャッシュドライバーを指定する
デフォルトで指定したキャッシュドライバーではなく、  
任意のドライバーでキャッシュを管理したい場合は、  
`cacheDriver`を利用します

```php
\DB::table('users')->where('user_id', $id)
    ->cacheDriver('redis')->remember(120, "user:{$id}")->first();
```

###キャッシュにタグを利用する
キャッシュのタグに対応しているドライバーで利用可能です
```php
\DB::table('users')->where('user_id', $id)
    ->cacheTags('recipes')
    ->remember(120, "user:{$id}")->first();
```

[[キャッシュをタグ付け、またはセクションで整理する]]
{/solution}

{discussion}
クエリの結果をキャッシュする場合、  
結果が`null`の場合は`null`がキャッシュされます  

値が存在する場合にのみキャッシュさせたい場合は以下の様に、  
Cacheファサードと組み合わせると良いでしょう

```php
if (!Cache::has('cache.key')) {
    $result = Cache::remember('cache.key', 60, function() {
        return \DB::table('table')->get();
    });
} else {
    $result = Cache::get('cache.key');
}
```
{/discussion}

{credit}
Author:Yuuki Takezawa
{/credit}
