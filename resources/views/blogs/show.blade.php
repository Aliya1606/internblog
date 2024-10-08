@extends('layouts.app')


@section('content')
<div class="container">
    <h1><strong>{{ $blog->title }}</strong></h1>
    <p>
        <a>{{ $blog->content }}</a>
        <a style="float: right;"><small>{{ $blog->created_at->format('d M Y, h:i A') }}</small></a>
    </p>
    <a href="{{ route('blogs.posts.create', $blog->id) }}" class="btn btn-primary btn-sm" style="margin-right: 10px;">Create New Post</a>
    <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-primary btn-sm" style="float: right;">Edit Blog</a>
    <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>{{ $post->title }}</a></td>
                        <td><small>{{ $post->created_at->format('d M Y, h:i A') }}</small></td>
                        <td><a href="{{ route('blogs.posts.show', [$blog->id, $post->id]) }}" class="btn btn-primary">Show</a></td>
                        <td><a href="{{ route('blogs.posts.edit', [$blog->id, $post->id]) }}" class="btn btn-primary">Edit</a></td>
                        <td>
                            <form action="{{ route('blogs.posts.destroy', [$blog->id, $post->id]) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure you want to delete this post?');">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    <a href="{{ route('blogs.index') }}" class="btn btn-primary btn-sm" style="float: right;">Back to Blogs</a>
</div>
</div>
@endsection