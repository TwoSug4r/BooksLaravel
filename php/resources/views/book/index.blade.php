<!-- resources/views/books/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Books</title>
    <style>
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: center; }
        th { background-color: #f2f2f2; }
        .sort-buttons { margin-bottom: 10px; }
        button { padding: 5px 10px; margin-right: 5px; }
    </style>
</head>
<body>
    <h1>List Books</h1>

    <!-- Вывод сообщения из сессии -->
    @if (session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif
    <a href="/">Главная страница</a><br><br>
    <a href="/books/add">Добавить новую книгу</a>

    <h1>Список книг</h1>

    <table>
        <thead>
            <tr>
                <th>
                    <form method="GET" action="{{ route('book.index') }}" style="display: inline;">
                        <input type="hidden" name="sort" value="id">
                        <input type="hidden" name="direction" value="{{ $sortField == 'id' && $sortDirection == 'asc' ? 'desc' : 'asc' }}">
                        <button type="submit">ID {{ $sortField == 'id' && $sortDirection == 'asc' ? '↓' : '↑' }}</button>
                    </form>
                </th>
                <th>
                    <form method="GET" action="{{ route('book.index') }}" style="display: inline;">
                        <input type="hidden" name="sort" value="title">
                        <input type="hidden" name="direction" value="{{ $sortField == 'title' && $sortDirection == 'asc' ? 'desc' : 'asc' }}">
                        <button type="submit">Названию {{ $sortField == 'title' && $sortDirection == 'asc' ? '↓' : '↑' }}</button>
                    </form>
                </th>
                <th>
                    <form method="GET" action="{{ route('book.index') }}" style="display: inline;">
                        <input type="hidden" name="sort" value="author">
                        <input type="hidden" name="direction" value="{{ $sortField == 'author' && $sortDirection == 'asc' ? 'desc' : 'asc' }}">
                        <button type="submit">Автор {{ $sortField == 'author' && $sortDirection == 'asc' ? '↓' : '↑' }}</button>
                    </form>
                </th>
                <th>
                    <form method="GET" action="{{ route('book.index') }}" style="display: inline;">
                        <input type="hidden" name="sort" value="published_year">
                        <input type="hidden" name="direction" value="{{ $sortField == 'published_year' && $sortDirection == 'asc' ? 'desc' : 'asc' }}">
                        <button type="submit">Год {{ $sortField == 'published_year' && $sortDirection == 'asc' ? '↓' : '↑' }}</button>
                    </form>
                </th>
                <th>
                    <form method="GET" action="{{ route('book.index') }}" style="display: inline;">
                        <input type="hidden" name="sort" value="genre">
                        <input type="hidden" name="direction" value="{{ $sortField == 'genre' && $sortDirection == 'asc' ? 'desc' : 'asc' }}">
                        <button type="submit">Жанр {{ $sortField == 'genre' && $sortDirection == 'asc' ? '↓' : '↑' }}</button>
                    </form>
                </th>
                <th>
                    <form method="GET" action="{{ route('book.index') }}" style="display: inline;">
                        <input type="hidden" name="sort" value="is_available">
                        <input type="hidden" name="direction" value="{{ $sortField == 'is_available' && $sortDirection == 'asc' ? 'desc' : 'asc' }}">
                        <button type="submit">Доступ {{ $sortField == 'is_available' && $sortDirection == 'asc' ? '↓' : '↑' }}</button>
                    </form>
                </th>
                <th>Удаление</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr>
                    <td>{{ $book->id }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author ? $book->author : 'Нет автора' }}</td>
                    <td>{{ $book->published_year }}</td>
                    <td>{{ $book->genre }}</td>
                    <td>{{ $book->is_available ? 'Да' : 'Нет' }}</td>
                    <td><form method="POST" action="/books/{{ $book->id }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Вы уверены, что хотите удалить эту книгу?')">удалить</button>
                    </form></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>