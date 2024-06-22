<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Log;

class SearchController extends Controller
{
    public function main()
    {
        $books =Book::all();
        return view('main',compact('posts'));
    }

    public function search(Request $request){

        log::notice("test", ["request", $request]);

        $search = $request->input('query'); // Получаем значение поискового запроса
        log::notice("logtest1", ["search", $search]);

        $books =Book::where(function($query) use ($search){

            $query->where('title','like',"%$search%")
            ->orWhere('description','like',"%$search%");

            })
            ->orWhereHas('category',function($query) use($search){
                $query->where('title','like',"%$search%");
            })
            ->orWhereHas('tag',function($query) use ($search){
                $query->where('title','like',"%$search%");
            })
            ->get();

            foreach($books as $book){
                $img=$book->getImageUrlAttribute();
                $book->image_url=$img;
            }
            log::notice("logtest", ["books", $books]);
            //return view('main',compact('books','search'));
            return $books;

    }
}