---
Title:    configのグループが存在するか確認する
Topics:   configuration, environment
Code:     Config::hasGroup()
Id:       8
Position: 2
---

{problem}
configのグループが存在するか確認したい

Laravelはそれぞれの設定をグループ化できるのをご存知ですか？
それぞれのグループは個別のファイルで分ける事ができます。
例えば、`app/config/database.php`ファイルは、_database_ グループのconfigファイルとなります
{/problem}

{solution}
`Config::hasGroup()`を利用します

```php
if (\Config::hasGroup('session')) {
	echo "I have a config/session.php file!";
}
```
{/solution}

{discussion}
これは、本番環境用の既存のグループを取得しています。

現在の環境が _local_ とすれば、
`app/config/local/shoes.php`を利用しますが、
トップレベル(本番環境向け)の`app/config/shoes.php` が存在していない場合は、
`Config::hasGroup("shoes")` で返却される値は`false`となります
{/discussion}
