<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    // Fetch all posts
    function index(){
        $allPosts = Post::all();
        return view("posts.index", ['posts' => $allPosts]);
    }

    // Fetch a single post by ID
    public function show($postId){
        // $singlePost = Post::find($postId);

        // // Eloquent builder -> collection object 
        // $singlePost = Post::where('id',$postId)->get();

        
        // Eloquent builder -> model object
        $singlePost = Post::where('id',$postId)->first();


        if(!$singlePost) {
            return redirect()->route('posts.index')->with('error', 'Post not found');
        }

        return view("posts.show", ['post' => $singlePost]);
    }

    // Return the create post form
    public function create(){
        return view("posts.create");
    }

    // Store a new post
    public function store(){
        $data = request()->only(["title","description"]);

        Post::create($data);

        return redirect()->route("posts.index")->with('success', 'Post created successfully');
    }

    // Return the edit post form with post data
    public function edit($postId){
        $post = Post::find($postId);

        if(!$post) {
            return redirect()->route('posts.index')->with('error', 'Post not found');
        }

        return view("posts.edit", ['post' => $post]);
    }

    // Update an existing post
    public function update($postId){
        $data = request()->all();
        $post = Post::find($postId);

        if(!$post) {
            return redirect()->route('posts.index')->with('error', 'Post not found');
        }

        $post->update($data);

        return redirect()->route("posts.show", $postId)->with('success', 'Post updated successfully');
    }




    // Delete a post
    public function destroy($postId) {
        $post = Post::find($postId);

        if(!$post) {
            return redirect()->route('posts.index')->with('error', 'Post not found');
        }

        $post->delete();

        return redirect()->route("posts.index")->with('success', 'Post deleted successfully');
    }
}
