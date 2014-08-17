---
Title:    認証で利用するユーザープロバイダーを設定する
Topics:   -
Code:     Auth::setProvider()
Id:       236
Position: 41
---

{problem}
認証で利用するユーザープロバイダーを別のものにしたい
{/problem}

{solution}
`Auth::setProvider()`メソッドを利用します

```php
\Auth::setProvider($user_provider);
```

認証で使用するプロバイダーは、  
インターフェースの`Illuminate\Auth\UserProviderInterface`を継承して実装しなければなりません
{/solution}

{discussion}
これは高度なトピックです。

一般的には、認証で使用するドライバにあわせて、  
自動的に対応したユーザープロバイダーを設定します。

当然ですが、環境によっては標準のものを利用しないケースもあります。  
標準的なものを使わずに、カスタマイズして独自のドライバー等を実装することが可能です。  
認証ルーチンが実行される前に、このメソッドが実行されるようにします。  
実装する場合は、サービスプロバイダーまたは `app/start/global.php`を利用しましょう
{/discussion}
