<?php

declare(strict_types=1);

namespace App\Services;

use App\Http\Actions\Post\CreatePostAction;
use App\Http\Actions\Post\CreateTagsAction;
use App\Http\Actions\Post\GetPostsAction;

class PostService
{
    protected $attributes;
    protected $postImage;
    public function __construct(
        public GetPostsAction $getPostsAction,
        public CreatePostAction $createPostAction,
        public CreateTagsAction $createTagsAction
    ) {}
    public function getAllPosts()
    {
        return $this->getPostsAction->handler();
    }

    public function CreatePost($attributes, $postImage)
    {
        return $this->createPostAction->handler($attributes, $postImage);
    }

    public function createTags($post, $tags)
    {
        return $this->createTagsAction->handler($post, $tags);
    }
}
