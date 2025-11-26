<?php

namespace App\Http\Controllers;

use App\Mail\NewsletterMail;
use App\Models\Subscriber;
use App\Models\Video;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\TwitterCard;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Jorenvh\Share\ShareFacade;
use Str;

class VideoController extends Controller
{
    public function index () {
        return view("videos", ["videos" => Video::latest()->limit(12)->get()]);
    }

    public function admin_videos () {
        return view("pages.admin.videos", ["videos" => Video::latest()->get()]);
    }

    public function create () {
        return view("pages.admin.addVideo");
    }

    public function show (Video $video) {

        $url = route('video.show', $video->slug);

        $sharedButtons = ShareFacade::page($url, $video->title)->facebook()->twitter()->linkedin()->whatsapp()->telegram();

        SEOMeta::setTitle($video->title);
        SEOMeta::setDescription(Str::limit(strip_tags($video->descrption), 160));
        SEOMeta::setCanonical($url);

        OpenGraph::setTitle($video->title)->setDescription(Str::limit(strip_tags($video->descrption), 160))->setUrl($url)->addImage(asset("storage/uploads/" . $video->image));

        TwitterCard::setTitle($video->title)->setDescription(Str::limit(strip_tags($video->descrption), 160))->setImage(asset("storage/uploads/" . $video->image));

        return view("pages.video", compact("video", "sharedButtons"));
    }

    public function store (Request $request) {

        $imgName = Carbon::now()->timestamp . 'lumiere.' . $request->file('cover_video')->extension();
        $path = $request->file( "cover_video")->storeAs('videos/covers', $imgName, 'public');

        $audioName = Carbon::now()->timestamp . 'lumiere.' . $request->file('video_name')->getClientOriginalName();

        $path = $request->file("video_name")->storeAs('videos', $audioName, 'public');

        Video::create([
            "title" => $request->title,
            "author" => $request->author,
            "cover_video" => $imgName,
            "video_name" => $audioName,
            "description" => $request->description
        ]);

        $subscribers = Subscriber::all();

        foreach ($subscribers as $subscriber) {
            Mail::to($subscriber->email)
                ->send(new NewsletterMail($request->title, $request->description));
        }
        return redirect()->route("admin.videos");
    }

    public function front() {
        return view("pages.videos",["videos" => Video::latest()->paginate(12)] );
    }

    public function delete(int $id)
    {
        Video::destroy($id);
        return redirect()->back();
    }
}
