<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ["category_id","title","slug","description","author","image"];

    public function category() : BelongsTo {
        return $this->belongsTo(Category::class);
    }
public function view_posts () {
   return $this->hasMany(ViewPost::class);
}
}
