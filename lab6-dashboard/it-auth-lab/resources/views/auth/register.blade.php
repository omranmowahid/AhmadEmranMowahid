
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
</head>
<body>

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

    <h1>Create an account</h1>
    <form method="POST" action="{{ route('register.store') }}">
        @csrf
        <label for="name">Full name</label>
        <input id="name" name="name" type="text" value="{{ old('name') }}" required>
        <!-- TODO: add email, password, password_confirmation -->
        <label for="email">Email</label>
        <input id="email" name="email" type="email" value="{{ old('email') }}" required>

        <label for="password">Password</label>
        <input id="password" name="password" type="password" minlength="8" required>

        <label for="password_confirmation">Confirm Password</label>
        <input id="password_confirmation" name="password_confirmation" type="password" minlength="8" required>
        
        <button type="submit">Register</button>
    </form>
    
    <a href="{{ route('login') }}">Already have an account?</a>
</body>
</html>
