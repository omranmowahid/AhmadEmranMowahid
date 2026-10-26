<!DOCTYPE html>
<html>
<head>
    <title>Register a Book</title>
</head>
<body>
    <h1>Register a Book</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    @if (session('success'))
    <p>{{ session('success') }}</p>
    @endif

    <a href="{{ route('books.create') }}">Register a Book</a>

    <form action="{{ route('books.store') }}" method="POST">
        @csrf

        <label>Title:</label>
        <input type="text" name="title"
               value="{{ old('title') }}" required>
        <br><br>

        <label>Author:</label>
        <input type="text" name="author"
               value="{{ old('author') }}" required>
        <br><br>

        <label>Pages:</label>
        <input type="number" name="pages"
               value="{{ old('pages') }}"
               min="1" max="10000" required>
        <br><br>

        <button type="submit">Register Book</button>
    </form>
</body>
</html>