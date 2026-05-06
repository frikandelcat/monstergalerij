<x-layouts.app>
    <div class="mx-auto flex w-full max-w-4xl flex-col gap-6">
        <div class="flex flex-col gap-2">
            <h1 class="text-3xl font-semibold tracking-tight text-zinc-900 dark:text-white">Create Move</h1>
            <p class="text-sm text-zinc-600 dark:text-zinc-400">Voeg een nieuw custom move toe.</p>
        </div>

        <a href="{{ route('moves.index') }}" class="monster-back-btn">Back</a>

        @if ($errors->any())
            <div class="rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-700 dark:border-red-900 dark:bg-red-950/30 dark:text-red-200">
                <ul class="list-inside list-disc space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('moves.store') }}" method="POST" class="grid gap-5 rounded-2xl border border-zinc-200 bg-white p-6 shadow-sm dark:border-zinc-800 dark:bg-zinc-900 md:grid-cols-2">
            @csrf

            <div>
                <label for="name" class="mb-2 block text-sm font-medium text-zinc-700 dark:text-zinc-300">Name *</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required class="w-full rounded-lg border border-zinc-300 bg-white px-3 py-2 text-zinc-900 outline-none ring-0 transition placeholder:text-zinc-400 focus:border-zinc-900 dark:border-zinc-700 dark:bg-zinc-950 dark:text-white dark:focus:border-white">
            </div>

            <div>
                <label for="type_id" class="mb-2 block text-sm font-medium text-zinc-700 dark:text-zinc-300">Type *</label>
                <select id="type_id" name="type_id" required class="w-full rounded-lg border border-zinc-300 bg-white px-3 py-2 text-zinc-900 dark:border-zinc-700 dark:bg-zinc-950 dark:text-white">
                    <option value="">Kies een type</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}" @selected(old('type_id') == $type->id)>
                            {{ $type->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="power" class="mb-2 block text-sm font-medium text-zinc-700 dark:text-zinc-300">Power</label>
                <input type="number" id="power" name="power" value="{{ old('power') }}" min="5" max="300" step="5" class="w-full rounded-lg border border-zinc-300 bg-white px-3 py-2 text-zinc-900 outline-none ring-0 transition placeholder:text-zinc-400 focus:border-zinc-900 dark:border-zinc-700 dark:bg-zinc-950 dark:text-white dark:focus:border-white">
            </div>

            <div>
                <label for="accuracy" class="mb-2 block text-sm font-medium text-zinc-700 dark:text-zinc-300">Accuracy</label>
                <input type="number" id="accuracy" name="accuracy" value="{{ old('accuracy') }}" min="5" max="100" step="5" class="w-full rounded-lg border border-zinc-300 bg-white px-3 py-2 text-zinc-900 outline-none ring-0 transition placeholder:text-zinc-400 focus:border-zinc-900 dark:border-zinc-700 dark:bg-zinc-950 dark:text-white dark:focus:border-white">
            </div>

            <div>
                <label for="move_class" class="mb-2 block text-sm font-medium text-zinc-700 dark:text-zinc-300">Move Class</label>
                <select id="move_class" name="move_class" class="w-full rounded-lg border border-zinc-300 bg-white px-3 py-2 text-zinc-900 dark:border-zinc-700 dark:bg-zinc-950 dark:text-white">
                    <option value="">Kies een move class</option>
                    <option value="physical" @selected(old('move_class') === 'physical')>physical</option>
                    <option value="special" @selected(old('move_class') === 'special')>special</option>
                    <option value="support" @selected(old('move_class') === 'support')>support</option>
                </select>
            </div>

            <div>
                <label for="pp" class="mb-2 block text-sm font-medium text-zinc-700 dark:text-zinc-300">PP</label>
                <input type="number" id="pp" name="pp" value="{{ old('pp') }}" min="5" max="40" step="5" class="w-full rounded-lg border border-zinc-300 bg-white px-3 py-2 text-zinc-900 outline-none ring-0 transition placeholder:text-zinc-400 focus:border-zinc-900 dark:border-zinc-700 dark:bg-zinc-950 dark:text-white dark:focus:border-white">
            </div>

            <div class="md:col-span-2">
                <label for="description" class="mb-2 block text-sm font-medium text-zinc-700 dark:text-zinc-300">Description</label>
                <textarea id="description" name="description" rows="5" class="w-full rounded-lg border border-zinc-300 bg-white px-3 py-2 text-zinc-900 outline-none transition placeholder:text-zinc-400 focus:border-zinc-900 dark:border-zinc-700 dark:bg-zinc-950 dark:text-white dark:focus:border-white">{{ old('description') }}</textarea>
            </div>

            <div class="md:col-span-2">
                <button type="submit" class="monster-update-btn">Create Move</button>
            </div>
        </form>
    </div>
</x-layouts.app>