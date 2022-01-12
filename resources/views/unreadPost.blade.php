@extends('master.layout')

@section('title', 'Unread Post')
<link rel="stylesheet" href="{{ URL::asset('css/unread.css') }}">

@section('content')
    <div class="unread-section">
        <h2 class="section-title">UNREAD POST</h2>
        <h3 class="section-subtitle">Never miss new post</h3>
    </div>

    {{-- <form method="get" action="" role="search" class="search_form">
        <input type="text" name="search" id="search" placeholder="Search.." class="textbox">
        <select name="type" id="type" class="type_select">
            <option value="name">Name</option>
            <option value="price">Price</option>
        </select>
        <input type="submit" value="Search" class="searchbtn">
    </form> --}}

    <div class="search-section">
        <form method="get" action="">
            <input class="textbox" type="text" name="search" id="search" placeholder="Topic">
            <input class="search-button" type="submit" value="Search">
        </form>
    </div>

    <div class="list-section">
        @php
            $flag = 0
        @endphp

        @foreach ($allPosts as $post)
            @if (!$readPosts->contains('posts_id', $post->id))
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
                @php
                    $flag += 1
                @endphp
            @endif

            @if ($flag > 1)
                @break
            @endif
        @endforeach

        @if ($flag == 0)
            <div class="empty-list">
                <h3 class="empty-text">No Post Yet ..</h3>
            </div>
        @endif
    </div>
@endsection
