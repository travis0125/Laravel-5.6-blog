<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\PostType;

class HomeController extends Controller
{
    public function index()
    {
        return redirect()->route('posts.index');
    }

    public function search(Request $request)
    {
        if(!$request->has('keyword'))
        {
            return redirect()->back();
        }
        $keyword = $request->get('keyword');
        $posts = Post::where('title', 'LIKE', "%$keyword%")->orderBy('created_at', 'DESC')->paginate(5);
        $post_types = PostType::orderBy('name', 'ASC')->get();
        return view('posts.index', ['posts' => $posts, 'post_types' => $post_types, 'keyword' => $keyword]);
    }
}