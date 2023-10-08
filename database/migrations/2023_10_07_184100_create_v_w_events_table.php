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
        DB::unprepared("CREATE OR REPLACE VIEW vw_events as 
            SELECT 
                `id`, 
                `name`, 
                `description`, 
                `start_date`, 
                `end_date`, 
                `start_time`, 
                `venue`, 
                CASE
                    WHEN `end_date` >= date(now()) THEN 1
                    ELSE 0
                END AS expired_event
            FROM `events` 
            WHERE `deleted_at` IS NULL 
            ORDER BY expired_event DESC, `start_date` ASC;
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP VIEW IF EXISTS vw_events');
    }
};
