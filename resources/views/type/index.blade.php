<x-layouts.app>
    <section class="types-page">
        <header class="monsters-header">
            <div class="monsters-title-group">
                <h1 class="monsters-title">Types</h1>
                <p class="monsters-subtitle">Bekijk de standaardtypes en beheer je eigen custom types.</p>
            </div>

            <a href="{{ route('types.create') }}" class="monsters-add-btn">
                Create Type
            </a>
        </header>

            @if ($types->isEmpty())
                <div class="monsters-empty-state">
                    Er zijn nog geen types beschikbaar.
                </div>
            @else
                <div class="types-grid">
                    @foreach ($types as $type)
                        <article class="type-card" style="background: {{ $type->color ?: '#ffffff' }};">
                            <h2 class="type-card-name">{{ $type->name }}</h2>

                            @if ($type->is_custom)
                                <div class="type-card-actions">
                                    <a href="{{ route('types.edit', $type) }}" class="monster-card-edit-btn">Edit</a>

                                    <form class="monster-card-delete-form" action="{{ route('types.destroy', $type) }}" method="POST" onsubmit="return confirm('Weet je zeker dat je dit type wilt verwijderen?');">
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