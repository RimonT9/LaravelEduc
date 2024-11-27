@extends('layouts.main')

@section('title')
Show
@endsection

@section('content')
    <div>
        <div>{{ $post->id }}. {{ $post->title }}</div>
        <div>{{ $post->post_content }}</div>
    </div>
    <div>
        <a href={{ route('post.index') }}>Back</a>
    </div>
    <div>
        <a href={{ route('post.edit', $post->id) }}>Edit</a>
    </div>
    <div>
        <form action="{{ route('post.destroy', $post->id) }}" method="post">
            @csrf
            @method('delete')
        <button type="submit" value="Delete" class="btn btn-danger">Delete</button>
        </form>
    </div>
@endsection