<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Schema\Blueprint;

class DatabaseSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('SectionTableSeeder');
        $this->call('CategoryTableSeeder');
        \Schema::table('categories', function (Blueprint $table) {
            $table->foreign('section_id')->references('section_id')
                ->on('sections')->onDelete('cascade')->onUpdate('cascade');
        });
        \Schema::table('recipes', function (Blueprint $table) {
            $table->foreign('category_id')->references('category_id')
                ->on('categories')->onDelete('cascade')->onUpdate('cascade');
        });

        \Schema::table('recipe_tags', function (Blueprint $table) {
            $table->foreign('recipe_id')->references('recipe_id')
                ->on('recipes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('tag_id')->references('tag_id')
                ->on('tags')->onDelete('cascade')->onUpdate('cascade');
            $table->unique(['recipe_id', 'tag_id'], 'RECIPE_TAG_UNIQUE');
        });
        // for index(text length)
        if(\DB::getDefaultConnection() !== 'testing') {
            \DB::connection('master')->statement(
                'ALTER TABLE `recipes` ADD INDEX SEARCH_INDEX(`title`)'
            );
            \DB::connection('master')->statement(
                'ALTER TABLE `sections` CHANGE COLUMN `updated_at` `updated_at`'
                .' TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'
            );
            \DB::connection('master')->statement(
                'ALTER TABLE `categories` CHANGE COLUMN `updated_at` `updated_at`'
                .' TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'
            );
            \DB::connection('master')->statement(
                'ALTER TABLE `recipes` CHANGE COLUMN `updated_at` `updated_at`'
                .' TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'
            );
        }
        $this->command->info('complete');
    }

}
