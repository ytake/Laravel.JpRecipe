---
Title:    PHPUnitを利用しよう
Topics:   testing
---

# Header {.problem}
PHPUnitの実行方法がわかりません  

# Header {.solution}
Laravelの`composer.json`の`require-dev`にはphpunitが記述されています。  
phpunitのインストールはcomposerのコマンドに次のオプションを指定していない場合は、自動的にインストールされます。

```bash
$ composer install --no-dev
```

インストール後は次のコマンドでテストが実行されます。  
```bash
$ vendor/bin/phpunit
```

特別な指定などをしなくても簡単に実行できます。  


# Header {.advice}
PHPUnitのマニュアルも参考にしましょう。

# Header {.credit}

[linkref]: url "optional title" {#id .class}
