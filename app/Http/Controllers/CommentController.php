<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function comments ($id) {
        return view("pages.admin.listcomments", ["comments" => Comment::where("post_id", $id)->latest()->get()]);
    }

    public function delete(int $id)
    {
        Comment::destroy($id);
        return redirect()->back();
    }
}
