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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->date('birthday');
            $table->string('phone'); // Ref : https://laravel.com/docs/7.x/migrations https://stackoverflow.com/questions/23637057/why-is-it-best-to-store-a-telephone-number-as-a-string-vs-integer/23637154
            $table->string('email')->unique();
            $table->foreignId('city_id')->constrained('cities');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
