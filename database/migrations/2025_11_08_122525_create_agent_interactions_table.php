<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('agent_interactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('agent_id')->constrained()->cascadeOnDelete();
            $table->string('session_id')->index();
            $table->string('user_identifier')->nullable();
            $table->text('user_input');
            $table->text('agent_response')->nullable();
            $table->string('intent')->nullable();
            $table->enum('sentiment', ['positive', 'neutral', 'negative'])->nullable();
            $table->integer('tokens_input')->default(0);
            $table->integer('tokens_output')->default(0);
            $table->integer('tokens_total')->default(0);
            $table->integer('response_time_ms')->default(0);
            $table->decimal('cost', 10, 6)->default(0);
            $table->enum('status', ['success', 'error', 'timeout', 'partial'])->default('success');
            $table->text('error_message')->nullable();
            $table->decimal('confidence_score', 5, 2)->nullable();
            $table->integer('user_satisfaction')->nullable();
            $table->boolean('escalated_to_human')->default(false);
            $table->json('metadata')->nullable();
            $table->timestamps();

            $table->index(['agent_id', 'created_at']);
            $table->index(['agent_id', 'status']);
            $table->index('intent');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('agent_interactions');
    }
};
