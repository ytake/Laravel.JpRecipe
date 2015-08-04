<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

/**
 * Class CategoryTableSeeder
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class CategoryTableSeeder extends Seeder
{
    /** @var string */
    protected $table = 'categories';

    /** @var array */
    protected $attribute = [
        /**
         * for section1
         * Laravelの基本設定関連レシピ
         */
        [
            'section_id' => 1,
            'slug' => 'help',
            'name' => 'Help',
            'description' => 'Laravelについて困った事があった場合のレシピ',
            'position' => 1,
        ],
        [
            'section_id' => 1,
            'slug' => 'install',
            'name' => 'Installation',
            'description' => '開発環境関連についてのレシピ',
            'position' => 2,
        ],
        [
            'section_id' => 1,
            'slug' => 'configuration',
            'name' => 'Configuration',
            'description' => 'Laravelの基本設定レシピ',
            'position' => 3,
        ],
        [
            'section_id' => 1,
            'slug' => 'basicdev',
            'name' => 'Basic Development',
            'description' => 'Laravelを使った開発の基本レシピ(プロジェクトの作成ルート、基本的なコントローラの使用量を、設定など)',
            'position' => 4,
        ],
        /**
         * for section2
         * Laravelのコンポーネント関連レシピ
         */
        [
            'section_id' => 2,
            'slug' => 'app',
            'name' => 'App',
            'description' => 'Appファサードのレシピ',
            'position' => 1,
        ],
        [
            'section_id' => 2,
            'slug' => 'artisan',
            'name' => 'Artisan',
            'description' => 'Artisanファサードのレシピ',
            'position' => 2,
        ],
        [
            'section_id' => 2,
            'slug' => 'auth',
            'name' => 'Auth',
            'description' => 'Authファサードのレシピ',
            'position' => 3,
        ],
        [
            'section_id' => 2,
            'slug' => 'blade',
            'name' => 'Blade',
            'description' => 'Bladeファサードのレシピ',
            'position' => 4,
        ],
        [
            'section_id' => 2,
            'slug' => 'cache',
            'name' => 'Cache',
            'description' => 'Cacheファサードのレシピ',
            'position' => 5,
        ],
        [
            'section_id' => 2,
            'slug' => 'config',
            'name' => 'Config',
            'description' => 'Configファサードのレシピ',
            'position' => 6,
        ],
        [
            'section_id' => 2,
            'slug' => 'controller',
            'name' => 'Controller',
            'description' => 'コントローラーのレシピ',
            'position' => 7,
        ],
        [
            'section_id' => 2,
            'slug' => 'cookie',
            'name' => 'Cookie',
            'description' => 'Cookieコンポーネントのレシピ',
            'position' => 8,
        ],
        [
            'section_id' => 2,
            'slug' => 'crypt',
            'name' => 'Crypt',
            'description' => 'LaravelのCryptコンポーネントのレシピ',
            'position' => 9,
        ],
        [
            'section_id' => 2,
            'slug' => 'file',
            'name' => 'File',
            'description' => 'Fileファサードのレシピ',
            'position' => 10,
        ],
        [
            'section_id' => 2,
            'slug' => 'form',
            'name' => 'Form',
            'description' => 'Formファサードのレシピ',
            'position' => 11,
        ],
        [
            'section_id' => 2,
            'slug' => 'hash',
            'name' => 'Hash',
            'description' => 'Hashファサードのレシピ',
            'position' => 12,
        ],
        [
            'section_id' => 2,
            'slug' => 'html',
            'name' => 'Html',
            'description' => 'Htmlファサードのレシピ',
            'position' => 13,
        ],
        [
            'section_id' => 2,
            'slug' => 'lang',
            'name' => 'Lang',
            'description' => 'Langファサードのレシピ',
            'position' => 14,
        ],
        [
            'section_id' => 2,
            'slug' => 'testing',
            'name' => 'Testing',
            'description' => 'LaravelのUnit Test関連のレシピ',
            'position' => 15,
        ],
        [
            'section_id' => 2,
            'slug' => 'router',
            'name' => 'Route',
            'description' => 'LaravelのRouter関連のレシピ',
            'position' => 16,
        ],
        [
            'section_id' => 2,
            'slug' => 'session',
            'name' => 'Session',
            'description' => 'Sessionファサードのレシピ',
            'position' => 17,
        ],
        [
            'section_id' => 2,
            'slug' => 'paginator',
            'name' => 'Paginator',
            'description' => 'Paginatorファサードのレシピ',
            'position' => 18,
        ],
        [
            'section_id' => 2,
            'slug' => 'broadcast',
            'name' => 'Broadcast',
            'description' => 'Broadcastファサードのレシピ',
            'position' => 19,
        ],
        /**
         * for section3
         * データベース関連レシピ
         */
        [
            'section_id' => 3,
            'slug' => 'db-config',
            'name' => 'Database Configuration',
            'description' => 'データベース設定のレシピ',
            'position' => 1,
        ],
        [
            'section_id' => 3,
            'slug' => 'db',
            'name' => 'DB',
            'description' => 'DBファサードのレシピ',
            'position' => 2,
        ],
        [
            'section_id' => 3,
            'slug' => 'eloquent',
            'name' => 'Eloquent',
            'description' => 'Eloquentのレシピ',
            'position' => 3,
        ],
        /**
         * for section4
         * Laravelを拡張する色々な方法のレシピ
         */
        [
            'section_id' => 4,
            'slug' => 'coreext',
            'name' => 'Core Extension',
            'description' => 'Laravelのコア関連のレシピ',
            'position' => 1,
        ],
        [
            'section_id' => 4,
            'slug' => 'svcprvdr',
            'name' => 'Service Provider',
            'description' => 'Service Providerのレシピ',
            'position' => 2,
        ],
        [
            'section_id' => 4,
            'slug' => 'middleware',
            'name' => 'Middleware',
            'description' => 'ミドルウェア関連のレシピ',
            'position' => 3,
        ],
        [
            'section_id' => 4,
            'slug' => 'thirdparty',
            'name' => 'Packages by 3rd Parties',
            'description' => 'パッケージ開発のレシピ',
            'position' => 4,
        ],
        [
            'section_id' => 4,
            'slug' => 'solution',
            'name' => 'Solution',
            'description' => 'PHP全般の開発を便利にするソリューション関連のレシピ',
            'position' => 5,
        ],
    ];

    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        foreach ($this->attribute as $row) {
            $row['created_at'] = Carbon::now()->toDateTimeString();
            \DB::connection()->table($this->table)->insert($row);
        }
    }
}
