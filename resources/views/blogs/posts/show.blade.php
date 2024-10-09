@extends('layouts.app')

@section('content')
<div class="container">
    <h2><strong>{{ $post->title }}</strong></h2>
    <p>
        <a style="float: right;"><small>{{ $post->created_at->format('d M Y, h:i A') }}</small></a>
        <td>Create By: {{ $post->user->name }}</td>
    </p>
    <a>{{ $post->content }}</a>
    <p>Tags:</p>
    <p>
    <ul>
        @foreach($post->tags as $tag)
            <li>{{ $tag->name }}</li>
        @endforeach
    </ul>
    </p>
    @if (auth()->check() && auth()->user()->id === $blog->user_id)
        <a href="{{ route('blogs.posts.edit', [$blog->id, $post->id]) }}" class="btn btn-primary btn-sm" style="margin-right: 10px;">Edit</a>
    @endif
    <a href="{{ route('blogs.show', [$blog->id, $post->id]) }}" class="btn btn-primary btn-sm" style="float: right;">Back to Post</a>
</div>
@endsection
