---
Title:    独自の認証ドライバーを利用する
Topics:   extension
Code:     -
Id:       115
Position: 1
---

{problem}
Laravelで用意されている認証ドライバーが、現在の仕様に合っていない等、
独自のドライバーを作成して利用したい
{/problem}

{solution}
Laravelを拡張して独自のドライバーを作成します

#### Step 1 - UserProviderInterfaceを実装する

まず、認証を処理するクラスを作成しなければなりません
ここではサンプルとしてランダムに資格情報を検証して、
50%をダミーユーザーとして返却するものを紹介します

```php
<?php
 namespace MyApp\Extensions;

use Illuminate\Auth\GenericUser;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\UserProviderInterface;

class DummyAuthProvider implements UserProviderInterface
{

    /**
     * Retrieve a user by their unique identifier.
     *
     * @param  mixed  $id
     * @return \Illuminate\Auth\UserInterface|null
     */
    public function retrieveById($id)
    {
        // 50% of the time return our dummy user
        if (mt_rand(1, 100) <= 50) {
            return $this->dummyUser();
        }
        // 50% of the time, fail
        return null;
    }

    /**
     * Retrieve a user by the given credentials.
     * DO NOT TEST PASSWORD HERE!
     *
     * @param  array  $credentials
     * @return \Illuminate\Auth\UserInterface|null
     */
    public function retrieveByCredentials(array $credentials)
    {
        // 50% of the time return our dummy user
        if (mt_rand(1, 100) <= 50)
        {
            return $this->dummyUser();
        }

        // 50% of the time, fail
        return null;
    }

    /**
     * Validate a user against the given credentials.
     *
     * @param  \Illuminate\Auth\UserInterface  $user
     * @param  array  $credentials
     * @return bool
     */
    public function validateCredentials(UserInterface $user, array $credentials)
    {
        // we'll assume if a user was retrieved, it's good
        return true;
    }

    /**
     * Return a generic fake user
     */
    protected function dummyUser()
    {
        $attributes = [
            'id' = 123,
            'username' => 'chuckles',
            'password' => \Hash::make('SuperSecret'),
            'name' => 'Dummy User',
        ];
        return new GenericUser($attributes);
    }

    /**
     * Needed by Laravel 4.1.26 and above
     */
    public function retrieveByToken($identifier, $token)
    {
        return new \Exception('not implemented');
    }

    /**
     * Needed by Laravel 4.1.26 and above
     */
    public function updateRememberToken(UserInterface $user, $token)
    {
        return new \Exception('not implemented');
    }
}

```

#### Step 2 - Authコンポーネントを拡張する

サービスプロバイダーか、`app/start/global.php`に次の様に追加します

```php
\Auth::extend('dummy', function($app) {
    return new \MyApp\Extensions\DummyAuthProvider;
});
```

#### Step 3 - authドライバーを変更する

`app/config/auth.php`のdriverを変更しましょう

```php
'driver' => 'dummy',
```
{/solution}

{discussion}
この例はあり得ない例ですが、独自認証ドライバーの基本的な追加方法を踏まえています

このレシピサイトも独自のドライバーを使っています
[Laravel.JpRecipe](https://github.com/ytake/Laravel.JpRecipe)
またデータベースなども拡張して、
標準に含まれていないものを使って、拡張して作成する事もできますので参考にしてみましょう
[Laravel.VoltDB](https://github.com/ytake/Laravel.VoltDB)
{/discussion}
