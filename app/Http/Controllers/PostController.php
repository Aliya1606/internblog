<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Blog $blog)
    {
        $posts = $blog->posts;
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('blogs.posts.index', compact('posts'));
    }

    public function create(Blog $blog)
    {
        $tags = Tag::all();
        return view('blogs.posts.create', compact('blog','tags')); //dlm compact kne ade blog skali
    }

    public function store(Request $request, Blog $blog)
    {
        $post = Post::create([ 
            'user_id' => auth()->user()->id,
            'blog_id' => $blog->id,
            'title'  => $request->title,
            'content' => $request->content,
        ]);

        $post->tags()->sync($request->tag_ids);
        return redirect()->route('blogs.show', $blog->id)->with('success', 'Post created successfully.');
    }

    public function show(Blog $blog, Post $post)
    {
        return view('blogs.posts.show', compact('blog','post'));
    }

    public function edit(Blog $blog, Post $post)
    {
        $tags = Tag::all();
        return view('blogs.posts.edit', compact('blog','post', 'tags'));
    }

    public function update(Request $request, Blog $blog, Post $post)
    {
        //$post=Post::find($post);
        //dd($post);
        $this->validate($request, [
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $post->update($request->all());
        return redirect()->route('blogs.show', [$blog->id, $post->blog_id])->with('success', 'Post updated successfully.');        
    }

    public function destroy(Blog $blog, Post $post)
    {
        $post->delete(); 
        return redirect()->route('blogs.show', $blog->id)->with('success', 'Post deleted successfully!');
    }

    public function updateTags(Request $request, Post $post)
    {
        $request->validate([
            'tag_ids' => 'required|array',
            'tag_ids.*' => 'exists:tags,id',
        ]);

        $post->tags()->sync($request->input('tag_ids'));

        return redirect()->route('blogs.posts.show', $post->id)->with('success', 'Tags updated successfully.');
    }
}
