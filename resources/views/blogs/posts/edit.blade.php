@extends('layouts.app')
<style>
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f4e1d3; /* Light nude background */
        color: #333;
    }
    h1 {
        font-size: 28px;
        color: #c19a8d; /* Soft nude color */
        margin-bottom: 20px;
    }
    label {
        display: block;
        margin: 10px 0 5px;
    }
    input[type="text"], textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin-bottom: 20px;
    }
    button {
        background-color: #d2b19b; /* Soft nude button color */
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
    button:hover {
        background-color: #c19a8d; /* Darker nude on hover */
    }
</style>

@section('content')
    <div class="container">
        <h1>Edit Post</h1>
            <form action="{{ route('blogs.posts.update', [$blog->id, $post->id]) }}" method="POST">
                @csrf
                @method('PUT')
                
                <label for="title">Title</label>
                <input type="text" name="title" id="title" value="{{ $post->title }}" required>
                
                <label for="content">Content</label>
                <textarea name="content" id="content" required>{{ $post->content }}</textarea>
                
                <button type="submit" class="btn btn-primary">Update Post</button>
                <a href="{{ route('blogs.show', [$blog, $post]) }}" class="btn btn-primary">Back to Post</a>
            </form>
    </div>
@endsection
