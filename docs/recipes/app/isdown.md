---
Title:    アプリケーションの停止がメンテナンスが理由で停止しているのか判定する
Topics:   -
Position: 14
---

{problem}
アプリケーションの停止が、メンテナンスによるものなのかどうかを判定したい
{/problem}

{solution}
`App::isDownForMaintenance()`メソッドを利用します

```php
if (\App::isDownForMaintenance()) {
    die("メンテナンスのためシステムを停止しています");
}
```
{/solution}

{discussion}
これらを使う利点はいくつかあります

[[メンテナンスモードのハンドラを登録する]]レシピをご覧ください  
メンテナンスモードで実行されている場合に、自動で実行されるアクションを設定できます  

メンテナンスモードのときに`app/storage/meta/down`にファイルが存在していることに注意してください

以下のレシピも参考にしてください:

* [[メンテナンスモードのハンドラを登録する]]
* [[メンテナンスモードを作成したい]]
* [[アプリケーションのメンテナンスモードを解除したい]]
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
