@extends('layouts.app')

@section('content')
<div class="container">
    <h2><strong>{{ $post->title }}</strong></h2>
    <p>{{ $post->content }}</p>
    <p>Tags:</p>
    <p>
    <ul>
        @foreach($post->tags as $tag)
            <li>{{ $tag->name }}</li>
        @endforeach
    </ul>
    </p>
    <a href="{{ route('blogs.posts.edit', [$blog->id, $post->id]) }}" class="btn btn-primary btn-sm" style="margin-right: 10px;">Edit</a>
    <a href="{{ route('blogs.show', [$blog->id, $post->id]) }}" class="btn btn-primary btn-sm">Back to Post</a>
</div>
@endsection
