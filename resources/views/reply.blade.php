@extends('master.layout')

@section('title', 'Reply')
<link rel="stylesheet" href="{{ URL::asset('css/post.css') }}">

@section('content')
    <div class="divider">
        <div class="left-section">
            <div class="left-profile">
                <img class="post-profile-picture" src="{{ URL::asset('images/profile_picture.png') }}" alt="">
                <h3 class="posted-by">Posted By</h3>
                <hr class="profile-line">
                <h3 class="post-profile-name">{{ $currentPost->users->name }}</h3>
                <h4 class="post-profile-role">{{ $currentPost->users->roles->name }}</h4>
            </div>
        </div>
        <div class="right-section">
            <div class="question-subsection">
                <h1 class="question-title">{{ $currentPost->title }}</h1>
                <h3 class="question-date">{{ $currentPost->created_at }}</h3>
                <p class="question-description">{{ $currentPost->description }}</p>

                <div class="question-action">
                    <p class="like-number">{{ $currentPost->likes }}</p>
                    <a class="like-button" href="">
                        <img class="like-icon" src="{{ URL::asset('images/like_button.png') }}" alt="">
                    </a>
                    <p class="dislike-number">{{ $currentPost->dislikes }}</p>
                    <a class="dislike-button" href="">
                        <img class="dislike-icon" src="{{ URL::asset('images/dislike_button.png') }}" alt="">
                    </a>
                    <a class="bookmark-button" href="">
                        @if ($bookmark)
                        <img class="bookmark-icon" src="{{ URL::asset('images/bookmarked_icon.png') }}" alt="">
                        @else
                        <img class="bookmark-icon" src="{{ URL::asset('images/bookmark_icon.png') }}" alt="">
                        @endif
                    </a>
                </div>
            </div>

            <h2 class="reply-section-title">Replies</h2>

            <div class="reply-subsection">
                <form class="reply-form" action="">
                    <input type="text" name="" id="">
                    <textarea name="" id="" cols="30" rows="10"></textarea>

                    <div class="question-action">
                        <input type="submit" value="reply">
                    </div>
                </form>
            </div>

            @if ($currentReplies->isEmpty())
                <div class="reply-subsection">
                    <h3 class="empty-text">Be the first to reply!</h3>
                </div>
            @else
                @foreach ($currentReplies as $reply)
                    <div class="reply-subsection">
                        <h1 class="reply-title">TEST</h1>
                        <h3 class="reply-date">{{ $currentPost->created_at }}</h3>
                        <p class="reply-description">TEST</p>

                        <div class="question-action">
                            <p class="like-number">{{ $currentPost->likes }}</p>
                            <a class="like-button" href="">
                                <img class="like-icon" src="{{ URL::asset('images/like_button.png') }}" alt="">
                            </a>
                            <p class="dislike-number">{{ $currentPost->dislikes }}</p>
                            <a class="dislike-button" href="">
                                <img class="dislike-icon" src="{{ URL::asset('images/dislike_button.png') }}" alt="">
                            </a>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
