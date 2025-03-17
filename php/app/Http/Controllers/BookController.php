<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index(Request $request): View
    {
        $sortField = $request->query('sort', 'id'); // По умолчанию сортировка по id
        $sortDirection = $request->query('direction', 'asc'); // По умолчанию по возрастанию

        // Получаем книги с сортировкой
        $books = Book::orderBy($sortField, $sortDirection)->get();

        // Возвращаем представление с данными
        return view('book.index', compact('books', 'sortField', 'sortDirection'));
    }

    public function create()
    {
        return view('book.create'); // Отображение формы
    }

    public function store(Request $request)
    {
        // Валидация данных
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'published_year' => 'required|integer|min:1000|max:' . date('Y'),
            'genre' => 'required|string|max:255',
            'is_available' => 'required|boolean'
        ]);
    
        // Создание книги
        Book::create($request->all());
    
        // Перенаправление на список книг с сообщением
        return redirect('/books')->with('success', 'Книга успешно добавлена!');
    }

    //изменение книги findOrFail=нашло или отмнена
    public function edit($id): View
    {
        $book = Book::findOrFail($id);
        return view('book.edit', ['book' => $book]);
    }

    public function update(Request $request, $id)
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

        return redirect('/books')->with('success', 'Книга успешно обновлена!');
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        Book::reindexIds();

        
        return redirect('/books')->with('success', 'Книга удалена');
    }
    
    
}
