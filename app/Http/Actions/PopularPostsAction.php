<?php

declare(strict_types=1);

namespace App\Http\Actions;

use App\Models\Post;

class PopularPostsAction
{
    public function handler()
    {
        return Post::latest()->inRandomOrder()->limit(3)->get();
    }
}
