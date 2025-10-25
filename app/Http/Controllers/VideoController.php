<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Carbon\Carbon;
class VideoController extends Controller
{
    public function index () {
        return view("videos", ["videos" => Video::latest()->limit(12)->get()]);
    }

    public function admin_videos () {
        return view("admin.videos", ["videos" => Video::latest()->get()]);
    }

    public function create () {
        return view("admin.addVideo");
    }

    public function show ($title, $id) {
        $video  = Video::findOrFail($id);
        return view("video", compact("video"));
    }

    public function store (Request $request) {

        $imgName = Carbon::now()->timestamp . 'lumiere.' . $request->file('cover_video')->extension();
        $path = $request->file("cover")->storeAs('videos/covers', $imgName, 'public');

        $audioName = Carbon::now()->timestamp . 'lumiere.' . $request->file('video_name')->getClientOriginalName();

        $path = $request->file("video_name")->storeAs('videos', $audioName, 'public');

        Video::create([
            "title" => $request->title,
            "author" => $request->author,
            "cover_video" => $imgName,
            "video_name" => $audioName,
            "description" => $request->description
        ]);

        return redirect()->route("video.admin");
    }
}
