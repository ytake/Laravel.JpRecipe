---
Title:    パスワードリマインダーで利用するビューを変更
Topics:   authentication, configuration
Code:     -
Id:       76
Position: 10
---

{problem}
パスワードリマインダーで利用するビューを変更したい
{/problem}

{solution}
ビューは自由に変更出来ます。  
`app/views/emails/auth`ディレクトリにある、`reminder.blade.php`を編集しましょう

この パスワードリマインダーは`email`を利用します

デフォルトは以下の通りです

```html
<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="utf-8">
  </head>
  <body>
    <h2>Password Reset</h2>
    <div>
      To reset your password, complete this form:
      {{ URL::to('password/reset', array($token)) }}.
    </div>
  </body>
</html>
```
`app/config/auth.php`を編集して、
ビュー自体を変更したり、他のディレクトリのビューを指定することもできます。  

```php
'reminder' => [
    'email' => 'emails.auth.reminder',
],
```

簡単に`reminder.email`を他のビューに指定する事ができます
{/solution}

{discussion}
これはLaravelで用意されている唯一のデフォルトのビューです

レシピに従って実装する場合は、[[Creating a Reminders Controller]]  
2つのビューを作成する必要が有ります
### 1
`views/password/remind.blade.php`

: このビューはメールアドレスを利用出来る様にしましょう。"パスワードを忘れましたか？"等のリンクを用意しましょう
### 2
`views/password/reset.blade.php`

: このビューはパスワードを変更するユーザーが利用するものです。リマインダーのメールにこのページのリンクを含めましょう。  
このページのフィールドに'email', 'password', 'password_confirmation', 'token'を必ず含めてください。
{/discussion}
