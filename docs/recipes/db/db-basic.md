---
Title:    データベースをクエリービルダー、Eloquentを使用せずに操作したい
Topics:   database
Position: 4
---

{problem}
クエリービルダーや、Eloquentを使用せずに、  
SQLを直接記述したり、他のフレームワークで作ったデータベース関連のクラス等を簡単に移行したい  
{/problem}

{solution}
LaravelのORMはEloquentですが、  
このEloquentは実装のレイヤーにより3種類の利用方法を選択することができます  

- Eloquent エレガントなORMで、マッピング等も自動で行います
- クエリービルダー doctrineなどでも提供されているSQLを組み立てるクラス
- ベーシック PDOを拡張した最もベーシックなクラス

どれを利用する場合でも設定ファイルの記述方法は変わりません  
* [[データベースの接続先を変更する]]

### クエリービルダー、Eloquentを使用せずに操作する
ORMなどを使わずに操作するには特別な準備等はありません。  
実際に操作するクラスで下記の様に記述するだけです

#### SELECT
**すべて**
```php
\DB::select("SELECT * FROM users");
```

**行取得**
```php
\DB::selectOne("SELECT * FROM users WHERE id = ?", [1]);
```
#### INSERT
```php
\DB::insert('insert into users (id, name) values (?, ?)', [1, 'Dayle']);
```

#### UPDATE
```php
\DB::update('update users set votes = 100 where name = ?', ['John']);
```

#### DELETE
```php
\DB::delete('delete from users WHERE id = ?' [1]);
```

どの場合でも記述方法はほとんど同じです  
それ以外のクエリーは
```php
\DB::statement('drop table users');
```
として発行する事が出来ます  
またこれらはマイグレートでも同様に利用する事が出来ますので、  
簡単に利用する事が出来ます
{/solution}

{discussion}
ベーシックを利用する場合は、  
cacheや、paginatorなどは統合されていません  
これらを利用する場合は、必要に応じて実装しましょう  

[[ページネーションを実装する]]  
{/discussion}

{credit}
Author:Yuuki Takezawa
{/credit}
