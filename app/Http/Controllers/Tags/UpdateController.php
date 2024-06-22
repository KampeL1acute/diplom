<?php

namespace App\Http\Controllers\Tags;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tag\UpdateRequest as TagUpdateRequest;
use App\Http\Requests\Tags\UpdateRequest;
use App\Models\Tag;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(TagUpdateRequest $request, Tag $tag) {
        $data = $request->validated();
        $tag->update($data);

        return view('tag.show', compact('tag'));
    }
}
