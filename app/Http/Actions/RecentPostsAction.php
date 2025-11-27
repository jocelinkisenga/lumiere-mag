<?php

declare(strict_types=1);

namespace App\Http\Actions;

use App\Models\Post;

class RecentPostsAction
{
    public function handler()
    {
        return Post::latest()->limit(4)->get();
    }
}
