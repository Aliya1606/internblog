@extends('blogs.layouts.main')

@section('content')
    <div class="container">
        @include('flash')
        <h1>Edit Blog</h1>
        <form action="{{ route('blogs.update', $blog->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ $blog->title }}" required>
            
            <label for="content">Content</label>
            <textarea name="content" id="content" required>{{ $blog->content }}</textarea>
            
            <button type="submit" class="btn btn-primary">Update Blog</button>
        </form>
        <a href="{{ route('blogs.show', $blog->id) }}" class="btn btn-primary btn-sm">Back to Blogs</a>
    </div>
@endsection