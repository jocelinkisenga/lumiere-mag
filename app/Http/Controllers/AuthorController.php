<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index () {
        return view("pages.admin.authors",  ["authors" => Author::latest()->get()]);
    }

    public function create() {
        return view("pages.admin.addAuthor");
    }

    public function store(Request $request)
    {

        $imgName = Carbon::now()->timestamp . 'lumiere.' . $request->file( 'avatar')->extension();
        $path = $request->file("avatar")->storeAs('author/avatars', $imgName, 'public');



        Author::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'avatar' => $imgName,
            'about' => $request->about
        ]);


        return redirect()->route("authors.index");
    }
}
