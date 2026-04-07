<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Monster</title>
</head>
<body>
    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h1>Create Monster</h1>

    <a href="{{ route('monsters.index') }}">Back</a><br><br>

    <form action="{{ route('monsters.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" id="image" name="image"><br><br>

        <label for="name">Name: *</label>
        <input type="text" id="name" name="name"><br><br>

        <label for="description">Description:</label><br>
        <textarea id="description" name="description" rows="4" cols="50"></textarea><br><br>

        <input type="submit" value="Create Monster">
    </form>
</body>
</html>