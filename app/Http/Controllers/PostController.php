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
        $this->postService->createTags($post, $request->tags);
        $subscribers = Subscriber::all();

        foreach ($subscribers as $subscriber) {
            Mail::to($subscriber->email)
                ->send(new NewsletterMail($request->title, $request->description));
        }

        return redirect()->route("posts.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post, Request $request)
    {
        $url = route('posts.show', $post->slug);

        // 🎯 Préparer le contenu pour les métadonnées
        $description = $post->excerpt ?? Str::limit(strip_tags($post->descrption), 160);
        $imageUrl = asset("storage/uploads/" . $post->image);

        // 📱 SEO Meta (standard)
        SEOMeta::setTitle($post->title);
        SEOMeta::setDescription($description);
        SEOMeta::setCanonical($url);

        // 📘 Open Graph (Facebook, LinkedIn, WhatsApp, Telegram)
        OpenGraph::setTitle($post->title)
            ->setDescription($description)
            ->setUrl($url)
            ->setType('article')
            ->addImage($imageUrl, [
                'width' => 1200,
                'height' => 630,
                'type' => 'image/jpeg'
            ])
            ->addProperty('article:published_time', $post->created_at->toIso8601String())
            ->addProperty('article:modified_time', $post->updated_at->toIso8601String())
            ->addProperty('article:author', $post->author?->name ?? config('app.name'))
            ->addProperty('article:section', $post->category?->name ?? 'News');

        // 𝕏 Twitter Card (Twitter/X)
        TwitterCard::setTitle($post->title)
            ->setDescription($description)
            ->setImage($imageUrl)
            ->setType('summary_large_image');

        // 🔗 Boutons de partage
        $sharedButtons = ShareFacade::page($url, $post->title)
            ->facebook()
            ->twitter()
            ->linkedin()
            ->whatsapp()
            ->telegram();

        $categories = Category::all();
        $related = Post::where("category_id", $post->category_id)
            ->where("id", "!=", $post->id)
            ->latest()
            ->limit(3)
            ->get();

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

    public function ckeditor(Request $request)
    {
        if ($request->hasFile('upload')) {
            $file = $request->file('upload');
            $fileName = time() . '_' . $file->getClientOriginalName();
            
            $file->move(public_path('media'), $fileName);
            $url = asset('media/' . $fileName);

            return response()->json([
                'uploaded' => 1,
                'fileName' => $fileName,
                'url' => $url
            ]);
        }

        return response()->json([
            'uploaded' => 0, 
            'error' => ['message' => 'Erreur lors de l\'envoi de l\'image.']
        ]);
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $imgName = Carbon::now()->timestamp . 'patrickngoy.' . $request->file('image')->extension();
        $path = $request->file("image")->storeAs('uploads', $imgName, 'public');

        $post = $this->postService->CreatePost($request, $imgName);
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
        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('public/uploads');
            $url = Storage::url($path);

            return response()->json([
                'link' => $url
            ]);
        }

        return response()->json(['error' => 'Aucun fichier reçu'], 400);
    }
}
