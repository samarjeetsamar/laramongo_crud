@extends('layouts.fullwidth')

@section('title', $post->title)

@section('content')
    <div class="card p-2">
        <div class="card-body">
            <h1 class="card-title mb-3">{{ $post->title }}</h1>
            <img src="{{ $post->image }}" alt="{{ $post->title }}" class="img-fluid"/>
            <p class="card-text py-4">{{ $post->content }}</p>
            <hr>
            <div class="author-info">
                <div class="author-name">
                    <h4>{{ $post->user->name }}</h4>
                </div>
            </div>
        </div>
    </div>

@endsection
