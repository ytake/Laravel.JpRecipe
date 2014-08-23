---
Title:    パスワードリマインダーで使用するテーブルを変更
Topics:   authentication, configuration
Code:     -
Id:       78
Position: 12
---

{problem}
パスワードリマインダーで使用するテーブルを変更したい

デフォルトでは、`password_reminders`テーブルを利用する様に指定されています。  
これを使用せずに、任意のテーブルを利用する様に変更してみましょう
{/problem}

{solution}
`app/config/auth.php`ファイルで指定します

```php
'reminder' => [
    'table' => 'password_reminders',
],
```

使用したいテーブル名に変更しましょう
{/solution}

{discussion}
パワスードリマインダー関連のマイグレーションを更新するのを忘れない様にしてください

artisanコマンドを利用してテーブルを作成する場合は、更新を忘れないでください。  
[[パスワードリマインダーのマイグレーションを作成する]]を参照してください　　

または新規でマイグレーションを作成する事もできます。  
[[Creating a New Migration]]を参照してください。  
{/discussion}
