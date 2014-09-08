---
Title:    Beforeフィルターをコントローラーで登録する
Topics:   filters, controller
Position: 1
---

{problem}
特定のコントローラーの全てのアクションに、アクション実行前にフィルター処理を実行させたい

`app/filters.php`を使ったフィルター処理追加以外の方法を知りたい
{/problem}

{solution}
`Controller::beforeFilter()`を利用します

任意のコントローラーのコンストラクタで登録します

```php
class MyController extends \Controller
{
	  public function __construct()
	  {
		    $this->beforeFilter('auth');
  	}
}
```

ルーターのフィルタと同じ様に、引数を追加することができます

```php
class MyController extends \Controller
{
	  public function __construct()
	  {
		    $this->beforeFilter('auth', ['except' => 'login']);
		    $this->beforeFilter('csrf', ['on' => 'post']);
	  }
}
```

クロージャを使って実装する事も可能です

```php
class MyController extends \Controller
{
	  public function __construct()
	  {
		    $this->beforeFilter(function()
		    {
			      if (date('G') < 6)
			      {
				        return "This website doesn't work before 6am";
			      }
		    }
	  }
}
```
{/solution}

{discussion}
このフィルターがコールされるのはいつですか？

コントローラーのメソッドが実行される前にこのフィルターがコールされます  
実際にはルーター処理が実行される前に実行されます  
[[リクエストのライフサイクルについて理解する]]
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
