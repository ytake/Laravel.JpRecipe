---
Title:    namespaceを利用した開発方法
Topics:   namespace, psr, facades
Code:     -
Id:       43
Position: 12
---

{problem}
Laravelのプロジェクトでnamespaceを利用したい

PSR−0、PSR−1、PSR−2、PSR−4コーディング規約については理解していて、  
実際に利用したいが、LaravelのFacadeを巧く利用できない
{/problem}

{solution}
[[PSR-0準拠のディレクトリ構造]]にも記されている通り、
composer.jsonを編集します。

編集後に autoloadファイルを再生成しましょう

```bash
$ composer dump-autoload
```

これで名前空間を使用して、クラスの階層を構築することができます

## Facadeはどうすればいいですか？
Laravelのファサードはグローバルで作用する為、  
コントローラーやモデルで名前空間を利用すると、
その名前空間内ではインポートされていない為利用が出来なくなります

利用するにはいくつか方法があります

### 完全修飾名
Facadeの頭にスラッシュをつけて利用します

```php
<?php
namespace Acme\Controllers;

class AcmeController extends BaseController
{

    public function action()
    {
        return \View::make('hello');
    }
}

```

### Facadeをインポート
useで利用するファサードをインポートします。  
これはFacadeをそのまま指定するか、または`Illuminate\Support\Facades`を指定します

```php
<?php
namespace Acme\Controllers;

use Config;
// または
use Illuminate\Support\Facades\Config;

class AcmeController extends BaseController
{

    public function action()
    {
        Config::get('app.key');
    }
}

```

{/solution}

{discussion}
利用環境にもよりますが、pecl Eventをインストールしている環境では、
Eventが衝突するため、下記の様にして回避する必要があります。

```php
<?php
namespace Acme;

use Illuminate\Support\Facades\Event as IlluminateEvent;

class AcmeModel
{
    public function all()
    {
        IlluminateEvent::fire('acme.event', [__FUNCTION__]);
    }
}
```

名前空間についてしっかりと理解する事で、対応する事が出来ます

{/discussion}
