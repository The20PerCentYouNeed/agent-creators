<x-filament-panels::page>
    @php
        $costData = $this->getCostData();
        $agentPerformance = $this->getAgentPerformance();
    @endphp

    {{-- Cost Summary Cards --}}
    <div class="mb-6">
        <x-filament::section>
            <x-slot name="heading">
                <div class="flex items-center gap-2">
                    <x-filament::icon icon="heroicon-o-currency-dollar" class="h-5 w-5" />
                    <span>Cost Analysis Summary</span>
                </div>
            </x-slot>

            <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
                <div class="rounded-lg bg-white p-6 shadow dark:bg-gray-800">
                    <div class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Cost</div>
                    <div class="mt-2 text-3xl font-bold text-gray-900 dark:text-white">
                        ${{ number_format($costData['total_cost'], 2) }}
                    </div>
                    <div class="mt-1 text-xs text-gray-500">
                        {{ number_format($costData['total_requests']) }} requests
                    </div>
                </div>

                <div class="rounded-lg bg-white p-6 shadow dark:bg-gray-800">
                    <div class="text-sm font-medium text-gray-500 dark:text-gray-400">Cost per Request</div>
                    <div class="mt-2 text-3xl font-bold text-gray-900 dark:text-white">
                        ${{ number_format($costData['cost_per_request'], 4) }}
                    </div>
                    <div class="mt-1 text-xs text-gray-500">
                        Average across all agents
                    </div>
                </div>

                <div class="rounded-lg bg-white p-6 shadow dark:bg-gray-800">
                    <div class="text-sm font-medium text-gray-500 dark:text-gray-400">Daily Average</div>
                    <div class="mt-2 text-3xl font-bold text-gray-900 dark:text-white">
                        ${{ number_format($costData['total_cost'] / max(1, $costData['daily_costs']->count()), 2) }}
                    </div>
                    <div class="mt-1 text-xs text-gray-500">
                        Per day average cost
                    </div>
                </div>
            </div>
        </x-filament::section>
    </div>

    {{-- Charts Grid - 2 Columns --}}
    <div class="mb-6 grid grid-cols-1 gap-6 md:grid-cols-2">
        {{-- Left Column --}}
        <div class="space-y-6">
            @livewire(\App\Filament\Widgets\CostTrendChart::class)
            @livewire(\App\Filament\Widgets\PeakHoursChart::class)
            @livewire(\App\Filament\Widgets\SentimentDistributionChart::class)
        </div>

        {{-- Right Column --}}
        <div class="space-y-6">
            @livewire(\App\Filament\Widgets\CostByAgentChart::class)
            @livewire(\App\Filament\Widgets\IntentDistributionChart::class)
        </div>
    </div>

    {{-- Agent Performance Table --}}
    <div class="mb-6">
        <x-filament::section>
            <x-slot name="heading">
                <div class="flex items-center gap-2">
                    <x-filament::icon icon="heroicon-o-chart-bar-square" class="h-5 w-5" />
                    <span>Agent Performance Comparison</span>
                </div>
            </x-slot>

            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="border-b border-gray-200 dark:border-gray-700">
                        <tr>
                            <th class="px-4 py-3 text-xs font-medium uppercase text-gray-500">Agent</th>
                            <th class="px-4 py-3 text-xs font-medium uppercase text-gray-500">Type</th>
                            <th class="px-4 py-3 text-xs font-medium uppercase text-gray-500 text-right">Requests</th>
                            <th class="px-4 py-3 text-xs font-medium uppercase text-gray-500 text-right">Success Rate</th>
                            <th class="px-4 py-3 text-xs font-medium uppercase text-gray-500 text-right">Avg Response</th>
                            <th class="px-4 py-3 text-xs font-medium uppercase text-gray-500 text-right">Total Cost</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach($agentPerformance as $agent)
                        <tr class="">
                            <td class="px-4 py-3 font-medium">{{ $agent['name'] }}</td>
                            <td class="px-4 py-3">
                                <span class="rounded-full bg-blue-100 px-2 py-1 text-xs font-medium text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                                    {{ ucwords(str_replace('_', ' ', $agent['type'])) }}
                                </span>
                            </td>
                            <td class="px-4 py-3 text-right">{{ number_format($agent['total_requests']) }}</td>
                            <td class="px-4 py-3 text-right">
                                <span class="font-semibold {{ $agent['success_rate'] >= 95 ? 'text-green-600' : ($agent['success_rate'] >= 85 ? 'text-yellow-600' : 'text-red-600') }}">
                                    {{ $agent['success_rate'] }}%
                                </span>
                            </td>
                            <td class="px-4 py-3 text-right">{{ $agent['avg_response_time'] }}ms</td>
                            <td class="px-4 py-3 text-right font-medium">${{ number_format($agent['total_cost'], 2) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </x-filament::section>
    </div>

    {{-- Export Section --}}
    <div class="mb-6">
        <x-filament::section>
            <x-slot name="heading">
                <div class="flex items-center gap-2">
                    <x-filament::icon icon="heroicon-o-arrow-down-tray" class="h-5 w-5" />
                    <span>Export Data</span>
                </div>
            </x-slot>

            <div class="flex gap-4">
                <x-filament::button
                    wire:click="exportCsv"
                    icon="heroicon-o-arrow-down-tray"
                    color="success"
                >
                    Export to CSV
                </x-filament::button>

                <x-filament::button
                    icon="heroicon-o-document-text"
                    color="info"
                    disabled
                >
                    Export to PDF (Coming Soon)
                </x-filament::button>
            </div>
        </x-filament::section>
    </div>
</x-filament-panels::page>
