<!-- resources/views/components/layoutes/app.blade.php (este captura el sidebar) -->
<x-layouts.app.sidebar :title="$title ?? null">
    <flux:main>
        {{ $slot }}
    </flux:main>
</x-layouts.app.sidebar>
