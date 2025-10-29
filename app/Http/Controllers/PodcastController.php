<?php

namespace App\Http\Controllers;

use App\Mail\NewsletterMail;
use App\Models\Podcast;
use App\Models\Subscriber;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\TwitterCard;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Jorenvh\Share\ShareFacade;
use Str;

class PodcastController extends Controller
{
    public function index()
    {
        return view("pages.admin.listPodcasts", ["podcasts" => Podcast::latest()->limit(12)->get()]);
    }

    public function show(Podcast $podcast)
    {

        $url = route('podcast.show', $podcast->slug);

        $sharedButtons = ShareFacade::page($url, $podcast->title)->facebook()->twitter()->linkedin()->whatsapp()->telegram();
        SEOMeta::setTitle($podcast->title);
        SEOMeta::setDescription(Str::limit(strip_tags($podcast->descrption), 160));
        SEOMeta::setCanonical($url);

        OpenGraph::setTitle($podcast->title)->setDescription(description: Str::limit(strip_tags($podcast->descrption), 160))->setUrl($url)->addImage(asset("storage/uploads/" . $podcast->image));

        TwitterCard::setTitle($podcast->title)->setDescription(Str::limit(strip_tags($podcast->descrption), 160))->setImage(asset("storage/uploads/" . $podcast->image));

        return view("pages.podcast", compact("podcast", "sharedButtons"));
    }
    public function create()
    {
        return view("pages.admin.addPodcast");
    }

    public function front () {
        return view("pages.podcasts", ["podcasts" => Podcast::latest()->paginate(12)]);
    }

    public function store(Request $request)
    {

        $imgName = Carbon::now()->timestamp . 'lumiere.' . $request->file('cover')->extension();
        $path = $request->file("cover")->storeAs('podcasts/covers', $imgName, 'public');

        $audioName = Carbon::now()->timestamp . 'lumiere' . $request->file('audio_file')->getClientOriginalName();

        $path = $request->file("audio_file")->storeAs('podcasts', $audioName, 'public');



        Podcast::create([
            "title" => $request->title,
            "author" => $request->author,
            "cover" => $imgName,
            "audio_file" => $audioName,
            "description" => $request->description
        ]);

        $subscribers = Subscriber::all();

        foreach ($subscribers as $subscriber) {
            Mail::to($subscriber->email)
                ->send(new NewsletterMail($request->title, $request->description));
        }
        return redirect()->route("podcast.index");


    }

    public function delete(int $id)
    {
        Podcast::destroy($id);
        return redirect()->back();
    }
}
