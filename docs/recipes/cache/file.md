---
Title:    キャッシュドライバーにファイルを利用する
Topics:   configuration
Position: 1
---

{problem}
Laravelのキャッシュにファイルを利用したい

ファイルキャッシュを利用するよりも他のキャッシュドライバーを用いた方が効率的ですが、  
ファイルキャッシュは簡単に扱えますので利用してみましょう
{/problem}

{solution}
これは事前に設定されています

Laravelはデフォルトのキャッシュドライバーにファイルが選択されています  
`app/config/cache.php`を見ると、設定されている内容が確認できます  
なおデフォルトでは下記の様に指定されています

```php
'driver' => 'file',
```

**file** 以外のキャッシュドライバーを利用する場合はここを変更して下さい  
または [[実行環境の決定]] を利用している場合は、`app/config/{envname}/cache.php`を変更してください
{/solution}

{discussion}
ファイルキャッシュには制限があります

具体的には、`Cache::increment()`、`Cache::decrement()`はサポートされていないため利用できません
{/discussion}

{credit}
Author:Chuck Heintzelman

Editor and Translator:Yuuki Takezawa
{/credit}
