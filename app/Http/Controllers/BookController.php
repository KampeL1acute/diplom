<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use PHPUnit\Framework\TestStatus\Notice;

class BookController extends Controller
{
    public function show($id)
    {
        $book = Book::find($id);
        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }
        $img=$book->getImageUrlAttribute();
        $book->image_url=$img;
        log::Notice("show", ['$book'=>$book]);
        return response()->json($book);
    }
}