<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\CostAnalysisStats;
use App\Filament\Widgets\CostTrendChart;
use App\Filament\Widgets\PeakHoursChart;
use App\Filament\Widgets\CostByAgentChart;
use App\Filament\Widgets\IntentDistributionChart;
use App\Filament\Widgets\SentimentDistributionChart;
use App\Filament\Widgets\AgentPerformanceOverview;
use App\Models\Agent;
use App\Models\AgentInteraction;
use App\Models\AgentMetric;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Pages\Dashboard\Concerns\HasFiltersForm;
use Filament\Pages\Page;
use Filament\Schemas\Schema;

class Analytics extends Page
{
    use HasFiltersForm;

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-chart-bar';

    protected string $view = 'filament.pages.analytics';

    protected static ?string $navigationLabel = 'Analytics';

    protected static string | \UnitEnum | null $navigationGroup = 'Monitoring';

    protected static ?int $navigationSort = 4;

    protected static ?string $title = 'Analytics & Reports';

    protected static ?string $description = 'Deep dive into your agent performance metrics';

    protected function getHeaderWidgets(): array
    {
        return [
            CostAnalysisStats::class,
            CostTrendChart::class,
            PeakHoursChart::class,
            CostByAgentChart::class,
            IntentDistributionChart::class,
            SentimentDistributionChart::class,
            AgentPerformanceOverview::class,
        ];
    }

    public ?string $startDate = null;

    public ?string $endDate = null;

    public ?int $agentId = null;

    public function filtersForm(Schema $schema): Schema
    {
        return $schema
            ->components([
                DatePicker::make('startDate')
                    ->label('Start Date')
                    ->default(now()->subDays(30))
                    ->maxDate(now()),

                DatePicker::make('endDate')
                    ->label('End Date')
                    ->default(now())
                    ->maxDate(now()),

                Select::make('agentId')
                    ->label('Agent Filter')
                    ->options(fn () => [null => 'All Agents'] + Agent::pluck('name', 'id')->toArray()),
            ])
            ->columns(3);
    }

    public function getCostData(): array
    {
        $query = AgentMetric::query()
            ->whereBetween('date', [$this->startDate, $this->endDate]);

        if ($this->agentId) {
            $query->where('agent_id', $this->agentId);
        }

        $totalCost = $query->sum('total_cost');
        $totalRequests = $query->sum('total_requests');
        $costPerRequest = $totalRequests > 0 ? $totalCost / $totalRequests : 0;

        $dailyCosts = $query->selectRaw('DATE(date) as date, SUM(total_cost) as cost')
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        return [
            'total_cost' => $totalCost,
            'total_requests' => $totalRequests,
            'cost_per_request' => $costPerRequest,
            'daily_costs' => $dailyCosts,
        ];
    }

    public function getCostByAgent(): array
    {
        $costs = AgentMetric::query()
            ->whereBetween('date', [$this->startDate, $this->endDate])
            ->join('agents', 'agent_metrics_daily.agent_id', '=', 'agents.id')
            ->selectRaw('agents.name, SUM(total_cost) as cost')
            ->groupBy('agents.name')
            ->orderByDesc('cost')
            ->get();

        return $costs->pluck('cost', 'name')->toArray();
    }

    public function getAgentPerformance(): array
    {
        $query = Agent::query()
            ->withSum(['metrics as total_cost' => function ($q) {
                $q->whereBetween('date', [$this->startDate, $this->endDate]);
            },
            ], 'total_cost')
            ->withSum(['metrics as total_requests' => function ($q) {
                $q->whereBetween('date', [$this->startDate, $this->endDate]);
            },
            ], 'total_requests')
            ->withSum(['metrics as successful_requests' => function ($q) {
                $q->whereBetween('date', [$this->startDate, $this->endDate]);
            },
            ], 'successful_requests')
            ->withAvg(['metrics as avg_response_time' => function ($q) {
                $q->whereBetween('date', [$this->startDate, $this->endDate]);
            },
            ], 'avg_response_time_ms');

        if ($this->agentId) {
            $query->where('id', $this->agentId);
        }

        return $query->get()->map(function ($agent) {
            $successRate = $agent->total_requests > 0 ? round(($agent->successful_requests / $agent->total_requests) * 100, 1) : 0;

            return [
                'name' => $agent->name,
                'type' => $agent->type,
                'total_requests' => $agent->total_requests ?? 0,
                'success_rate' => $successRate,
                'avg_response_time' => $agent->avg_response_time ? round($agent->avg_response_time) : 0,
                'total_cost' => $agent->total_cost ?? 0,
            ];
        })->toArray();
    }

    public function getPeakHours(): array
    {
        $query = AgentInteraction::query()
            ->whereBetween('created_at', [$this->startDate, $this->endDate]);

        if ($this->agentId) {
            $query->where('agent_id', $this->agentId);
        }

        return $query->selectRaw('HOUR(created_at) as hour, COUNT(*) as count')
            ->groupBy('hour')
            ->orderBy('hour')
            ->get()
            ->pluck('count', 'hour')
            ->toArray();
    }

    public function getIntentDistribution(): array
    {
        $query = AgentInteraction::query()
            ->whereBetween('created_at', [$this->startDate, $this->endDate]);

        if ($this->agentId) {
            $query->where('agent_id', $this->agentId);
        }

        return $query->selectRaw('intent, COUNT(*) as count')
            ->whereNotNull('intent')
            ->groupBy('intent')
            ->orderByDesc('count')
            ->limit(10)
            ->get()
            ->pluck('count', 'intent')
            ->toArray();
    }

    public function getSentimentDistribution(): array
    {
        $query = AgentInteraction::query()
            ->whereBetween('created_at', [$this->startDate, $this->endDate]);

        if ($this->agentId) {
            $query->where('agent_id', $this->agentId);
        }

        return $query->selectRaw('sentiment, COUNT(*) as count')
            ->whereNotNull('sentiment')
            ->groupBy('sentiment')
            ->get()
            ->pluck('count', 'sentiment')
            ->toArray();
    }

    public function exportCsv()
    {
        $performance = $this->getAgentPerformance();

        $filename = 'analytics-'.now()->format('Y-m-d').'.csv';
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"{$filename}\"",
        ];

        $callback = function () use ($performance) {
            $file = fopen('php://output', 'w');

            fputcsv($file, ['Agent', 'Type', 'Total Requests', 'Success Rate', 'Avg Response Time (ms)', 'Total Cost']);

            foreach ($performance as $agent) {
                fputcsv($file, [
                    $agent['name'],
                    $agent['type'],
                    $agent['total_requests'],
                    $agent['success_rate'].'%',
                    $agent['avg_response_time'],
                    '$'.number_format($agent['total_cost'], 2),
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
