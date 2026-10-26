<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:150',
            'author' => 'required|string|max:100',
            'pages' => 'required|integer|min:1|max:10000',
        ]);

        $book = new Book($validated);

        $book->user_id = Auth::id();

        $book->save();

        return redirect()
            ->route('dashboard')
            ->with('success', 'Book registered successfully!');
    }
}