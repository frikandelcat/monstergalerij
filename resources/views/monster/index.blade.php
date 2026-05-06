<x-layouts.app>
    <section class="monsters-page">
        <header class="monsters-header">
            <div class="monsters-title-group">
                <h1 class="monsters-title">Monsters</h1>
                <p class="monsters-subtitle">Bekijk en creeër hier je eigen monsters.</p>
            </div>

            <a href="{{ route('monsters.create') }}" class="monsters-add-btn">
                Add Monster
            </a>
        </header>

        @if ($monsters->isEmpty())
            <div class="monsters-empty-state">
                Je hebt nog geen monsters aangemaakt.
            </div>
        @else
            <div class="monsters-grid">
                @foreach ($monsters as $monster)
                    <article class="monster-card">
                        <a href="{{ route('monsters.show', $monster) }}" class="monster-card-link" aria-label="Bekijk {{ $monster->name }}"></a>

                        <div class="monster-card-media">
                            @if ($monster->image)
                                <img src="{{ $monster->image }}" alt="{{ $monster->name }}" class="monster-card-image">
                            @else
                                <div class="monster-card-image-placeholder">No image</div>
                            @endif
                        </div>

                        <div class="monster-card-body">
                            <div class="monster-card-text">
                                <h2 class="monster-card-name">{{ $monster->name }}</h2>
                                @if ($monster->description)
                                    <p class="monster-card-description">{{ $monster->description }}</p>
                                @endif
                            </div>

                            <div class="monster-card-actions">
                                <a href="{{ route('monsters.edit', $monster) }}" class="monster-card-edit-btn">Edit</a>

                                <form class="monster-card-delete-form" action="{{ route('monsters.destroy', $monster) }}" method="POST" onsubmit="return confirm('Weet je zeker dat je dit monster wilt verwijderen?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="monster-card-delete-btn">Delete</button>
                                </form>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        @endif
    </section>
</x-layouts.app>