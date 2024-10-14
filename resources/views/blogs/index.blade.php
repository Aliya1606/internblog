@extends('layouts.app')

@section('content')
    <div class="container">        
        @include('flash')
        
        <!-- Searching -->
        <div class="float-right">
            <form action="" method="">
                <div class="input-group">
                    <input type="type" class="form-control" name="keyword" value="{{ request()->get('keyword')}}">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </div>
                </div>
            </form>
        </div>

        <h1 class="mt-5">Blogs</h1>
        <a href="{{ route('blogs.create') }}" class="btn btn-primary btn-sm">Create New Blog</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Created By</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                @foreach($blogs as $blog)
                    <tr>
                        <td>{{ $blog->title }}</td>
                        <td>{{ $blog->user->name }}</td>
                        <td>{{ $blog->created_at->format('d M Y, h:i A') }}</td>
                        <td><a href="{{ route('blogs.show', $blog->id) }}" class="btn btn-primary">Show</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- pagination -->
        <div class="pagination">
            {{ $blogs->appends(['keyword' => request()->get('keyword')])->links() }}
        </div>
    </div>
@endsection
