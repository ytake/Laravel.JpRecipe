---
Title:    IoCコンテナに値を格納する
Topics:   IoC container
Code:     app(), App::instance(), App::make()
Id:       3
Position: 3
---

{problem}
IoCコンテナに値を保存したい

IoCコンテナはLaravelの実装の中でも、最もコアな部分であり、  
格納されている値をアプリケーション内で自由に使用できる、ということを理解しておきましょう  
{/problem}

{solution}
`App::instance()`を利用します

```php
$is_evening = (date('G') > 18) ? true : false;
App::instance('myapp.evening', $is_evening);
```

設定した後に`App::make('myapp.evening')`または、  
`app('myapp.evening')`を利用して、値を取得します
{/solution}

{discussion}
IoCコンテナは依存解決以外にも様々な用途に使用できます。

依存解決でIoCコンテナが輝くのはもちろんのことですが、  
それ以外にも色々な値を格納することができます

注意点としては、すでにLaravelで格納する為に使われているキー名はコンフリクトを起こすので、注意してください。  
すでに使われているキー名は以下の通りです  
`_view`, `exception.plain`, `env`, `exception`, `encrypter`, `view.engine.resolver`,  
`events`, `files`, `session.store`, `db`, `whoops.handler`, `redirect`, `router`,  
`url`, `command.workbench`, `cookie`, `package.creator`, `exception.debug`, `whoops`,
`view.finder`, `db.factory`, `session_`

コンフリクトを防ぐには、  
アプリケーションのプロジェクト名やベンダー名などをプレフィックスなどにして利用するのが確実です。  
例えば`myapp.session_`などです  
{/discussion}
