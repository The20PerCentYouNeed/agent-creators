<?php

namespace App\Filament\Pages;

use App\Models\Agent;
use App\Models\AgentInteraction;
use App\Models\AgentMetric;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Pages\Page;

class Analytics extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-chart-bar';

    protected static string $view = 'filament.pages.analytics';

    protected static ?string $navigationLabel = 'Analytics';

    protected static ?int $navigationSort = 4;

    protected static ?string $title = 'Analytics & Reports';

    protected static ?string $description = 'Deep dive into your agent performance metrics';

    protected function getHeaderWidgets(): array
    {
        return [];
    }

    protected function getFooterWidgets(): array
    {
        return [];
    }

    public function getWidgets(): array
    {
        return [];
    }

    public ?string $startDate = null;

    public ?string $endDate = null;

    public ?int $agentId = null;

    public function mount(): void
    {
        $this->startDate = now()->subDays(30)->format('Y-m-d');
        $this->endDate = now()->format('Y-m-d');

        $this->form->fill([
            'start_date' => $this->startDate,
            'end_date' => $this->endDate,
            'agent_id' => $this->agentId,
        ]);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                DatePicker::make('start_date')
                    ->label('Start Date')
                    ->default(now()->subDays(30))
                    ->maxDate(now())
                    ->reactive()
                    ->afterStateUpdated(fn ($state) => $this->startDate = $state),

                DatePicker::make('end_date')
                    ->label('End Date')
                    ->default(now())
                    ->maxDate(now())
                    ->reactive()
                    ->afterStateUpdated(fn ($state) => $this->endDate = $state),

                Select::make('agent_id')
                    ->label('Agent Filter')
                    ->options(fn () => [null => 'All Agents'] + Agent::pluck('name', 'id')->toArray())
                    ->reactive()
                    ->afterStateUpdated(fn ($state) => $this->agentId = $state),
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
