<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $fillable = ["title","video_name","cover_video","author","description","slug"];

    protected static function boot()
    {
        parent::boot();
        static::creating(
            function ($video) {
                $video->slug = \Illuminate\Support\Str::slug($video->title, '-');
            }

        );

        static::updating(
            function ($video) {
                $video->slug = \Illuminate\Support\Str::slug($video->title, '-');
            }

        );
    }

    public function getRouteKey()
    {
        return 'slug';
    }
}
