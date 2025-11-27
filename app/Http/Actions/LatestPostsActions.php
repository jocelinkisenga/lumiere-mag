<?php

declare(strict_types=1);

namespace App\Http\Actions;

use App\Models\Post;

class LatestPostsActions
{
    public function handler()
    {
        return Post::latest()->first();
    }
}
