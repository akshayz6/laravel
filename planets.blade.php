

<!DOCTYPE html>
<html>
<head>
    <title>Planets List</title>
</head>
<body>
    <h1>Planets</h1>
    <ul>
        @foreach ($planets as $planet)
            <li>
                <h2>{{ $planet['name'] }}</h2>
                <p>{{ $planet['description'] }}</p>
            </li>
        @endforeach
    </ul>
</body>
</html>


<!DOCTYPE html>
<html>
<head>
    <title>Planets List</title>
</head>
<body>
    <h1>Planets</h1>
    <ul>
        @forelse ($planets as $planet)
            <li>
                <h2>{{ $planet['name'] }}</h2>
                <p>{{ $planet['description'] }}</p>
            </li>
        @empty
            <li>No planets found.</li>
        @endforelse
    </ul>
</body>
</html>






<!DOCTYPE html>
<html>
<head>
    <title>{{ $planet['name'] }} Details</title>
</head>
<body>
    <h1>{{ $planet['name'] }}</h1>
    <p>{{ $planet['description'] }}</p>
    <p><a href="{{ url('/planets') }}">Back to planets list</a></p>
</body>
</html>
