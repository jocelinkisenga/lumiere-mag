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

        return redirect()->route("posts.index");
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
        SEOMeta::setDescription(Str::limit(strip_tags($post->description), 160));
        SEOMeta::setCanonical($url);

        OpenGraph::setTitle($post->title)->setDescription(Str::limit(strip_tags($post->descrption), 160))->setUrl($url)->addImage(asset("storage/uploads/" . $post->image));

        TwitterCard::setTitle($post->title)->setDescription(Str::limit(strip_tags($post->descrption), 160))->setImage(asset("storage/uploads/" . $post->image));

        return view("pages.article", compact("post", "related", "categories", "sharedButtons"));
    }

    
public function edit(Post $post)
    {
        $categories = Category::all();
        
        return view('pages.admin.editArticle', compact('post', 'categories'));
    }

    /**
     * Met à jour l'article dans la base de données.
     */
    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'author_id'   => 'required|exists:authors,id',
            'category_id' => 'required|exists:categories,id',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'tags'        => 'nullable|string',
            'excerpt'     => 'nullable|string',
            'description' => 'required',
        ]);

        // Gestion de l'image si une nouvelle est envoyée
        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image si elle existe
            if ($post->image && Storage::disk('public')->exists($post->image)) {
                Storage::disk('public')->delete($post->image);
            }
            $validated['image'] = $request->file('image')->store('posts', 'public');
        }

        $post->update($validated);

        return redirect()->route('posts.index')->with('success', 'Article mis à jour avec succès.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function delete(int $id)
    {
        Post::destroy($id);
        return redirect()->back();
    }

    public function ckeditor(Request $request)
    {
    
if ($request->hasFile('upload')) {
            $file = $request->file('upload');
            $fileName = time() . '_' . $file->getClientOriginalName();
            
            // Stockage dans le dossier public/media
            $file->move(public_path('media'), $fileName);

            $url = asset('media/' . $fileName);

            // Format JSON exact attendu par CKFinder
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
}
