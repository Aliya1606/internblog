@extends('blogs.layouts.main')

@section('content')
    <div class="container">        
        @include('flash')

        <h1 class="mt-5">Blogs</h1>

        <!-- Searching -->
        <div class="d-flex justify-content-between align-items-center mt-5">
            <form action="" method="">
                <div class="input-group" style="width: auto;">
                    <input type="type" class="form-control form-control-sm" name="keyword" value="{{ request()->get('keyword')}}" style="width: 150px;">
                    <div class="input-group-append">
                        <button class="btn btn-primary btn-sm" type="submit">Search</button>
                    </div>
                </div>
            </form>
            <a href="{{ route('blogs.create') }}" class="btn btn-primary btn-sm" style="float: right;">Create New Blog</a>
        </div>

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
                        <td><a href="{{ route('blogs.show', $blog->id) }}" class="btn btn-primary btn-sm">Show</a></td>
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
