<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(): JsonResponse
    {
        $books = Book::all();
        return response()->json($books);
    }

    public function show($id): JsonResponse
    {
        $book = Book::findOrFail($id);
        return response()->json($book);
    }

    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'published_year' => 'required|integer|min:1000|max:' . date('Y'),
            'genre' => 'required|string|max:255',
            'is_available' => 'required|boolean'
        ]);
        $book = Book::create($request->all());
        return response()->json($book, 201);
    }

    public function update(Request $request, $id): JsonResponse
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'published_year' => 'required|integer|min:1000|max:' . date('Y'),
            'genre' => 'required|string|max:255',
            'is_available' => 'required|boolean'
        ]);
        $book = Book::findOrFail($id);
        $book->update($request->all());
        return response()->json($book);
    }

    public function destroy($id): JsonResponse
    {
        $book = Book::findOrFail($id);
        $book->delete();
        Book::reindexIds();
        return response()->json(['message' => 'Книга удалена']);
    }
}