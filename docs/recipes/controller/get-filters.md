---
Title:    コントローラーのBeforeとAfterフィルターを取得する
Topics:   filters, controller
Position: 3
---

{problem}
コントローラーのフィルターにアクセスしたい
{/problem}

{solution}
`getAfterFilters()` または `getBeforeFilters()`をコントローラーで利用します

```php
class SomeController extends Controller
{
    public function someMethod()
    {
        // Dump all the before filters
        var_dump($this->getBeforeFilters());
    }
}
```

{/solution}

{discussion}
これはローレベルのfunctionです

一般的には、コントローラーのメソッドからフィルターにアクセスする必要はありません  
コントローラーの`__construct()`以外でBeforeフィルターを指定している場合は、  
既に正常に実行された状態です

Afterフィルターはコントローラーのメソッドが実行されるまで実行されません

どうしてもフィルターにアクセスする必要がある場合は、このレシピの通りに実行してみましょう
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
