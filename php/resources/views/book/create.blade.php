<!-- resources/views/books/create.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Добавить книгу</title>
</head>
<body>
    <h1>Добавить новую книгу</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/books" method="POST">
        @csrf
        <div>
            <label for="title">Название:</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}" required>
        </div>
        <div>
            <label for="author">Автор:</label>
            <input type="text" name="author" id="author" value="{{ old('author') }}" required>
        </div>
        <div>
            <label for="published_year">Год публикации:</label>
            <input type="number" name="published_year" id="published_year" value="{{ old('published_year') }}" required>
        </div>
        <div>
            <label for="genre">Жанр:</label>
            <input type="text" name="genre" id="genre" value="{{ old('genre') }}" required>
        </div>
        <div>
            <label for="is_available">Доступна:</label>
            <select name="is_available" id="is_available" required>
                <option value="1" {{ old('is_available') == 1 ? 'selected' : '' }}>Да</option>
                <option value="0" {{ old('is_available') == 0 ? 'selected' : '' }}>Нет</option>
            </select>
        </div>
        <button type="submit">Добавить</button>
    </form>

    <a href="/books">Назад к списку</a>
</body>
</html>