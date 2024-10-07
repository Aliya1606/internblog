@extends('layouts.app')

@section('content')
<div class="container">
    <h2><strong>{{ $post->title }}</strong></h2>
    <p>{{ $post->content }}</p>
    <a href="{{ route('blogs.show', [$blog->id, $post->id]) }}" class="btn btn-primary">Back to Post</a>
</div>
@endsection
