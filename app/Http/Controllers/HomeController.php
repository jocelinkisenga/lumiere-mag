<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\Post;
use App\Models\Video;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index() {
        $latestPost = Post::latest()->first();
        $popularPosts = Post::latest()->inRandomOrder()->limit(3)->get();
        $recentPosts = Post::latest()->limit(4)->get();
        $recentCoupons = Coupon::latest()->limit(8)->get();
        $popularCoupons = Coupon::latest()->first();
        $recentVideos = Video::latest()->limit(8)->get();
        $weekly = $this->weekly();

        return view("pages.index",compact("latestPost",
                                         "popularPosts",
                                         "recentPosts",
                                         "recentCoupons",
                                         "popularCoupons",
                                         "recentVideos",
                                        "weekly"));
    }

    public function dashboard()  {
        $posts = Post::latest()->get();
        $coupons = Coupon::latest()->get();
        $videos = Video::latest()->get();
        return view("dashboard",compact("coupons","posts","videos"));
    }

    public function live(){
        return view("pages.live");
    }

    private function weekly() {
        $now  =  Carbon::now();
        $start = $now->startOfWeek()->format('Y-m-d H:i:s');
        $end = $now->endOfWeek()->format('Y-m-d H:i:s');
        return Post::whereBetween('created_at',[$start,$end])->inRandomOrder()->limit(6)->get();
    }
}
