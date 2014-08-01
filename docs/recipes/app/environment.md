---
Title:    実行している環境を確認
Topics:   environment
Code:     App::environment(), App::isLocal(), App::runningUnitTests()
Id:       1
Position: 1
---

{problem}
実行している環境が知りたい

環境による処理の切り分けを行いたいときに、  
アプリケーションの実行されている環境の取得方法を知っていると便利ですが、  
どれが最善の方法なのかがわからない
{/problem}

{solution}
いくつか方法があります

もし、現在の環境が**local**か、**testing**なのかを知りたい場合は、  
次の様に確認する事ができます  
```php
if (App::isLocal()) {  
  　// 実行環境がlocal
    echo "environment=local\n";
} elseif (App::runningUnitTests()) {
  　// 実行環境がtesting
    echo "environment=testing\n";
}
```

それ以外では、それぞれの環境名を照らし合わせて確認する事ができます
```php
if (App::environment('production', 'staging')) {
    echo "I'm on production or staging\n";
} else {
    echo "environment=", App::environment(), "\n";
}
```
{/solution}

{discussion}
環境設定は、Iocコンテナに`'env'`として登録されています。

```php
echo app('env');
```

環境設定について詳しく紹介しています [[Environment Specific Configurations]] for d
{/discussion}
