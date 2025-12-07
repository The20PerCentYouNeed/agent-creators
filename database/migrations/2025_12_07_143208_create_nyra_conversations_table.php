<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('nyra_conversations', function (Blueprint $table) {
            $table->id();
            $table->string('thread_id')->unique(); // unique() already creates an index
            $table->unsignedTinyInteger('rating')->nullable(); // 1-5 stars
            $table->unsignedInteger('message_count')->default(0);
            $table->timestamps();

            $table->index('rating');
            $table->index('created_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('nyra_conversations');
    }
};
