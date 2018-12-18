<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Post;
use App\PostType;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        $posts = Post::orderBy('created_at', 'DESC')->paginate(5);
        $post_types = PostType::orderBy('name', 'ASC')->get();
        return view('posts.index', ['posts' => $posts, 'post_types' => $post_types]);
    }

    public function create()
    {
        $post_types = PostType::orderBy('name', 'ASC')->get();
        return view('posts.create', ['post_types' => $post_types]);
    }

    public function store(PostRequest $request)
    {
        $post = Post::create($request->all());
        $post->user_id = auth()->user()->id;
        $post->save();
        return redirect()->route('posts.index');
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', ['post' => $post]);
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $post_types = PostType::orderBy('name', 'ASC')->get();
        return view('posts.edit', ['post' => $post, 'post_types' => $post_types]);
    }

    public function update(PostRequest $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->fill($request->all());
        $post->save();
        return redirect()->route('posts.index');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('posts.index');
    }
}