---
Title:    エラーハンドラの登録
Topics:   -
Code:     App::error()
Id:       204
Position: 22
---

{problem}
独自のエラーハンドラを追加したい
{/problem}

{solution}
`App::error()`を利用して追加します。

```php
\App::error(function($exception) {
    die('ERROR: '.$exception->getMessage());
});
```
上記のコードは、フレームワーク全体のエラーハンドラをプッシュします。
`app/start/global.php`などの最初に実行されるファイルに記述しておけば、
例外発生時にどんな処理よりも先に実行されます

例外をタイプヒントで指定する事で、その例外にあわせた処理を実行させる事ができます。
```
// この例は、RuntimeExceptionがスローされた場合にのみ処理されます
\App::error(function(RuntimeException $exception) {
    return \View::make('error', compact('exception'));
});
```
{/solution}

{discussion}
エラーが処理され、ハンドラから値が返却されます。

このサンプルは、ビューに例外処理が描画されて、ユーザーに通知されます。  
複数のエラーハンドラが登録されている場合に、  
ここで特に値等を返さ無い場合は、登録されている次のハンドラが実行されます。  
値を返さずに、ログに書き出したり、例外を記述したメールを送信する等、
様々な要望に沿って、簡単に便利に実装ができると思います。
{/discussion}
