<?php

declare(strict_types=1);

namespace App\Services;

use App\Http\Actions\LatestPostsActions;
use App\Http\Actions\PopularPostsAction;
use App\Http\Actions\RecentPostsAction;
use App\Http\Actions\WeeklyPostsActions;

class MainService
{
    public function __construct(
        public LatestPostsActions $latestPostsActions,
        public  PopularPostsAction $popularPostsAction,
        public RecentPostsAction $recentPostsAction,
        public WeeklyPostsActions  $weeklyPostsActions,
    ) {}
    public function latestPost()
    {
        return $this->latestPostsActions->handler();
    }

    public function popularPosts()
    {
        return $this->popularPostsAction->handler();
    }

    public function recentPosts()
    {
        return $this->recentPostsAction->handler();
    }

    public function recentVideos() {}
    public function recentPodcasts() {}

    public function weeklyPosts()
    {
        return $this->weeklyPostsActions->handler();
    }
}
