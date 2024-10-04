<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Tag;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();
        return view('blogs.index', compact('blogs'));
    }

    public function create()
    {
        $tags = Tag::all();
        return view('blogs.create', compact('tags'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        //auth()->user()->blogs()->create($request->all());
        $blog = new Blog();
        $blog->user_id = auth()->user()->id;
        $blog->title = $validatedData['title'];
        $blog->content = $validatedData['content'];
        $blog->save();

        return redirect()->route('blogs.index')->with('success', 'Blog post created successfully.');
    }

    public function show(Blog $blog)
    {
        return view('blogs.show', compact('blog'));
    }

    public function edit(Blog $blog)
    {
        $tags = Tag::all();
        return view('blogs.edit', compact('blog', 'tags'));
    }

    public function update(Request $request, Blog $blog)
    {
        {
            $validatedData = $request->validate([
                'title' => 'required|max:255',
                'content' => 'required',
            ]);
    
            $blog->title = $validatedData['title'];
            $blog->content = $validatedData['content'];
            $blog->save();
    
            return redirect()->route('blogs.index')->with('success', 'Blog post updated successfully.');
        }
    }

    public function destroy(Blog $blog)
    {
        $blog->tags()->detach();
        $blog->delete(); 

        return redirect()->route('blogs.index')->with('success', 'Blog post deleted successfully!');
    }
}
