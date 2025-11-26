<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class ResultSearchController extends Controller
{
    public function index ($articles) {
        $query = Post::query();
        if ($articles) {
            $query->where('title', 'LIKE', "%{$articles}%");
        }
        $results = $query->get();
        return view("pages.resultsSearch", ['articles' => $results]);
    }
}
