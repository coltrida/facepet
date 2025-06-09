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
        Schema::create('notifies', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\User::class, 'sender_id');
            $table->foreignIdFor(\App\Models\User::class, 'receiver_id');
            $table->foreignIdFor(\App\Models\Post::class)->nullable();
            $table->foreignIdFor(\App\Models\Photo::class)->nullable();
            $table->boolean('read')->nullable();
            $table->string('body');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifies');
    }
};
