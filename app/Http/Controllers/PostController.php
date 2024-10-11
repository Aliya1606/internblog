<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
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

        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'exists:tags,id',
            'attachment' => 'nullable|file',
        ]);

        $post = Post::create([ 
            'user_id' => auth()->user()->id,
            'blog_id' => $blog->id,
            'title'  => $request->title,
            'content' => $request->content,
            'attachment' => $request->attachment,
        ]);

        if ($request->hasFile('attachment')) 
        {
            $filename = $post->id. '-'.date('Y-m-d').'.'.$request->attachment->getClientOriginalExtension();
            Storage::disk('public')->put('attachment/'.$filename, File::get($request->attachment));

            $post->attachment = $filename;
            $post->save();
        }
        
        $post->user_id = auth()->user()->id;
        $post->tags()->sync($request->tag_ids);

        return redirect()->route('blogs.posts.show', [$blog->id,$post->id])->with('success', 'Post created successfully.');
    }

    public function show(Blog $blog, Post $post)
    {
        $post->load('tags');
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
        // dd($post);
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'tag_ids' => 'array',
            'attachment' => 'nullable|file',
        ]);

        //Handle tag
        if ($request->has('tag_ids')) {
            $post->tags()->sync($request->tag_ids);
        }

        // Check if a new file is uploaded
        if ($request->hasFile('attachment')) 
        {
            // Optionally delete the old file if it exists
            if ($post->attachment) {
                Storage::disk('public')->delete('attachment/' . $post->attachment);
            }

            $filename = $post->id. '-'.date('Y-m-d').'.'.$request->attachment->getClientOriginalExtension();
            Storage::disk('public')->put('attachment/'.$filename, File::get($request->attachment));

            // Update the post with the new attachment
            $post->attachment = $filename;
        }

        //except('attachment') utk This will not overwrite the attachment field
        $post->update($request->except('attachment'));

        return redirect()->route('blogs.posts.show', [$blog->id, $post->id])->with('success', 'Post updated successfully.');        
    }

    public function destroy(Request $request, Blog $blog, Post $post)
    {   
        if ($request->attachment)
        {
            Storage::disk('public')->delete($post->attachment);
        }

        $post->delete(); 
        return redirect()->route('blogs.show', $blog->id)->with('success', 'Post deleted successfully!');
    }

    public function getAttachmentUrlAttribute()
    {
        return asset('storage/attachment/'.$this->attachment);
    }
}