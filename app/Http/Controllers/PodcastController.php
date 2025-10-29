<?php

namespace App\Http\Controllers;

use App\Models\Podcast;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Jorenvh\Share\ShareFacade;

class PodcastController extends Controller
{
    public function index()
    {
        return view("pages.admin.listPodcasts", ["podcasts" => Podcast::latest()->limit(12)->get()]);
    }

    public function show($title, $id)
    {
        $podcast  = Podcast::findOrFail($id);
        $sharedButtons = ShareFacade::currentPage()->facebook()->twitter()->linkedin()->whatsapp()->telegram();

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

        return redirect()->route("podcast.index");


    }

    public function delete(int $id)
    {
        Podcast::destroy($id);
        return redirect()->back();
    }
}
