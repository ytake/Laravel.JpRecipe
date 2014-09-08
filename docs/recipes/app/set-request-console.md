---
Title:    コマンドライン向けリクエスト処理の設定
Topics:   -
Position: 28
---

{problem}
コマンドラインから、リクエストを設定したい
{/problem}

{solution}
`App::setRequestForConsoleEnvironment()`メソッドを利用します

通常、コマンドラインアプリケーションを実装する上では、
HTTP関連のものは必要ないはずですが、  
どうしてもHTTP関連のリクエスト処理等を実行したい場合に利用します

```php
\App::setRequestForConsoleEnvironment();
```
{/solution}

{discussion}
主に使われるのはユニットテストでしょう

ユニットテストでは、実際に利用していない嘘の環境として実行させたりします

ユニットテスト時は、`app/tests/TestCase.php`に記述されているとおり  
'testing'環境として自動で実行します
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
