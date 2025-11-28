<?php

declare(strict_types=1);

namespace App\Http\Actions\Post;

use App\Models\Post;
use App\Models\Tag;

class CreateTagsAction
{
    public function handler(Post $post, $tags)
    {
        $tags = array_map('trim', explode(',', $tags));
        $tagsId = [];

        foreach ($tags as $tag) {
            if ($tag !== '') {
                $srv = Tag::firstOrCreate(['name' => $tag]);
                $tagsId[] = $srv->id;
            }
        }

        $post->tags()->sync($tagsId);
    }
}
