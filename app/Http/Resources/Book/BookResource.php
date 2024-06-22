<?php

namespace App\Http\Resources\Book;

use App\Http\Resources\Category\CategoryResource;
use App\Http\Resources\Category\TagResource;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'content' => $this->content,
            'main_content' => $this->main_content,
            'image_url' => $this->imageUrl,
            'is_published' => $this->is_published,
            'category' => new CategoryResource($this->category),
            'tag' => new TagResource($this->tag),
        ];
    }
}
