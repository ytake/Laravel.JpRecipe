---
Title:    Httpステータスに関する例外をスローする
Topics:   -
Code:     App::abort(), App::missing()
Id:       202
Position: 20
---

{problem}
ステータスコード200以外を返却して、
アプリケーションを終了させたい、または何らかの方法でステータスコードを返却したい
{/problem}

{solution}
`App::abort()`メソッドが利用出来ます。

ステータスコード404`Not Found`を返却したい場合は、
{php}
App::abort(404);
{/php}

これは`NotFoundException`、具体的には`Symfony\Component\HttpKernel\Exception\NotFoundHttpException`がスローされ、
アプリケーションが強制的に終了される様になります。
スローされるメッセージを任意のメッセージに指定する事が可能です。

{php}
App::abort(404, 'User not found');
{/php}

HTTPの例外には通常、クライアント·エラーの400およびサーバのエラーの500の範囲のステータスコードがスローされます。
詳しくは、などを参考にしてください。
[HTTPステータスコード](http://ja.wikipedia.org/wiki/HTTP%E3%82%B9%E3%83%86%E3%83%BC%E3%82%BF%E3%82%B9%E3%82%B3%E3%83%BC%E3%83%89).

いくつかサンプルを紹介しましょう。

{php}
// Unauthorized / 未認証
App::abort(401, 'Not authenticated');

// Forbidden / 権限無し
App::abort(403, 'Access denied');

// Internal Server Error / サーバーエラー
App::abort(500, 'Something bad happened');

// Not implemented / 未実装
App::abort(501, 'Feature not implemented');
{/php}
404エラー以外では、それぞれヘッダーに様々な値を含める事ができます。

{php}
App::abort(401, 'Not authenticated', ['WWW-Authenticate' => 'Basic']);
{/php}

404エラー以外の場合も`NotFoundException`、具体的には`Symfony\Component\HttpKernel\Exception\NotFoundHttpException`がスローされます。

{/solution}

{discussion}
これらの例外スローを踏まえて様々な実装をする事ができます。

こちらも参考にしてみてください [[Registering a 404 Error Handler]].
{/discussion}