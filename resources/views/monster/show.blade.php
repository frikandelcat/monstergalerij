<x-layouts.app>
    {{-- KIJK HIER NOG GOED NA --}}
    {{-- Update en Back knoppen moet nog een hover effect hebben --}}
    {{-- Elke keer als je een monster bewerkt wordt de afbeelding weer leeggehaald --}}
    {{-- Als ik Types en Moves wil toevoegen, dan moet ik ook hiervoor views, route en controller maken --}}
    <div class="mx-auto flex w-full max-w-4xl flex-col gap-6">
        <div class="flex flex-col gap-2">
            <h1 class="text-3xl font-semibold tracking-tight text-zinc-900 dark:text-white">{{ $monster->name }}</h1>
            <p class="text-sm text-zinc-600 dark:text-zinc-400">Bekijk de details van dit monster.</p>
        </div>

        <div class="flex flex-wrap items-center gap-3">
            <a href="{{ route('monsters.index') }}" class="monster-back-btn">Back</a>
            <a href="{{ route('monsters.edit', $monster) }}" class="monster-card-edit-btn">Edit</a>
        </div>

        <div class="rounded-xl border border-zinc-200 bg-white p-6 shadow-sm dark:border-zinc-800 dark:bg-zinc-900">
            @if ($monster->image)
                <img src="{{ $monster->image }}" alt="{{ $monster->name }}" class="mb-4 h-40 w-40 rounded-lg object-cover">
            @endif

            <div class="space-y-3 text-zinc-700 dark:text-zinc-300">
                <p><strong>Name:</strong> {{ $monster->name }}</p>
                <p><strong>Description:</strong> {{ $monster->description ?? 'Geen beschrijving' }}</p>
                <p><strong>Types:</strong> {{ $monster->types->pluck('name')->join(', ') ?: 'Geen types' }}</p>
                <p><strong>Moves:</strong> {{ $monster->moves->pluck('name')->join(', ') ?: 'Geen moves' }}</p>
            </div>
        </div>
    </div>
</x-layouts.app>
