<x-layouts.app>
    <div class="mx-auto flex w-full max-w-4xl flex-col gap-6">
        <div class="flex flex-col gap-2">
            <h1 class="text-3xl font-semibold tracking-tight text-zinc-900 dark:text-white">Create Type</h1>
            <p class="text-sm text-zinc-600 dark:text-zinc-400">Maak hier een nieuw custom type aan.</p>
        </div>

        <a href="{{ route('types.index') }}" class="monster-back-btn">Back</a>

        @if ($errors->any())
            <div class="rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-700 dark:border-red-900 dark:bg-red-950/30 dark:text-red-200">
                <ul class="list-inside list-disc space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('types.store') }}" method="POST" class="grid gap-5 rounded-2xl border border-zinc-200 bg-white p-6 shadow-sm dark:border-zinc-800 dark:bg-zinc-900 md:grid-cols-2">
            @csrf

            <div class="md:col-span-2">
                <label for="name" class="mb-2 block text-sm font-medium text-zinc-700 dark:text-zinc-300">Name *</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required class="w-full rounded-lg border border-zinc-300 bg-white px-3 py-2 text-zinc-900 outline-none ring-0 transition placeholder:text-zinc-400 focus:border-zinc-900 dark:border-zinc-700 dark:bg-zinc-950 dark:text-white dark:focus:border-white">
            </div>

            <div class="md:col-span-2">
                <label for="color" class="mb-2 block text-sm font-medium text-zinc-700 dark:text-zinc-300">Color</label>
                <input type="color" id="color" name="color" value="{{ old('color', '#ffffff') }}" class="type-color-input w-full rounded-lg border border-zinc-300 bg-white px-2 py-2 text-zinc-900 dark:border-zinc-700 dark:bg-zinc-950 dark:text-white">
            </div>

            <div class="md:col-span-2">
                <button type="submit" class="monster-update-btn">Create Type</button>
            </div>
        </form>
    </div>
</x-layouts.app>