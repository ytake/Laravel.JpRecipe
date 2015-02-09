<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

/**
 * Class SectionTableSeeder
 * @package Receipe\DBSeeder
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class SectionTableSeeder extends Seeder
{

    protected $table = 'sections';

    /** @var array  */
    protected $attribute = [
        [
            'name' => 'Laravel 基本設定',
            'description' => 'Laravelの基本設定関連レシピ',
            'position' => 1,
        ],
        [
            'name' => 'Laravel コンポーネント',
            'description' => 'Laravelのコンポーネント関連レシピ',
            'position' => 2,
        ],
        [
            'name' => 'データベース',
            'description' => 'データベース関連レシピ',
            'position' => 3,
        ],
        [
            'name' => 'Laravel 拡張',
            'description' => 'Laravelを拡張する色々な方法のレシピ',
            'position' => 4,
        ],
    ];

    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        foreach($this->attribute as $row) {

            $row['created_at'] = Carbon::now()->toDateTimeString();
            \DB::connection('master')->table($this->table)->insert($row);
        }
    }
}
