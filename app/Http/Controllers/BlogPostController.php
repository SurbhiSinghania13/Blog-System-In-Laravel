<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogPostRequest;
use App\Http\Requests\UpdateBlogPostRequest;
use App\Models\BlogPost;
use Illuminate\Http\Request;

class BlogPostController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogPosts = BlogPost::orderBy('post_date', 'DESC')->get();
        return view('post.index', compact('blogPosts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogPostRequest $request)
    {
        BlogPost::create($request->validated());
        return redirect()->route('blog_posts')->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(BlogPost $blogPost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($postId)
    {
        $blogPost = BlogPost::findOrFail($postId);
        return view('post.edit', ['blogPost' => $blogPost]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogPostRequest $request, BlogPost $blogPost)
    {
        $blogPost->update($request->validated());
        return redirect()->route('blog_posts')->with('success', 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($postId)
    {
        $blogPost = BlogPost::findOrFail($postId);
        $blogPost->delete();

        return redirect()->route('blog_posts')->with('success', 'Post deleted successfully.');
    }
}
