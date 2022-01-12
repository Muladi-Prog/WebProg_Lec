@extends('master.layout')

@section('title', 'category')
<link rel="stylesheet" href="{{ URL::asset('css/course.css') }}">

@section('content')
    {{-- bikin di sini --}}
    <div class="banner-section">
        <img class="forum-icon" src="{{ URL::asset('images/forum.png') }}" alt="">
        <h2 class="banner-title">{{$selected_course->name}}</h2>
    </div>

    <div class="search-section">
        <form method="get" action="" role="search" class="search-form">
            <input class="search-textbox" type="text" name="search" id="search" placeholder="Forum Topic" @error('search') is-invalid @enderror>
            <input type="submit" value="search" class="search-submit" >
        </form>
        @error('search')
            <div class="error">{{ $message }}</div>
        @enderror
    </div>

    <div class="post-section">
        @if ($posts->isEmpty())
            <div class="empty-list">
                <h3 class="empty-text">No Post Yet ..</h3>
            </div>
        @else
            @foreach ($posts as $post)
                <a href="/post/{{ $post->id }}" class="unread-post">
                    <div class="post-detail">
                        <h3 class="post-title">{{ $post->title }}</h3>
                        <h4 class="post-profile-name">Posted by: {{ $post->users->name }}</h4>
                    </div>

                    <div class="post-profile">
                        <p class="like-number">{{ $post->likes }}</p>
                        <img class="like-icon" src="{{ URL::asset('images/like_button.png') }}" alt="">
                        <p class="dislike-number">{{ $post->dislikes }}</p>
                        <img class="dislike-icon" src="{{ URL::asset('images/dislike_button.png') }}" alt="">
                    </div>
                </a>
            @endforeach
        @endif
    </div>

@endsection
