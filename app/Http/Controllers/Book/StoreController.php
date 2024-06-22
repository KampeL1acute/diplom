<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use App\Http\Requests\Book\StoreRequest;
use App\Models\Book;
use App\Models\CategoryBook;
use App\Models\Tag;
use App\Models\TagBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request) {
        log::notice("1 request", ["request"=>$request]);
        $data = $request->validated();
        log::notice("2 data", ["data"=>$data]);
        $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
        $categoriesIds = $data['categories'] ?? [];
        $tagsIds = $data['tags'] ?? [];
        unset($data['categories'], $data['tags']);

        $book = Book::firstOrCreate([
            'title' => $data['title']
        ], $data);

        foreach ($categoriesIds as $categoriesId) {
            CategoryBook::firstOrCreate([
                'book_id' => $book->id,
                'category_id' => $categoriesId,
            ]);
        };

        log::notice("logtag", ["tags"=>$tagsIds]);
        foreach ($tagsIds as $tagsId) {
            TagBook::firstOrCreate([
                'book_id' => $book->id,
                'tag_id' => $tagsId,
            ]);
        };

        return redirect()->route('book.index');
    }
}
