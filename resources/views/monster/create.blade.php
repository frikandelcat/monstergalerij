<x-layouts.app>
    <div class="mx-auto flex w-full max-w-4xl flex-col gap-6">
        <div class="flex flex-col gap-2">
            <h1 class="text-3xl font-semibold tracking-tight text-zinc-900 dark:text-white">Create Monster</h1>
            <p class="text-sm text-zinc-600 dark:text-zinc-400">Voeg een nieuw monster toe binnen dezelfde dashboard-ervaring.</p>
        </div>

        <a href="{{ route('monsters.index') }}" class="monster-back-btn">Back</a>

        @if ($errors->any())
            <div class="rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-700 dark:border-red-900 dark:bg-red-950/30 dark:text-red-200">
                <ul class="list-inside list-disc space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('monsters.store') }}" method="POST" enctype="multipart/form-data" class="grid gap-5 rounded-2xl border border-zinc-200 bg-white p-6 shadow-sm dark:border-zinc-800 dark:bg-zinc-900 md:grid-cols-2">
            @csrf

            <div class="md:col-span-2">
                <label for="image" class="mb-2 block text-sm font-medium text-zinc-700 dark:text-zinc-300">Image</label>
                <input type="file" id="image" name="image" class="block w-full rounded-lg border border-zinc-300 bg-white text-sm text-zinc-700 file:mr-4 file:border-0 file:bg-zinc-900 file:px-4 file:py-2 file:text-sm file:font-medium file:text-white hover:file:bg-zinc-700 dark:border-zinc-700 dark:bg-zinc-950 dark:text-zinc-300 dark:file:bg-white dark:file:text-zinc-900">
            </div>

            <div>
                <label for="name" class="mb-2 block text-sm font-medium text-zinc-700 dark:text-zinc-300">Name *</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required class="w-full rounded-lg border border-zinc-300 bg-white px-3 py-2 text-zinc-900 outline-none ring-0 transition placeholder:text-zinc-400 focus:border-zinc-900 dark:border-zinc-700 dark:bg-zinc-950 dark:text-white dark:focus:border-white">
            </div>

            <div>
                <label for="primary_type_id" class="mb-2 block text-sm font-medium text-zinc-700 dark:text-zinc-300">Type</label>
                <select id="primary_type_id" name="primary_type_id" class="w-full rounded-lg border border-zinc-300 bg-white px-3 py-2 text-zinc-900 dark:border-zinc-700 dark:bg-zinc-950 dark:text-white">
                    <option value="">Kies een type</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}" @selected(old('primary_type_id') == $type->id)>
                            {{ $type->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="secondary_type_id" class="mb-2 block text-sm font-medium text-zinc-700 dark:text-zinc-300">Secundaire type</label>
                <select id="secondary_type_id" name="secondary_type_id" class="w-full rounded-lg border border-zinc-300 bg-white px-3 py-2 text-zinc-900 dark:border-zinc-700 dark:bg-zinc-950 dark:text-white">
                    <option value="">Geen</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}" @selected(old('secondary_type_id') == $type->id)>
                            {{ $type->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="move_1_id" class="mb-2 block text-sm font-medium text-zinc-700 dark:text-zinc-300">Move 1</label>
                <select id="move_1_id" name="move_1_id" class="w-full rounded-lg border border-zinc-300 bg-white px-3 py-2 text-zinc-900 dark:border-zinc-700 dark:bg-zinc-950 dark:text-white">
                    <option value="">Geen</option>
                    @foreach ($moves as $move)
                        <option value="{{ $move->id }}" @selected(old('move_1_id') == $move->id)>
                            {{ $move->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="move_2_id" class="mb-2 block text-sm font-medium text-zinc-700 dark:text-zinc-300">Move 2</label>
                <select id="move_2_id" name="move_2_id" class="w-full rounded-lg border border-zinc-300 bg-white px-3 py-2 text-zinc-900 dark:border-zinc-700 dark:bg-zinc-950 dark:text-white">
                    <option value="">Geen</option>
                    @foreach ($moves as $move)
                        <option value="{{ $move->id }}" @selected(old('move_2_id') == $move->id)>
                            {{ $move->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="move_3_id" class="mb-2 block text-sm font-medium text-zinc-700 dark:text-zinc-300">Move 3</label>
                <select id="move_3_id" name="move_3_id" class="w-full rounded-lg border border-zinc-300 bg-white px-3 py-2 text-zinc-900 dark:border-zinc-700 dark:bg-zinc-950 dark:text-white">
                    <option value="">Geen</option>
                    @foreach ($moves as $move)
                        <option value="{{ $move->id }}" @selected(old('move_3_id') == $move->id)>
                            {{ $move->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="move_4_id" class="mb-2 block text-sm font-medium text-zinc-700 dark:text-zinc-300">Move 4</label>
                <select id="move_4_id" name="move_4_id" class="w-full rounded-lg border border-zinc-300 bg-white px-3 py-2 text-zinc-900 dark:border-zinc-700 dark:bg-zinc-950 dark:text-white">
                    <option value="">Geen</option>
                    @foreach ($moves as $move)
                        <option value="{{ $move->id }}" @selected(old('move_4_id') == $move->id)>
                            {{ $move->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="md:col-span-2">
                <label for="description" class="mb-2 block text-sm font-medium text-zinc-700 dark:text-zinc-300">Description</label>
                <textarea id="description" name="description" rows="5" class="w-full rounded-lg border border-zinc-300 bg-white px-3 py-2 text-zinc-900 outline-none transition placeholder:text-zinc-400 focus:border-zinc-900 dark:border-zinc-700 dark:bg-zinc-950 dark:text-white dark:focus:border-white">{{ old('description') }}</textarea>
            </div>

            <div class="md:col-span-2">
                <button type="submit" class="monster-update-btn">Create Monster</button>
            </div>
        </form>
    </div>
</x-layouts.app>