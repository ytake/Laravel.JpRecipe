---
Title:    アプリケーションが起動されているかどうかを判定する
Topics:   -
Code:     App::isBooted()
Id:       57
Position: 10
---

{problem}
アプリケーションが起動されているかどうかを判定したい
{/problem}

{solution}
`App::isBooted()`メソッドが利用できます

```php
// サービスプロバイダーで記述すると良いかもしれません
if (\App::isBooted())　{
    // 起動したら処理するものを書きましょう
}
```
{/solution}

{discussion}
起動の判定はローレベルで行われます

リクエスト処理の前に`booted`が割り当てられ、実行されます。　　
`app/start/global.php`、`app/routes.php`または、`app/filters.php`がロードされる前に起動されます。  
(これらのファイルは、`booted`のコールバック内でロードされます)

アプリケーションの起動は3つのステップから成り立っています:

1. "booting"で登録した処理がコールバックされる
2. "起動した"と扱われます
3. "booted"で登録した処理がコールバックされる

したがって、確実に実装するには`App::isBooted()`を利用したり、  
"booting"、または "booted"コールバックか、  
サービスプロバイダ内に実装しましょう。
{/discussion}
