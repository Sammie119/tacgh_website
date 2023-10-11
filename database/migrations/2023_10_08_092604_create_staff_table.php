<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('contact', 20)->nullable();
            $table->string('position');
            $table->string('is_staff_or_board');
            $table->string('whatsapp_address')->nullable();
            $table->string('facebook_address')->nullable();
            $table->string('twitter_address')->nullable();
            $table->string('instagram_address')->nullable();
            $table->string('linkedin_address')->nullable();
            $table->foreignId('asset_id')->constrained();
            $table->bigInteger('created_by');
            $table->bigInteger('updated_by');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff');
    }
};
