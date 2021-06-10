<div>
    <x-filament::card class="flex">
        <div class="flex items-center space-x-4 rtl:space-x-reverse">
            <x-filament-avatar :user="\Filament\Filament::auth()->user()" :size="160" class="flex-shrink-0 w-20 h-20 rounded-full" />

            <div class="space-y-1">
                <h2 class="text-2xl">{{ __('filament::dashboard.widgets.account.heading', ['name' => \Filament\Filament::auth()->user()->login]) }}</h2>
                <p class="text-sm"><a href="{{ route('filament.account') }}" class="link">{{ __('filament::dashboard.widgets.account.links.account.label') }}</a></p>
            </div>
        </div>
    </x-filament::card>
</div>
