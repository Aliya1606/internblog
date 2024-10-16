@extends('blogs.layouts.main')

@section('content')
    <div class="container">
        @include('flash')
        <h1>Create Blog</h1>
        <form action="{{ route('blogs.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" placeholder="Enter blog title" required>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" id="content" placeholder="Write your content here..." required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <a href="{{ route('blogs.index') }}" class="btn btn-primary btn-sm">Back to Blogs</a>
    </div>
@endsection
