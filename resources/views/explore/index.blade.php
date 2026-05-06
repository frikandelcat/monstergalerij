<x-layouts.app>
    @foreach ($users as $user)
        <p>{{ $user->name }}</p><br>
        <a href="{{ route('explore.monsters', $user->id) }}" class="monsters-add-btn">See monsters</a>
    @endforeach
</x-layouts.app>