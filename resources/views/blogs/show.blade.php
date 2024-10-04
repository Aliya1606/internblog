@extends('layouts.app')

@section('content')
<style>
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f4e1d3; /* Light nude background */
        color: #333;
    }
    .container {
        max-width: 600px;
        margin: 50px auto;
        background-color: #ffffff; /* White background for the card */
        padding: 40px;
        border-radius: 10px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }
    h1 {
        font-size: 28px;
        color: #c19a8d; /* Soft nude color */
        margin-bottom: 20px;
    }
    p {
        font-size: 16px;
        line-height: 1.5;
        margin-bottom: 20px;
    }
    .btn-back {
        background-color: #d2b19b; /* Soft nude button color */
        color: white;
        padding: 10px 20px;
        border-radius: 5px;
        text-decoration: none;
        display: inline-block;
        transition: background-color 0.3s;
    }
    .btn-back:hover {
        background-color: #c19a8d; /* Darker nude on hover */
    }
</style>

<div class="container">
    <h1>{{ $blog->title }}</h1>
    <p><strong>Published on:</strong> {{ $blog->created_at->format('F j, Y') }}</p>
    <p>{{ $blog->content }}</p>
    <a href="{{ route('blogs.index') }}" class="btn-back">Back to Blogs</a>
</div>
@endsection
