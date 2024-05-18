<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->rememberToken();
            $table->string('photo')->default('avatar.jpg');
            $table->string('role', 5)->default('user');
            $table->string('rang', 5)->default('Ученик');
            $table->string('status', 8)->default('offline');
            $table->timestamp('last_activity')->nullable();
            $table->string('login', 20);
            $table->string('password', 25);
            $table->string('name', 15);
            $table->string('lastname', 20);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
