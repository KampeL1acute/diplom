<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function __invoke() {
        $categories = Category::all();
        $tags = Tag::all();
        return view('book.create', compact('categories', 'tags'));
    }
}
