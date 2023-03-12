@extends('layouts.fullwidth')

@section('title', 'All Posts')

@section('content')
    <h1>All Posts</h1>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach ($posts as $post)
            <div class="col">
                <div class="card h-100">
                    <img src="{{ $post->image }}" class="card-img-top" alt="{{ $post->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ Str::limit($post->content, 100) }}</p>
                        <a href="{{ route('posts.show', $post->slug) }}" class="btn btn-primary">Read More</a>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">{{ $post->created_at->diffForHumans() }}</small>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-4">
        {{ $posts->links() }}
    </div>
@endsection
