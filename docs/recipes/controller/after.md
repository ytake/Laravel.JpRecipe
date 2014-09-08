---
Title:    Afterフィルターをコントローラーで登録する
Topics:   filters, controller
Position: 2
---

{problem}
特定のコントローラーの全てのアクションに、アクション実行後にフィルター処理を実行させたい

`app/filters.php`を使ったフィルター処理追加以外の方法を知りたい
{/problem}

{solution}
`Controller::afterFilter()`を利用します

任意のコントローラーのコンストラクタで登録します

```php
class MyController extends \Controller
{

    public function __construct()
	  {
		    $this->afterFilter('log');
	  }
}
```

クロージャを使って実装する事も可能です

```php
class MyController extends \Controller
{
	  public function __construct()
	  {
		    // レスポンスのロギング
		    $this->afterFilter(function($route, $request, $response)
		    {
			      $content = $response->getContent();
			      \File::put(app_storage().'/logs/last_response', $content);
		    }
	  }
}
```

{/solution}

{discussion}
このフィルターがコールされるのはいつですか？

コントローラーのメソッドが実行された後、レスポンスを返却する前にこのフィルターがコールされます  
ユーザーにレスポンスを返す直前に何らかの処理が必要な場合に利用すると便利です
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
