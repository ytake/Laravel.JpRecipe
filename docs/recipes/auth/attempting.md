---
Title:    認証処理中に内容を確認する
Topics:   -
Code:     Auth::attempting()
Id:       220
Position: 25
---

{problem}
認証時に都度実行される処理を実装したい
{/problem}

{solution}
`Auth::attempting()`メソッドを利用します。

{php}
Auth::attempting(function($credentials, $remember, $login) {
    // 認証処理、またはその内容をログに書き出したり、任意の処理を記述します
});
{/php}

これは、認証に成功したか失敗したかに関わらずに、必ず実行される事に注意してください。
{/solution}

{discussion}
これらの処理を記述するにあたって、ファイルの設置場所等はどこにすればいいのでしょうか？

Event用のヘルパーファイルなどがある場合はそれを利用しても構いません。  
[[Creating a Helpers File]]も参考にしてください。

それ以外では、サービスプロバイダー、または`app/start/global.php`に記述しましょう。
{/discussion}
