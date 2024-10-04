@extends('layouts.app')


@section('content')
    <div class="container">
        <h1>Blogs</h1>
        <a href="{{ route('blogs.create') }}" class="btn btn-primary">Create New Blog</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                @foreach($blogs as $blog)
                    <tr>
                        <td><a href="{{ route('blogs.show', $blog->id) }}">{{ $blog->title }}</a></td>
                        <td>{{ $blog->content }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
