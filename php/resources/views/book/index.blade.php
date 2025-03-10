<!-- resources/views/books/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Books</title>
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

    <ul>
        @foreach ($books as $book)
            <li>
                {{ $book->title }} - {{ $book->author }} - {{ $book->published_year }} - {{ $book->genre }} - {{ $book->is_available }} -- 
                <a href="/books/{{ $book->id }}/edit">Редактировать</a> --
                <form action="/books/{{ $book->id }}" method="POST" style="display:inline;">
                    @csrf
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Вы увепены, что  хотите удалить эту книгу?')">удалить</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>