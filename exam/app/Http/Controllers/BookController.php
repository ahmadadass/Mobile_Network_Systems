<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with(['author', 'category'])->get();

        return response()->json($books);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'author_id' => ['required', 'integer', 'exists:authors,id'],
            'category_id' => ['required', 'integer', 'exists:categories,id'],
            'published_year' => ['required', 'integer'],
        ]);

        $book = Book::create($validated);

        return response()->json([
            'message' => 'Book created successfully',
            'book' => $book,
        ], 201);
    }

    public function show(Book $book)
    {
        return response()->json(
            $book->load(['author', 'category'])
        );
    }

    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'title' => ['sometimes', 'required', 'string', 'max:255'],
            'author_id' => [
                'sometimes',
                'required',
                'integer',
                'exists:authors,id',
            ],
            'category_id' => [
                'sometimes',
                'required',
                'integer',
                'exists:categories,id',
            ],
            'published_year' => [
                'sometimes',
                'required',
                'integer',
            ],
        ]);

        $book->update($validated);

        return response()->json([
            'message' => 'Book updated successfully',
            'book' => $book->load(['author', 'category']),
        ]);
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return response()->json([
            'message' => 'Book deleted successfully',
        ]);
    }
}
