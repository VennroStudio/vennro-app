<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->index()->constrained('users')->onDelete('cascade');
            $table->date('date_birth', 11)->nullable();
            $table->string('course', 80)->nullable();
            $table->string('group', 10)->nullable();
            $table->string('mobile', 12)->nullable();
            $table->string('email', 30)->nullable();
            $table->string('tg', 20)->nullable();
            $table->string('vk', 20)->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
