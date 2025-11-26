<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViewPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'view_post',
        'ip_adress'
    ];

    public function post () {
        return $this->belongsTo(Post::class);
    }
}
