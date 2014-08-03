---
Title:    アプリケーションの停止がメンテナンスが理由で停止しているのか判定する
Topics:   -
Code:     App::isDownForMaintenance()
Id:       120
Position: 14
---

{problem}
アプリケーションの停止が、メンテナンスによるものなのかどうかを判定したい
{/problem}

{solution}
`App::isDownForMaintenance()`メソッドを利用します

```php
if (App::isDownForMaintenance()) {
    die("メンテナンスのためシステムを停止しています");
}
```
{/solution}

{discussion}
これらを使う利点はいくつかあります

[[Registering a Maintenance Mode Handler]]レシピをご覧ください  
メンテナンスモードで実行されている場合に、自動で実行されるアクションを設定できます  

メンテナンスモードのときに`app/storage/meta/down`にファイルが存在していることに注意してください

以下のレシピも参考にしてください:

* [[Registering a Maintenance Mode Handler]]
* [[Putting the Application in Maintenance Mode]]
* [[Bringing the Application Out of Maintenance Mode]]
{/discussion}
