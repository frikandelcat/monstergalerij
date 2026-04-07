<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Edit Monster</h1>

    <a href="{{ route('monsters.index') }}">Back</a><br><br>

    <form action="{{ route('monsters.update', $monster->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <input type="file" id="image" name="image"><br><br>

        <label for="name">Name: *</label>
        <input type="text" id="name" name="name" value="{{ $monster->name }}"><br><br>

        <label for="description">Description:</label><br>
        <textarea id="description" name="description" rows="4" cols="50">{{ $monster->description }}</textarea><br><br>

        <input type="submit" value="Update">
    </form>
</body>
</html>