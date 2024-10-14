@extends('layouts.app')

@section('content')
    <div class="container">
        @include('flash')
        <h1><strong>{{ $blog->title }}</strong></h1>
        <p>
            <a>Created By: {{ $blog->user->name }}</a>
            <a style="float: right;"><small>{{ $blog->created_at->format('d M Y, h:i A') }}</small></a>
        </p>
        <p><a>{{ $blog->content }}</a></p>

        <!-- Searching -->
        <div class="mt-5">
            <form action="{{ route('blogs.show', $blog->id) }}" method="GET">
                <div class="input-group">
                    <input type="text" class="form-control" name="keyword" value="{{ request()->get('keyword')}}" placeholder="Search posts...">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </div>
                </div>
            </form>
        </div>

        <a href="{{ route('blogs.posts.create', $blog->id) }}" class="btn btn-primary btn-sm mt-5">Create New Post</a>
        @if (auth()->check() && auth()->user()->id === $blog->user_id)
        <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-primary btn-sm mt-5" style="float: right;">Edit Blog</a>
        @endif
        <table class="table mt-3">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Created By</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td>{{ $post->title }}</a></td>
                            <td>{{ $post->user->name }}</td>
                            <td><small>{{ $post->created_at->format('d M Y, h:i A') }}</small></td>
                            <td><a href="{{ route('blogs.posts.show', [$blog->id, $post->id]) }}" class="btn btn-primary">Show</a></td>
                            @if (auth()->check() && auth()->user()->id === $blog->user_id)
                            <td><a href="{{ route('blogs.posts.edit', [$blog->id, $post->id]) }}" class="btn btn-primary">Edit</a></td>
                                <td>
                                    <form action="{{ route('blogs.posts.destroy', [$blog->id, $post->id]) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure you want to delete this post?');">Delete</button>
                                    </form>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- pagination -->
            <div class="pagination">
                {{ $posts->appends(['keyword' => request()->get('keyword')])->links() }}
            </div>

        <a href="{{ route('blogs.index') }}" class="btn btn-primary btn-sm" style="float: right;">Back to Blogs</a>
    </div>
@endsection