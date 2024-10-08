@extends('layouts.app')


@section('content')
    <div class="container">
        <h1>Blogs</h1>
        <a href="{{ route('blogs.create') }}" class="btn btn-primary btn-sm">Create New Blog</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                </tr>
            </thead>
            <tbody>
                @foreach($blogs as $blog)
                    <tr>
                        <td>{{ $blog->title }}</a></td>
                        <td><a href="{{ route('blogs.show', $blog->id) }}" class="btn btn-primary">Show</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
