
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap CSS -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/">
                {{ config('app.name', 'Laravel') }}
            </a>

            <div class="ms-auto d-flex gap-2">
                @auth
                    <a href="{{ url('/dashboard') }}"
                       class="btn btn-outline-light">
                        Dashboard
                    </a>
                @else
                    @if (Route::has('login'))
                        <a href="{{ route('login') }}"
                           class="btn btn-outline-light">
                            Log in
                        </a>
                    @endif

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                           class="btn btn-primary">
                            Register
                        </a>
                    @endif
                @endauth
            </div>
        </div>
    </nav>

    <main class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div class="card border-0 shadow-sm">
                    <div class="card-body text-center p-5">

                        <h1 class="display-5 fw-bold mb-3">
                            Welcome to Laravel
                        </h1>

                        <p class="lead text-secondary mb-4">
                            Build, learn, and manage your applications
                            with Laravel.
                        </p>

                        <div class="d-flex flex-column flex-sm-row
                                    justify-content-center gap-3">

                            @auth
                                <a href="{{ url('/dashboard') }}"
                                   class="btn btn-primary btn-lg">
                                    Go to Dashboard
                                </a>
                            @else
                                <a href="{{ route('login') }}"
                                   class="btn btn-primary btn-lg">
                                    Get Started
                                </a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}"
                                       class="btn btn-outline-secondary btn-lg">
                                        Create Account
                                    </a>
                                @endif
                            @endauth

                        </div>
                    </div>
                </div>

                <p class="text-center text-muted mt-4">
                    Powered by Laravel and Bootstrap 5.
                </p>

            </div>
        </div>
    </main>

    <!-- Bootstrap JavaScript -->
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    </script>

</body>
</html>
