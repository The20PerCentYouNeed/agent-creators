<x-filament-panels::page>
    <form wire:submit="save">
        {{ $this->form }}

        <div class="mt-6 flex gap-3">
            <x-filament::button type="submit" icon="heroicon-o-check-circle">
                Save Settings
            </x-filament::button>

            <x-filament::button type="button" color="gray" wire:click="$refresh">
                Reset
            </x-filament::button>
        </div>
    </form>

    <x-filament-actions::modals />
</x-filament-panels::page>
