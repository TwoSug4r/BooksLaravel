<?

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Book::all());
    }

    public function show($id): JsonResponse
    {
        return response()->json(Book::findOrFail($id));
    }

    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'published_year' => 'required|integer|min:1000|max:' . date('Y'),
            'genre' => 'required|string|max:255',
            'is_available' => 'required|boolean'
        ]);
        $book = Book::create($data);
        return response()->json($book, 201);
    }

    public function update(Request $request, $id): JsonResponse
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'published_year' => 'required|integer|min:1000|max:' . date('Y'),
            'genre' => 'required|string|max:255',
            'is_available' => 'required|boolean'
        ]);
        $book = Book::findOrFail($id);
        $book->update($data);
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