<?php

namespace App\Http\Controllers\Api;

use App\Post;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::all();
        $categories = Category::all('id', 'name');

        return response()->json([
            'success' => true,
            'posts' => $posts,
            'categories' => $categories,
        ]);
    }

    public function show($id)
    {
        return response()->json([
            'success' => true,
            'posts' => $posts,
            'categories' => $categories,
        ]);
    }
}
