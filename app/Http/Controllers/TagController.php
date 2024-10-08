<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Blog;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        return view('blogs.posts.tags.index', compact('tags'));
    }

    public function create()
    {
        return view('blogs.posts.tags.create');
    }

    public function store(Request $request, Post $post)
    {
        $request->validate([
            'user_id' => auth()->user()->id,
            'blog_id' => $blog->id,
            'name' => 'required|unique:tags,name|max:255',
        ]);

        auth()->user()->tags()->create($request->all());

        // Tag::create([
        //     'user_id' => auth()->user()->id,
        //     'blog_id' => $blog->id,
        //     'name' => $request->name,
        // ]);

        return redirect()->route('blogs.posts.tags.index', $post->id)->with('success', 'Tag created successfully.');
    }

    public function show(Post $post, Tag $tag)
    {
        return view('blogs.posts.tags.show', compact('post','tag'));
    }

    public function edit(Post $post, Tag $tag)
    {
        $tags = Tag::all();
        return view('blogs.posts.tags.edit', compact('tag'));
    }

    public function update(Request $request, Post $post, Tag $tag)
    {
        $request->validate([
            'name' => 'required|max:255|unique:tags,name,' . $tag->id,
        ]);

        $tag->update([
            'name' => $request->name,
        ]);

        return redirect()->route('blogs.posts.tags.index')->with('success', 'Tag updated successfully.');
    }
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('blogs.posts.tags.index')->with('success', 'Tag deleted successfully.');
    }
}
