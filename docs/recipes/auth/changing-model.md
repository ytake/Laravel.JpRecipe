---
Title:    認証に使うモデルを変更する
Topics:   authentication, configuration
Position: 8
---

{problem}
デフォルトの`User`ではなく、別のモデルを利用したい

開発をしているアプリケーションは、名前空間等を利用している場合等、  
デフォルトの`User`ではなく別のモデルを指定する必要があります
{/problem}

{solution}
`app/config/auth.php` のモデルの項目を変更しましょう

```php
'model' => 'MyApp\Models\User',
```
例えばこの様な指定になります

{/solution}

{discussion}
認証で利用するモデルは、決まったインターフェースを実装している必要があります

認証に独自のモデルを利用する場合は、必ず`UserInterface`を実装して下さい  
また、パスワードのリマインダーを利用する場合は、  
`RemindableInterface`を必ず実装しなければなりません

```php
<?php
namespace MyApp\Models;

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends \Eloquent implements UserInterface, RemindableInterface
{
    // 実装内容
}
```
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
