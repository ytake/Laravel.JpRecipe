---
Title:    クロージャを利用した実行環境の決定
Topics:   configuration, environment
Code:     App::detectEnvironment()
Id:       28
Position: 5
---

{problem}
利用環境を決定する事が難しい

Laravelアプリケーションの実行環境を決定するのに、ホスト名を確認するよりも柔軟な方法が必要
{/problem}

{solution}
クロージャを利用して実行環境を指定します

`bootstrap/start.php`を編集して、クロージャを使ってみましょう

```php
$env = $app->detectEnvironment(function() {
	return getenv('_MY_ENVIRONMENT');
});
```
{/solution}

{discussion}
利用環境を検出する複数の方法があります。

`$app->detectEnvironment()`メソッドは、配列で指定する方法 _([[実行環境の決定]])_ の他、
`Closure`が利用できます

配列を利用する場合は、`'env' => ['hostnames']`の様に利用します。  
一致する環境が見つからない場合は"production"環境として扱います

`Closure`を利用している場合は、デフォルト値が無い為、  
必ず何かを返却しなければなりません
{/discussion}
