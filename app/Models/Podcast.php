<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Podcast extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'cover',
        'audio_file',
        'description',
        'slug'
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(
            function ($podcast) {
                $podcast->slug = \Illuminate\Support\Str::slug($podcast->title, '-');
            }

        );

        static::updating(
            function ($podcast) {
                $podcast->slug = \Illuminate\Support\Str::slug($podcast->title, '-');
            }

        );
    }

    public function getRouteKey()
    {
        return 'slug';
    }
}
