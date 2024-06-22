<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';
    protected $guarded = false;

    public function category() 
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function tag() 
    {
        return $this->belongsTo(Tag::class, 'tag_id', 'id');
    }

    public function getImageUrlAttribute() 
    {
        return url( 'storage/' . $this->preview_image );
    }
}
