<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Blog;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(User $user)
    {
        // $blogs = Blog::all(); //allow semua user buat CRUD kat blog/post
        // $blogs = auth()->user()->blogs()->orderBy('created_at', 'desc')->get(); //allow each user can do CRUD on their own blog/post only
        // $blogs = Blog::orderBy('created_at', 'desc')->get();

        // $blogs = Blog::paginate(5); //pagination

        // Retrieve blogs ordered by created_at in descending order and paginate the results
        $blogs = Blog::orderBy('created_at', 'desc')->paginate(5);
        return view('blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('blogs.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        auth()->user()->blogs()->create($request->all());//mass assignment

        // example without mass assignment
        // $blog = Blog::create([
        //     'user_id' => auth()->user()->id,
        
        //     'title' => $request->title,
        //     'content' => $request->content,
        // ])

        return redirect()->route('blogs.index')->with('success', 'Blog post created successfully.');
    }

    public function show(Blog $blog)
    {
        $posts=Post::all();
        $posts = $blog->posts()->latest()->paginate(5);
        return view('blogs.show', compact('blog', 'posts'));
    }

    public function edit(Blog $blog)
    {
        $tags = Tag::all();
        return view('blogs.edit', compact('blog', 'tags'));
    }

    public function update(Request $request, Blog $blog)
    {
        {
            $this->validate($request, [
                'title' => 'required|max:255',
                'content' => 'required',
            ]);
    
            //$blog->title = $validatedData['title'];
            //$blog->content = $validatedData['content'];
            $blog->update($request->all());
            return redirect()->route('blogs.show', '$blog->id')->with('success', 'Blog post updated successfully.');
        }
    }

    public function destroy(Blog $blog)
    {
        $blog->tags()->detach();
        $blog->delete(); 

        return redirect()->route('blogs.index')->with('success', 'Blog post deleted successfully!');
    }
}
