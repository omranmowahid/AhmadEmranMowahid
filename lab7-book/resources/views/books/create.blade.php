
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Books Dashboard</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>
<body class="bg-light">

    <div class="container py-5">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h2">Books Dashboard</h1>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-outline-danger">
                    Logout
                </button>
            </form>
        </div>

        {{-- Success message --}}
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- Register a book --}}
        <div class="card shadow-sm mb-5">
            <div class="card-header">
                <h2 class="h5 mb-0">Register a Book</h2>
            </div>

            <div class="card-body">
                <form action="{{ route('books.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="title" class="form-label">
                            Title
                        </label>

                        <input
                            type="text"
                            id="title"
                            name="title"
                            class="form-control @error('title') is-invalid @enderror"
                            value="{{ old('title') }}"
                            maxlength="150"
                            required
                        >

                        @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="author" class="form-label">
                            Author
                        </label>

                        <input
                            type="text"
                            id="author"
                            name="author"
                            class="form-control @error('author') is-invalid @enderror"
                            value="{{ old('author') }}"
                            maxlength="100"
                            required
                        >

                        @error('author')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="pages" class="form-label">
                            Pages
                        </label>

                        <input
                            type="number"
                            id="pages"
                            name="pages"
                            class="form-control @error('pages') is-invalid @enderror"
                            value="{{ old('pages') }}"
                            min="1"
                            max="10000"
                            step="1"
                            required
                        >

                        @error('pages')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">
                        Register Book
                    </button>
                </form>
            </div>
        </div>

        {{-- My Books table --}}
        <div class="card shadow-sm">
            <div class="card-header">
                <h2 class="h5 mb-0">My Books</h2>
            </div>

            <div class="card-body">

                @if ($books->isEmpty())
                    <p class="text-muted mb-0">
                        You have not registered any books yet.
                    </p>
                @else
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered
                                      table-hover align-middle mb-0">

                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Author</th>
                                    <th scope="col">Pages</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($books as $book)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $book->title }}</td>
                                        <td>{{ $book->author }}</td>
                                        <td>{{ $book->pages }}</td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                @endif

            </div>
        </div>

    </div>

</body>
</html>
