<x-layouts.app>
    <section class="types-page">
        <header class="monsters-header">
            <div class="monsters-title-group">
                <h1 class="monsters-title">Moves</h1>
                <p class="monsters-subtitle">Bekijk de standaardmoves en beheer je eigen custom moves.</p>
            </div>

            <a href="{{ route('moves.create') }}" class="monsters-add-btn">
                Create Move
            </a>
        </header>

        @if ($moves->isEmpty())
            <div class="monsters-empty-state">
                Er zijn nog geen moves beschikbaar.
            </div>
        @else
            <div class="types-grid">
                @foreach ($moves as $move)
                    <article class="type-card" style="background: {{ $move->type?->color ?: '#ffffff' }};">
                        <h2 class="type-card-name">{{ $move->name }}</h2>

                        <div class="move-card-meta">
                            <span class="move-type-pill">{{ $move->type?->name ?? 'No type' }}</span>

                            @if ($move->description)
                                <p class="move-card-description">{{ $move->description }}</p>
                            @endif
                        </div>

                        @if ($move->is_custom)
                            <div class="type-card-actions">
                                <a href="{{ route('moves.edit', $move) }}" class="monster-card-edit-btn">Edit</a>

                                <form class="monster-card-delete-form" action="{{ route('moves.destroy', $move) }}" method="POST" onsubmit="return confirm('Weet je zeker dat je deze move wilt verwijderen?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="monster-card-delete-btn">Delete</button>
                                </form>
                            </div>
                        @endif
                    </article>
                @endforeach
            </div>
        @endif
    </section>
</x-layouts.app>