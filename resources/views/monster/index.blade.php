<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monster Index</title>
</head>
<body>
    <h1>Monster Index</h1>

    @foreach ($monsters as $monster)
        <h2>{{ $monster->name }}</h2>
        <p>{{ $monster->description }}</p>
    @endforeach
</body>
</html>