<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Mail\NewsletterMail;
use App\Models\Category;
use App\Models\Subscriber;
use App\Models\Tag;
use App\Services\PostService;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\TwitterCard;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Jorenvh\Share\ShareFacade;
use Str;

class PostController extends Controller
{

    public function __construct(public PostService $postService) {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = $this->postService->getAllPosts();
        return view("pages.admin.listArticles", compact("posts"));
    }

    public function front()
    {
        $articles = $this->postService->getAllPosts();

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

        $post = $this->postService->CreatePost($request, $imgName);
        // tags pour chaque article
        $this->postService->createTags($post, $request->tags);
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
    public function show(Post $post,  Request $request)
    {
        // try {
        //     ViewPost::updateOrCreate([
        //         "post_id" => $post->id,
        //         'view_post' => +1,
        //         'ip_adress' => $request->ip()
        //     ]);
        // } catch (\Throwable $th) {
        //     throw $th;
        // }
        // $views = ViewPost::where("post_id", $post->id)->where("ip_adress", $request->ip())->first();
        // if($views) {
        //     $views->increment("view_post");
        // }
        // else {
        //         ViewPost::updateOrCreate([
        //             "post_id" => $post->id,
        //             'view_post' => 1,
        //             'ip_adress' => $request->ip()
        //         ]);
        // }
        $url = route('posts.show', $post->slug);



        $sharedButtons = ShareFacade::page($url, $post->title)->facebook()->twitter()->linkedin()->whatsapp()->telegram();

        $categories = Category::all();

        $related = Post::where("category_id", $post->category_id)->where("id", "!=", $post->id)->latest()->limit(3)->get();

        SEOMeta::setTitle($post->title);
        SEOMeta::setDescription(Str::limit(strip_tags($post->descrption), 160));
        SEOMeta::setCanonical($url);

        OpenGraph::setTitle($post->title)->setDescription(Str::limit(strip_tags($post->descrption), 160))->setUrl($url)->addImage(asset("storage/uploads/" . $post->image));

        TwitterCard::setTitle($post->title)->setDescription(Str::limit(strip_tags($post->descrption), 160))->setImage(asset("storage/uploads/" . $post->image));

        return view("pages.article", compact("post", "related", "categories", "sharedButtons"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {

        $categories = Category::all();
        return view("pages.admin.editarticle", ["categories" => $categories, 'post' => Post::whereId($id)->with('author')->first()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $imgName = Carbon::now()->timestamp . 'patrickngoy.' . $request->file('image')->extension();
        $path = $request->file("image")->storeAs('uploads', $imgName, 'public');

        $post = $this->postService->CreatePost($request, $imgName);
        // tags pour chaque article
        $this->postService->createTags($post, $request->tags);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(int $id)
    {
        Post::destroy($id);
        return redirect()->back();
    }

    public function floara(Request $request)
    {
        // 1. Validation basique
        if ($request->hasFile('file')) { // Froala envoie le fichier sous le nom 'file' par défaut

            // 2. Stockage de l'image (dans storage/app/public/uploads)
            $path = $request->file('file')->store('public/uploads');

            // 3. Génération de l'URL accessible (nécessite php artisan storage:link)
            $url = Storage::url($path);

            // 4. Retourner le JSON attendu par Froala
            return response()->json([
                'link' => $url
            ]);
        }

        return response()->json(['error' => 'Aucun fichier reçu'], 400);
    }
}
