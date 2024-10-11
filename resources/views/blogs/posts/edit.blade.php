@extends('layouts.app')
<style>
    /* General Page Styles */
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f8f9fa;
        color: #333;
    }

    h1 {
        font-size: 32px;
        text-align: center;
        color: #007bff;
        margin-bottom: 30px;
        font-weight: bold;
    }

    /* Form Styling */
    form {
        display: flex;
        flex-direction: column;
    }
    label {
        font-size: 16px;
        font-weight: bold;
        color: #333;
        margin-bottom: 8px;
    }
    input[type="text"],
    textarea {
        width: 100%;
        padding: 15px;
        border-radius: 6px;
        border: 1px solid #ddd;
        background-color: #f9f9f9;
        font-size: 16px;
        transition: border-color 0.3s;
    }
    input[type="text"]:focus,
    textarea:focus {
        border-color: #007bff;
        outline: none;
        background-color: #fff;
    }
    textarea {
        height: 180px;
        resize: none;
    }

    /* Button Styles */
    button {
        width: 100%;
        padding: 15px;
        font-size: 18px;
        font-weight: bold;
        color: white;
        background-color: #007bff;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        transition: background-color 0.3s;
        margin-top: 20px;
    }
    button:hover {
        background-color: #0056b3;
    }

    /* Adding Spacing to Form Items */
    .form-group {
        margin-bottom: 20px;
    }

    /* Mobile Responsiveness */
    @media (max-width: 768px) {
        .container {
            padding: 20px;
            margin: 20px auto;
        }
        h1 {
            font-size: 28px;
        }
        button {
            padding: 12px;
        }
    }
</style>

@section('content')
    <div class="container">
    <a href="{{ route('blogs.posts.show', [$blog, $post]) }}" class="btn btn-primary btn-sm" style="float: right;">Back to Post</a>
        <h1>Edit Post</h1>
            <form action="{{ route('blogs.posts.update', [$blog->id, $post->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('post')

                <p>
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" value="{{ $post->title }}" required>
                </p>
                <p>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea name="content" id="content" required>{{ $post->content }}</textarea>
                    </div>
                </p>

                <div class="form-group">
                    <label for="tags">Tags:</label>
                    <select name="tag_ids[]" id="tags" multiple class="form-control">
                        @foreach($tags as $tag)
                            <option value="{{ $tag->id }}" @if($post->tags->contains($tag->id)) selected @endif>
                                {{ $tag->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label>Update Attachment</label>
                    @if ($post->attachment)
                        <p>Current Attachment: 
                            <a href="{{ asset('storage/attachment/' . $post->attachment) }}" target="_blank" class="btn btn-primary btn-sm">{{ $post->attachment }}</a>
                        </p> 
                    @endif                    
                    <input type="file" class="form-control" name="attachment">
                </div>

                <button type="submit" class="btn btn-primary">Update Post</button>
            </form>
    </div>
@endsection