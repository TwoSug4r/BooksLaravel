<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Book extends Model    
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'published_year',
        'genre',
        'is_available'
    ];

    public static function reindexIds()
    {
        $books = self::orderBy('id')->get();
        if ($books->isEmpty()) {
            DB::statement('ALTER TABLE books AUTO_INCREMENT = 1;');
            return;
        }

        DB::statement('SET @count = 0;');
        DB::statement('UPDATE books SET id = @count:= @count + 1;');
        DB::statement('ALTER TABLE books AUTO_INCREMENT = ' . ($books->count() + 1) . ';');
    }
}