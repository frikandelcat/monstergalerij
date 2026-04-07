<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monster Index</title>
</head>
<body>
    <h1>Monster Index</h1>

    <a href="{{ route('monsters.create') }}">Add Monster</a><br><br>

    @foreach ($monsters as $monster)
        <img src="{{ $monster->image }}" alt="{{ $monster->name }}" width="200"><br>
        <h2>{{ $monster->name }}</h2>
        <p>{{ $monster->description }}</p>
        <a href="{{ route('monsters.edit', $monster) }}">Edit</a>
        <form action="{{ route('monsters.destroy', $monster) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form><br><br><br>
    @endforeach
</body>
</html>