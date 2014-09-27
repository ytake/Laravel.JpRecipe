---
Title:    クエリー結果でページネーションを実装する
Topics:   database, eloquent, paginator
Position: 3
---

{problem}
クエリー結果を利用してページネーションを実装したい
{/problem}

{solution}
クエリービルダー、Eloquentを利用している場合は、  
結果を取得する場合に簡単にページネーションを実装する事が出来ます

第一引数で1ページあたりの返却数を指定する事が出来ます  
指定しない場合は、デフォルトで15となります

```php
// 15レコード返却
\DB::table('table')->paginate();
// 25レコード返却
\DB::table('table')->paginate(25);
```

通常のクエリー結果を取得する場合と同様に、  
第二引数に必要なカラムを指定する事が可能です
```php
// 25レコード返却
\DB::table('table')->paginate(25, ['id', 'title']);
```

それぞれPaginatorオブジェクトが返却されます
{/solution}

{discussion}
Bladeテンプレートでページネーションを描画する際は、  
次の様に記述します

**モデルやコントローラーなど**
```php
$page = \DB::table('table')->paginate(25, ['id', 'title']);
return \View::make('template', ['page' => $page]);
```
**Bladeテンプレート**
```php
{{$page->links()}}
```

ページネーションに引数を与える場合は次の様に指定する事が出来ます
```php
{{$list->appends(['keywords' => Input::get('keywords')])->links()}}
```
{/discussion}

{credit}
Author:Yuuki Takezawa
{/credit}
