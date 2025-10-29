<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Mail\NewsletterMail;
use App\Models\Category;
use App\Models\Subscriber;
use App\Models\ViewPost;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Jorenvh\Share\ShareFacade;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::orderBy("created_at", "desc")->paginate(10);
        return view("pages.admin.listArticles", compact("posts"));
    }

    public function front()
    {
        $articles = Post::orderBy("created_at", "desc")->paginate(12);

        return view("pages.articles", compact("articles"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view("pages.admin.addArticle", ["categories" => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {


        $imgName = Carbon::now()->timestamp . 'patrickngoy.' . $request->file('image')->extension();
        $path = $request->file("image")->storeAs('uploads', $imgName, 'public');

        $post = Post::create([
            "category_id" => $request->category_id,
            "title" => $request->title,
            "slug" => $request->slug,
            "image" => $imgName,
            "author" => $request->author,
            "description" => $request->description
        ]);

        $subscribers = Subscriber::all();

        foreach ($subscribers as $subscriber) {
            Mail::to($subscriber->email)
                ->send(new NewsletterMail($request->title, $request->description));
        }

        return redirect()->route("dashboard");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $title, int $id, Request $request)
    {
        try {
            ViewPost::updateOrCreate([
                "post_id" => $id,
                'view_post' => +1,
                'ip_adress' => $request->ip()
            ]);
        } catch (\Throwable $th) {
            throw $th;
        } //url("article/{title}/{id}". $post->slug), $post->title
        $post = Post::findOrFail($id);

        $sharedButtons = ShareFacade::currentPage()->facebook()->twitter()->linkedin()->whatsapp()->telegram();

        $categories = Category::all();
       
        $related = Post::where("category_id", $post->category_id)->where("id", "!=", $id)->latest()->limit(3)->get();
        
        return view("pages.article", compact("post", "related", "categories", "sharedButtons"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(int $id)
    {
        Post::destroy($id);
        return redirect()->back();
    }
}
