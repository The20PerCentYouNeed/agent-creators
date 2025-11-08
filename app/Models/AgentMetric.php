<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AgentMetric extends Model
{
    use HasFactory;

    protected $table = 'agent_metrics_daily';

    protected $guarded = [];

    protected function casts(): array
    {
        return [
            'date' => 'date',
            'total_requests' => 'integer',
            'successful_requests' => 'integer',
            'failed_requests' => 'integer',
            'error_rate' => 'decimal:2',
            'avg_response_time_ms' => 'integer',
            'p50_response_time_ms' => 'integer',
            'p95_response_time_ms' => 'integer',
            'p99_response_time_ms' => 'integer',
            'total_tokens_input' => 'integer',
            'total_tokens_output' => 'integer',
            'total_tokens' => 'integer',
            'total_cost' => 'decimal:2',
            'unique_users' => 'integer',
            'avg_satisfaction_score' => 'decimal:2',
            'escalation_count' => 'integer',
            'peak_hour' => 'integer',
        ];
    }

    public function agent(): BelongsTo
    {
        return $this->belongsTo(Agent::class);
    }

    public function scopeForAgent($query, int $agentId)
    {
        return $query->where('agent_id', $agentId);
    }

    public function scopeForDateRange($query, string $startDate, string $endDate)
    {
        return $query->whereBetween('date', [$startDate, $endDate]);
    }
}
