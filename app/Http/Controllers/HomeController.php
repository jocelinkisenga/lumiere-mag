<?php

namespace App\Http\Controllers;


use App\Models\Podcast;
use App\Models\Post;
use App\Models\Video;
use App\Services\MainService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct(public MainService $mainService) {}

    public function index()
    {
        $latestPost = $this->mainService->latestPost();
        $popularPosts = $this->mainService->popularPosts();
        $recentPosts = $this->mainService->recentPosts();
        $weekly = $this->mainService->weeklyPosts();

        $recentVideos = Video::latest()->limit(8)->get();

        $podcasts = Podcast::latest()->limit(3)->get();

        return view(
            "pages.index",
            compact(
                "latestPost",
                "recentVideos",
                "popularPosts",
                "recentPosts",
                "weekly",
                "podcasts"
            )
        );
    }

    public function dashboard()
    {
        $posts = Post::latest()->get();
        $videos = Video::latest()->get();
        return view("dashboard", compact("posts", "videos"));
    }

    public function live()
    {
        return view("pages.live");
    }
}
