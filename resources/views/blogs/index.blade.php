@extends('blogs.layouts.main')

@section('title', 'Blog Home')

@section('header-title', 'Welcome to My Blog!')
@section('header-subtitle', 'A custom blog layout built with Bootstrap 5')

@section('content')
    <div class="container">
        @include('flash')

        <!-- Searching -->
        <div class="d-flex justify-content-between align-items-center mt-5">
            <form action="" method="">
                <div class="input-group" style="width: auto;">
                    <input type="text" class="form-control form-control-sm" name="keyword" value="{{ request()->get('keyword') }}" style="width: 150px;">
                    <div class="input-group-append">
                        <button class="btn btn-primary btn-sm" type="submit">Search</button>
                    </div>
                </div>
            </form>
            <a href="{{ route('blogs.create') }}" class="btn btn-primary btn-sm">Create New Blog</a>
        </div>

        <!-- Blog posts grid -->
        <div class="row mt-4">
            @foreach($blogs as $blog)
                <div class="col-lg-6 mb-4">
                    <div class="card">
                        <a href="{{ route('blogs.show', $blog->id) }}"></a>
                        <div class="card-body">
                            <h2 class="card-title h4">{{ $blog->title }}</h2>
                            <div class="text-muted fst-italic mb-2">
                                <small>Posted on {{ $blog->created_at->format('d M Y, h:i A') }}, by {{ $blog->user->name }}</small>
                            </div>                           
                            <a class="btn btn-primary btn-sm" href="{{ route('blogs.show', $blog->id) }}">Read more →</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
