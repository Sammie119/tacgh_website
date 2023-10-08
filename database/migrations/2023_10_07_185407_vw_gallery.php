<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared("CREATE OR REPLACE VIEW vw_gallery as 
            SELECT
                `laravel_cms`.`galleries`.`gallery_group` AS `gallery_group`,
                `laravel_cms`.`galleries`.`post_id` AS `post_id`,
                `laravel_cms`.`galleries`.`name` AS `name`,
                `laravel_cms`.`galleries`.`description` AS `description`,
                `laravel_cms`.`galleries`.`width` AS `width`,
                `laravel_cms`.`galleries`.`height` AS `height`,
                COUNT(`laravel_cms`.`galleries`.`id`) AS `count`
            FROM
                `laravel_cms`.`galleries`
            WHERE
                `laravel_cms`.`galleries`.`deleted_at` IS NULL
            GROUP BY
                `laravel_cms`.`galleries`.`name`,
                `laravel_cms`.`galleries`.`post_id`,
                `laravel_cms`.`galleries`.`description`,
                `laravel_cms`.`galleries`.`width`,
                `laravel_cms`.`galleries`.`gallery_group`,
                `laravel_cms`.`galleries`.`height`");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP VIEW IF EXISTS vw_gallery');
    }
};
