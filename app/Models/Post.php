<?php

namespace App\Models;

use App\Models\Author;
use App\Models\Category;
use App\Models\ViewPost;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Str;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ["category_id", "title", "slug", "description", "author_id", "image"];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }
    public function view_posts()
    {
        return $this->hasMany(ViewPost::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class);
    }

    public function getReadingMinutesAttribute()
    {
        $wordPerminutes = 220;
        $cleanContent = strip_tags($this->description);

        $wordCount = str_word_count($cleanContent);

        $minutes = ceil($wordCount / $wordPerminutes);

        return max(1, $minutes);
    }



    protected static function boot()
    {
        parent::boot();
        static::creating(
            function ($post) {
                $post->slug = \Illuminate\Support\Str::slug($post->title, '-');
            }

        );

        static::updating(
            function ($post) {
                $post->slug = \Illuminate\Support\Str::slug($post->title, '-');
            }

        );
    }

    public function getRouteKey()
    {
        return 'slug';
    }
}
