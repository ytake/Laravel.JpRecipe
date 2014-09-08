---
Title:    静的にデフォルトのリクエストクラスをコールする
Topics:   -
Position: 29
---

{problem}
リクエストクラスを静的に利用したい

リクエストクラスをオーバーライドしている場合などに確認することができます
{/problem}

{solution}
`App::onRequest()`メソッドを利用します

このメソッドは二つの引数、メソッド名、およびメソッドのパラメータの配列を取ります  
引数を仕様しない場合はパラメータの配列を省略することができます

```php
$request = \App::onRequest('createFromGlobals');
```

[[デフォルトのリクエストクラスを変更する]] も参考にしてください
{/solution}

{discussion}
デフォルトのリクエストクラスで、利用できるものは以下のものです

執筆時にものですので、変更されている場合があります:

* `createFromBase(SymfonyRequest $request)` - SymfonyのRequest関連のコンポーネント
* `createFromGlobals()` - PHPのスーパーグローバル変数
* `create($uri, $method, $parameters, $cookies, $files, $server, $content)` - 指定されたURIと設定に基づいてリクエストを作成します
* `setFactory($callable)` - Requestのインスタンスを作成して利用出来る状態にします
* `setTrustedProxies(array $proxies)` - 信頼されたプロキシのリストを設定します
* `getTrustedProxies()` - 設定されたプロキシのリストを返却します
* `setTrustedHosts(array $hostPatterns)` - 信頼されたホストを設定します
* `getTrustedHosts()` - 設定されたホストを返却します
* `setTrustedHeaderName($key, $value)` - 信頼されたヘッダー情報を設定します
* `getTrustedHeaderName($key)` - 設定されたヘッダーを返却します
* `normalizeQueryString($qs)` - クエリーの文字列を正規化します
* `enableHttpMethodParameterOverride()` - 意図したHTTPメソッドを指定するため、リクエストパラメータのサポートを有効にします
* `getHttpMethodParameterOverride()` - リクエストパラメータのサポートの状態を確認します

デフォルトのリクエストクラスをオーバーライドしているのであれば、  
任意のpublic、またはstaticメソッドなどを`App:: onRequest`で呼び出すことができます

ここに挙げたリストは、任意で変更する事ができるということを覚えておいてください  
現時点の利用可能なクラスなどは、ソースコードを直接確認してください
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
