---
Title:    メンテナンスモードのハンドラを登録する
Topics:   -
Code:     App::down(), App::isDownForMaintenance()
Id:       121
Position: 15
---

{problem}
アプリケーションがダウンしているときに、自動的に何かを実行したい  

`App::isDownForMaintenance()`メソッドを利用出来ますが、  
それをメンテナンス時に適切に実行出来る様なアプリケーションにします
{/problem}

{solution}
`App::down()`でハンドラを登録します  

```php
\App::down(function() {
    return \Response::view('maintenance.mode', array(), 503);
});
```

この少しのコードで、`maintenance.mode`ビューと共に、  
HTTPステータスコードの503を出力します
{/solution}

{discussion}
アプリケーションがロードされて、起動した後に  
登録したダウンハンドラがあれば、最初に実行します

[[リクエストのライフサイクルについて理解する]]の**実行手順**を見れば、  
発生する場面を理解する事ができます

また[[アプリケーションの停止がメンテナンスが理由で停止しているのか判定する]]も見てみるといいでしょう
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
