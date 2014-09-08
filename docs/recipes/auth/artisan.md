---
Title:    Artisan パスワードリマインダーコマンド
Topics:   authentication, configuration
Position: 13
---

{problem}
Artisanコマンドで、Laravelで実装されているパスワードリマインダーを使いたい
{/problem}

{solution}
関連するコマンドリストを挙げましょう

* `php artisan auth:reminders` - [[パスワードリマインダーのマイグレーションを作成する]]
* `php artisan auth:clear-reminders` - [[期限切れパスワードのリマインダーをクリアする]]
* `php artisan auth:reminders-controller` - [[リマインダーコントローラの作成]]

もちろん、`php artisan`とコンソールで打てば実装されているコマンドリストが表示されます
{/solution}

{discussion}
特にありません
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
