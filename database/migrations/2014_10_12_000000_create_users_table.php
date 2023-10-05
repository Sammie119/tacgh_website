<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;
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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->tinyInteger('active_flag')->default(1)->comment('1=active, 0=inactive');
            $table->tinyInteger('is_logged_in')->default(0)->comment('0=out, 1=in');
            $table->rememberToken();
            $table->timestamps();
        });

        User::create([
            'name' => 'Samuel Sarpong-Duah',
            'email' => 'info@sammav.org',
            'password' => Hash::make('sammie119'),
            'active_flag' => 1,
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
