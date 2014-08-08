---
Title:    サービスプロバイダの登録方法
Topics:   service providers
Code:     App::register()
Id:       199
Position: 17
---

{problem}
アプリケーションにサービスプロバイダを登録したい
{/problem}

{solution}
`app/config/app.php`内の`providers[]`配列に、作成したサービスプロバイダを追加します。

これは通常のサービスプロバイダ登録方法で、  
`app/config/app.php`の`providers[]`配列の最後に追加します。  
環境毎に異なるサービスプロバイダを記述する場合は、それぞれの`app/config/環境/app.php`にで同じ様に追加してください
```php
'providers' => [
    ...
    'MyApp\Providers\MyServiceProvider',
],
```

サービスプロバイダの`register()`記述する事で、Laravelが判断する様になり、
遅延束縛として実行時に任意のクラスや設定したものが実行されます。  
その後、サービスプロバイダの`boot()`が実行されます。
{/solution}

{discussion}
`App::register()`を使って、直接記述する事もできます。

これはローレベルで実行されます。

実装したサービスプロバイダ、またはサービスプロバイダクラスのインスタンスで利用する事ができます。

```php
App::register('MyApp\Providers\MyServiceProvider');

// or
$provider = new MyApp\Providers\MyServiceProvider;
App::register($provider);
```

この場合は、指定したサービスプロバイダの`register()`が実行され、  
アプリケーションが起動してから、`boot()`が実行されます。  
処理の流れは`app/config/app.php`に書いた場合と同様です。

サービスプロバイダを決まった場所に設置することで、管理やメンテナンス性も向上しますので、  
通常は`app/config/app.php`でサービスプロバイダを追加するのをお勧めします。
{/discussion}
