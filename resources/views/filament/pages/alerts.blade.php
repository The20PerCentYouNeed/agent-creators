<x-filament-panels::page>
    <div class="space-y-6">
        <x-filament::section>
            <x-slot name="heading">
                Recent Errors & Alerts
            </x-slot>
            <x-slot name="description">
                Monitor your agent performance issues and errors.
            </x-slot>

            @php
                $errors = \App\Models\AgentInteraction::whereIn('status', ['error', 'timeout'])
                    ->with('agent')
                    ->latest()
                    ->limit(10)
                    ->get();
            @endphp

            @if($errors->count() > 0)
                <div class="space-y-4">
                    @foreach($errors as $error)
                        <div class="rounded-lg border border-red-200 bg-red-50 p-4">
                            <div class="flex items-start gap-3">
                                <x-filament::icon
                                    icon="heroicon-o-exclamation-triangle"
                                    class="h-5 w-5 text-red-600 mt-0.5"
                                />
                                <div class="flex-1">
                                    <h4 class="text-sm font-medium text-red-900">
                                        {{ $error->agent->name }}
                                    </h4>
                                    <p class="mt-1 text-sm text-red-700">
                                        {{ $error->error_message ?? 'Unknown error' }}
                                    </p>
                                    <p class="mt-1 text-xs text-red-600">
                                        {{ $error->created_at->diffForHumans() }}
                                    </p>
                                </div>
                                <span class="rounded-full bg-red-100 px-2 py-1 text-xs font-medium text-red-800">
                                    {{ $error->status }}
                                </span>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-12">
                    <x-filament::icon
                        icon="heroicon-o-check-circle"
                        class="mx-auto h-12 w-12 text-green-400"
                    />
                    <p class="mt-4 text-sm text-gray-500">
                        No errors or alerts at this time. Everything is running smoothly! 🎉
                    </p>
                </div>
            @endif
        </x-filament::section>
    </div>
</x-filament-panels::page>
