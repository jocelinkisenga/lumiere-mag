<?php

declare(strict_types=1);

namespace App\Http\Actions\Post;

use App\Models\Post;

class CreatePostAction
{
    public function handler($attributes, $postImage)
    {


        $post = Post::create([
            "category_id" => $attributes->category_id,
            "title" => $attributes->title,

            "image" => $postImage,
            "author_id" => $attributes->author_id,
            "description" => $attributes->description
        ]);

        return $post;
    }
}
