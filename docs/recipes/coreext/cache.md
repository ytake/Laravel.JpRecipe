---
Title:    独自のキャッシュドライバーを利用する
Topics:   cache
Code:     Cache::extend()
Id:       262
Position: 6
---

{problem}
Laravelで用意されているキャッシュドライバーが、現在の仕様に合っていない等、
独自のドライバーを作成して利用したい
{/problem}

{solution}
Laravelを拡張して独自のキャッシュドライバーを作成します

#### Step 1 - Illuminate\Cache\StoreInterfaceを実装する

まずキャッシュのメソッドを利用するためのクラスを作成しなければなりません
サンプルとしてキャッシュしないダミーキャッシュドライバを作成してみましょう

```php
<?php
namespace MyApp\Extensions;

use Illuminate\Cache\StoreInterface;

class DummyCacheStore implements StoreInterface
{

    /**
     * A string that should be prepended to keys.
     *
     * @var string
     */
    protected $prefix;

    /**
     * Create a new Dummy cache store.
     *
     * @param  string  $prefix
     * @return void
     */
    public function __construct($prefix = '')
    {
        $this->prefix = $prefix;
    }

    /**
     * Retrieve an item from the cache by key.
     *
     * @param  string  $key
     * @return mixed
     */
    public function get($key)
    {
        return null;    // never retrieve an item
    }

    /**
     * Store an item in the cache for a given number of minutes.
     *
     * @param  string  $key
     * @param  mixed   $value
     * @param  int     $minutes
     * @return void
     */
    public function put($key, $value, $minutes)
    {
        // do nothing
    }

    /**
     * Increment the value of an item in the cache.
     *
     * @param  string  $key
     * @param  mixed   $value
     * @return void
     *
     * @throws \LogicException
     */
    public function increment($key, $value = 1)
    {
        throw new \LogicException("Not supported by this driver.");
    }

    /**
     * Increment the value of an item in the cache.
     *
     * @param  string  $key
     * @param  mixed   $value
     * @return void
     *
     * @throws \LogicException
     */
    public function decrement($key, $value = 1)
    {
        throw new \LogicException("Not supported by this driver.");
    }

    /**
     * Store an item in the cache indefinitely.
     *
     * @param  string  $key
     * @param  mixed   $value
     * @return void
     */
    public function forever($key, $value)
    {
        // do nothing
    }

    /**
     * Remove an item from the cache.
     *
     * @param  string  $key
     * @return void
     */
    public function forget($key)
    {
        // do nothing
    }

    /**
     * Remove all items from the cache.
     *
     * @return void
     */
    public function flush()
    {
        // do nothing
    }

    /**
     * Get the cache key prefix.
     *
     * @return string
     */
    public function getPrefix()
    {
        return $this->prefix;
    }
}
```

#### Step 2 - Cacheコンポーネントを拡張する

サービスプロバイダーか、`app/start/global.php`に次の様に追加します

```php
\Cache::extend('dummy', function($app) {
    $store = new \MyApp\Extensions\DummyCacheStore;
    return new \Illuminate\Cache\Repository($store);
});
```

#### Step 3 - authドライバーを変更する

`app/config/cache.php`のdriverを変更しましょう

```php
'driver' => 'dummy',
```
{/solution}

{discussion}
この例は何もしないドライバーですが、独自キャッシュドライバーの基本的な追加方法を踏まえています

独自のキャッシュドライバのスケルトンとして、この例を使用してみましょう
{/discussion}
