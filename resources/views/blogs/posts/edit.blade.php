@extends('blogs.layouts.main')

@section('content')
    <div class="container">
    @include('flash')
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