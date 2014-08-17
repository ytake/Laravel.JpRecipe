---
Title:    現在の言語環境を設定する
Topics:   -
Code:     App::setLocale()
Id:       208
Position: 26
---

{problem}
現在の言語環境を変更したい
{/problem}

{solution}
`App::setLocale()`メソッドを利用します

```php
// 'es' Spanishに変更する
\App::setLocale('es');
```

リクエストの処理内で`es`に変更したとして、  
次の処理をする場合は、またアプリケーションで設定されているデフォルトの言語環境に戻る事を覚えておいてください
{/solution}

{discussion}
これは単に`app.locale`の言語環境を変更するものではありません

変更方法は3つあります:

1. `app.locale`の設定値を変更する
2. 翻訳関連処理で言語を指定する
3. `locale.changed`イベントをアプリケーションで検知する
{/discussion}
