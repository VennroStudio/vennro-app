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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->index()->constrained('users')->onDelete('cascade');
            $table->foreignId('related_user_id')->index()->constrained('users')->onDelete('cascade');
            $table->morphs('notifiable');
            $table->string('status', 1)->default('1')->comment('1 - unread, 0 - read');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
