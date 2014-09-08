---
Title:    認証のドライバーを変更する
Topics:   authentication, configuration
Position: 7
---

{problem}
Laravelの`Auth`機能で`Eloquent`ドライバー以外のものを利用したい
{/problem}

{solution}
認証のドライバを **database** に変更する事が出来ます

`app/config/auth.php`のドライバー項目を変更してみましょう

```php
'driver' => 'database',
```

アプリケーションで、認証関連で利用したいテーブルが、Laravelデフォルトの、  
**users** ではない場合は、環境に合わせて変更する必要があります  

[[認証で利用するテーブルを変更する]]を参考にして下さい
{/solution}

{discussion}
Laravelで、デフォルトで用意されているドライバは二種類です

**Eloquent** と **database** の二種のうちどれかを利用する事が出来ますが、  
これ以外にもユーザーの環境に合わせて独自のドライバを追加する事ができます

具体的には、認証管理などをAPIで行っている場合や、`mongodb`を利用している場合などです  
ドライバの詳細については、[[独自の認証ドライバーを利用する]] に記載されています
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
