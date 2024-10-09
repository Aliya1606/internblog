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
    <h1>Create Post</h1>
    <form action="{{ route('blogs.posts.store', $blog->id) }}" method="POST" enctype="multipart/form-data"> 
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" placeholder="Enter blog title" required>
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" id="content" placeholder="Write your content here..." required></textarea>
        </div>
        <div class="form-group">
            <label for="tags">Tags:</label>
            <select name="tag_ids[]" id="tags" multiple class="form-control">
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}">
                        {{ $tag->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <label>Attachment</label>
            <input type="file" class="form-control" name="attachment">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    <a href="{{ route('blogs.show', $blog->id) }}" class="btn btn-primary btn-sm">Back to Post</a>
</div>
@endsection