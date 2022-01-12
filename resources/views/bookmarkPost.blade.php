@extends('master.layout')

@section('title', 'Bookmark Post')
<link rel="stylesheet" href="{{ URL::asset('css/bookmark.css') }}">

@section('content')
    <div class="bookmark-section">
        <h2 class="section-title">YOUR BOOKMARK</h2>
        <h3 class="section-subtitle">Save your favourite post here</h3>
    </div>

    <div class="search-section">
        <form method="get" action="">
            <input class="textbox" type="text" name="" id="" placeholder="Topic">
            <input class="search-button" type="submit" value="Search">
        </form>
    </div>

    <div class="list-section">
        @if ($bookmarkPosts->isEmpty())
            <div class="empty-list">
                <h3 class="empty-text">No Post Yet ..</h3>
            </div>
        @else
            @foreach ($bookmarkPosts as $post)
                <a href="/post/{{ $post->posts_id }}" class="bookmark-post">
                    <div class="post-profile">
                        <h3 class="post-profile-name">{{ $post->users->name }}</h3>
                        <h4 class="post-profile-role">{{ $post->users->roles->name }}</h4>
                    </div>

                    <div class="post-detail">
                        <h3 class="post-title">{{ $post->posts->title }}</h3>
                    </div>
                </a>
            @endforeach
        @endif
    </div>
@endsection
