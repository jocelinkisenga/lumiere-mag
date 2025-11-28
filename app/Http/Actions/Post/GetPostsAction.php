<?php

declare(strict_types=1);

namespace App\Http\Actions\Post;

use App\Models\Post;

class GetPostsAction
{
    public function handler()
    {
        return Post::orderBy("created_at", "desc")->paginate(12);
    }
}
