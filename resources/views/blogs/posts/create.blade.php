@extends('blogs.layouts.main')

@section('content')
    <div class="container">
    @include('flash')
        <a href="{{ route('blogs.show', $blog->id) }}" class="btn btn-primary btn-sm" style="float: right;">Back to Post</a>
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
    </div>
@endsection