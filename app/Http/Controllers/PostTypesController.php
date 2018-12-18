<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostTypeRequest;
use App\Post;
use App\PostType;

class PostTypesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('show');
    }

    public function create()
    {
        return view('post_types.create');
    }

    public function store(PostTypeRequest $request)
    {
        PostType::create($request->only('name'));
        return redirect()->route('posts.index');
    }

    public function show($type_id)
    {
        $type = PostType::findOrFail($type_id);
        $posts = Post::where('type', $type_id)->orderBy('created_at', 'DESC')->paginate(5);
        $post_types = PostType::orderBy('name', 'ASC')->get();
        return view('posts.index', ['posts' => $posts, 'post_types' => $post_types, 'type' => $type]);
    }

    public function edit($id)
    {
        $post_type = PostType::findOrFail($id);
        return view('post_types.edit', ['post_type' => $post_type]);
    }

    public function update(PostTypeRequest $request, $id)
    {
        $post_type = PostType::findOrFail($id);
        $post_type->fill($request->only('name'));
        $post_type->save();
        return redirect()->route('posts.index');
    }
    
    public function destroy($id)
    {
        $post_type = PostType::findOrFail($id);
        $post_type->posts()->delete();
        $post_type->delete();
        return redirect()->route('posts.index');
    }
}