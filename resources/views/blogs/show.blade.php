@extends('blogs.layouts.main')

@section('content')
    <class="container">
        @include('flash')

        <!-- Blog Title and Meta -->
        <h1 class="my-4"><strong>{{ $blog->title }}</strong></h1>
        <div class="text-muted fst-italic mb-2">
            <small>Posted on {{ $blog->created_at->format('d M Y, h:i A') }}, by {{ $blog->user->name }}</small>
        </div>
        
        <a href="{{ route('blogs.posts.create', $blog->id) }}" class="btn btn-primary btn-sm" style="float: right;">Create New Post</a>
        
        <p>{{ $blog->content }}</p>

        <div class="row">
            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <!-- Featured Post -->
                @if($posts->count() > 0)
                    <div class="card mb-4">
                        <a href="{{ route('blogs.posts.show', [$blog->id, $posts[0]->id]) }}">
                            <img class="card-img-top" src="{{ asset('storage/attachment/' . $posts[0]->attachment) }}" alt="{{ $posts[0]->title }}" style="width: 100%; height: 350px; object-fit: cover;" />
                        </a>
                        <div class="card-body">
                            <div class="text-muted fst-italic mb-2">
                                <small>Posted on {{ $posts[0]->created_at->format('d M Y, h:i A') }}, by {{ $posts[0]->user->name }}</small>
                            </div>                           
                            <h2 class="card-title">{{ $posts[0]->title }}</h2>
                            <p class="card-text">{{ \Illuminate\Support\Str::limit($posts[0]->content, 10) }}</p>
                            <a class="btn btn-primary btn-sm" href="{{ route('blogs.posts.show', [$blog->id, $posts[0]->id]) }}">Read more →</a>
                        </div>
                    </div>
                @endif
            

                <!-- Nested row for non-featured blog posts-->
                <div class="row">
                    @foreach($posts->skip(1) as $post)
                        <div class="col-lg-6 col-md-6 mb-4">
                            <div class="card">
                                <a href="{{ route('blogs.posts.show', [$blog->id, $post->id]) }}">
                                    <img class="card-img-top" src="{{ asset('storage/attachment/' . $post->attachment) }}" alt="{{ $post->title }}" style="width: 100%; height: 350px; object-fit: cover;"/>
                                </a>
                                <div class="card-body">
                                    <div class="text-muted fst-italic mb-2">
                                        <small>Posted on {{ $post->created_at->format('d M Y, h:i A') }}, by {{ $post->user->name }}</small>
                                    </div>                           
                                    <h4 class="card-title">{{ $post->title }}</h4>
                                    <p class="card-text">{{ \Illuminate\Support\Str::limit($post->content, 10) }}</p>
                                    <a class="btn btn-primary btn-sm" href="{{ route('blogs.posts.show', [$blog->id, $post->id]) }}">Read more →</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <a href="{{ route('blogs.index') }}" class="btn btn-primary btn-sm" style="float: right;">Back to Blogs</a>

        </div>
    </div>
@endsection
