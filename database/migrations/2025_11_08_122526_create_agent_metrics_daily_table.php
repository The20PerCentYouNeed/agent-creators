<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('agent_metrics_daily', function (Blueprint $table) {
            $table->id();
            $table->foreignId('agent_id')->constrained()->cascadeOnDelete();
            $table->date('date');
            $table->integer('total_requests')->default(0);
            $table->integer('successful_requests')->default(0);
            $table->integer('failed_requests')->default(0);
            $table->decimal('error_rate', 5, 2)->default(0);
            $table->integer('avg_response_time_ms')->default(0);
            $table->integer('p50_response_time_ms')->default(0);
            $table->integer('p95_response_time_ms')->default(0);
            $table->integer('p99_response_time_ms')->default(0);
            $table->bigInteger('total_tokens_input')->default(0);
            $table->bigInteger('total_tokens_output')->default(0);
            $table->bigInteger('total_tokens')->default(0);
            $table->decimal('total_cost', 10, 2)->default(0);
            $table->integer('unique_users')->default(0);
            $table->decimal('avg_satisfaction_score', 3, 2)->nullable();
            $table->integer('escalation_count')->default(0);
            $table->integer('peak_hour')->nullable();
            $table->timestamps();

            $table->unique(['agent_id', 'date']);
            $table->index(['agent_id', 'date']);
            $table->index('date');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('agent_metrics_daily');
    }
};
