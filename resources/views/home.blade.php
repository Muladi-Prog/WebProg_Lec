@extends('master.layout')

@section('title', 'Home')
<link rel="stylesheet" href="{{ URL::asset('css/home.css') }}">

@section('content')
    <div class="banner-section">
        <img class="forum-icon" src="{{ URL::asset('images/forum.png') }}" alt="">
        <h2 class="banner-title">BINUS FORUM | YOUR GATEWAY TO SUCCESS</h2>
    </div>

    {{-- Guest --}}
    @guest
        <div class="feature-section">
            <h2 class="feature-title">Features</h2>
            <div class="feature-list">
                <div class="feature-box">
                    <img class="feature-icon" src="{{ URL::asset('images/post.png') }}" alt="">
                    <h3 class="feature-label">Post & Reply<br> Forum Discussions</h3>
                </div>
                <div class="feature-box">
                    <img class="feature-icon" src="{{ URL::asset('images/bookmark.png') }}" alt="">
                    <h3 class="feature-label">Bookmark Forum Posts</h3>
                </div>
                <div class="feature-box">
                    <img class="feature-icon" src="{{ URL::asset('images/unreadMessage.png') }}" alt="">
                    <h3 class="feature-label">View Unread Forums Posts</h3>
                </div>
            </div>
        </div>

        <div class="get-started-section">
            <div class="get-started-left-section">
                <img class="get-started-img" src="{{ URL::asset('images/getStarted.jpg') }}" alt="">
            </div>
            <div class="get-started-right-section">
                <h2 class="get-started-label">Come and join the greatest private university community</h2>
                <a href="/register" class="get-started-button">Get Started</a>
            </div>
        </div>
    @endguest

    {{-- Logged --}}
    @auth
        {{-- Student --}}
        @if ($user->roles->name == "Student")
            <div class="unread-section">
                <h2 class="unread-title">Unread Post</h2>
                <hr class="title-line">

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

                <div class="more-section">
                    <a href="{{ URL('/unread_post') }}" class="more-button">more >></a>
                </div>
            </div>

            <div class="bookmark-section">
                <h2 class="bookmark-title">Bookmarked Post</h2>
                <hr class="title-line">

            @if ($bookmarkPosts->isEmpty())
                <div class="empty-list">
                    <h3 class="empty-text">No Post Yet ..</h3>
                </div>
            @else
                @foreach ($bookmarkPosts as $post)
                    <a href="/post/{{ $post->posts_id }}" class="bookmark-post">
                        <div class="post-detail">
                            <h3 class="post-title">{{ $post->posts->title }}</h3>
                            <h4 class="post-profile-name">Posted by: {{ $post->users->name }}</h4>
                        </div>

                        <div class="post-profile">
                            <p class="like-number">{{ $post->posts->likes }}</p>
                            <img class="like-icon" src="{{ URL::asset('images/like_button.png') }}" alt="">
                            <p class="dislike-number">{{ $post->posts->dislikes }}</p>
                            <img class="dislike-icon" src="{{ URL::asset('images/dislike_button.png') }}" alt="">
                        </div>
                    </a>
                @endforeach
            @endif
            

                <div class="more-section">
                    <a href="{{ URL('/bookmark_post') }}" class="more-button">more >></a>
                </div>
            </div>
            {{-- Read post --}}
            <div class="bookmark-section">
                <h2 class="bookmark-title">Read Post</h2>
                <hr class="title-line">

            @if ($readPosts->isEmpty())
                <div class="empty-list">
                    <h3 class="empty-text">No Post Yet ..</h3>
                </div>
            @else
            @php
                $limit = 0;
            @endphp
                @foreach ($readPosts as $post)
                @if ($limit < 5)
                    
                <a href="/post/{{ $post->posts_id }}" class="bookmark-post">
                    <div class="post-detail">
                        <h3 class="post-title">{{ $post->posts->title }}</h3>
                        <h4 class="post-profile-name">Posted by: {{ $post->users->name }}</h4>
                    </div>

                    <div class="post-profile">
                        <p class="like-number">{{ $post->posts->likes }}</p>
                        <img class="like-icon" src="{{ URL::asset('images/like_button.png') }}" alt="">
                        <p class="dislike-number">{{ $post->posts->dislikes }}</p>
                        <img class="dislike-icon" src="{{ URL::asset('images/dislike_button.png') }}" alt="">
                    </div>
                </a>
                @endif
                    @php
                        $limit+=1;
                    @endphp
                @endforeach
            @endif

                <div class="more-section">
                    <a href="{{ URL('/read_post') }}" class="more-button">more >></a>
                </div>
            </div>


            {{-- readPosts --}}


        {{-- Lecturer --}}
        @elseif ($user->roles->name == "Lecturer")
                {{--

                -Notification in the form of a forum reminder that has not been created according to
                the lecture session.
                - Displays the names of people who have not done on the forum based on their class.
                - Displays the number of people who have replied to the forum.
                - Can give likes or dislikes for all student forum posts.
                    --}}
            {{--  --}}
            {{-- <div class = "container  mt-3">
                <h2>Forum created</h2>
                <div class = "card" style="width:600px">
                    <div class= card-body>
                        <div class = "card-title">



                        </div>
                    </div>
                </div>
            </div> --}}

            {{-- create new forum --}}
            {{-- <div>

                <button></button>
            </div> --}}

            <div class="unread-section">
                <h2 class="unread-title">Unread Post</h2>
                <hr class="title-line">

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

                <div class="more-section">
                    <a href="{{ URL('/unread_post') }}" class="more-button">more >></a>
                </div>
            </div>

            <div class="bookmark-section">
                <h2 class="bookmark-title">Bookmarked Post</h2>
                <hr class="title-line">

            @if ($bookmarkPosts->isEmpty())
                <div class="empty-list">
                    <h3 class="empty-text">No Post Yet ..</h3>
                </div>
            @else
                @foreach ($bookmarkPosts as $post)
                    <a href="/post/{{ $post->posts_id }}" class="bookmark-post">
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

                <div class="more-section">
                    <a href="{{ URL('/bookmark_post') }}" class="more-button">more >></a>
                </div>
            </div>

        {{-- Admin --}}
        @elseif ($user->roles->name == "Admin")
        <div class="unread-section">
            <h2 class="unread-title">Unread Post</h2>
            <hr class="title-line">

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

            <div class="more-section">
                <a href="{{ URL('/unread_post') }}" class="more-button">more >></a>
            </div>
        </div>

        <div class="bookmark-section">
            <h2 class="bookmark-title">Bookmarked Post</h2>
            <hr class="title-line">

        @if ($bookmarkPosts->isEmpty())
            <div class="empty-list">
                <h3 class="empty-text">No Post Yet ..</h3>
            </div>
        @else
            @foreach ($bookmarkPosts as $post)
                <a href="/post/{{ $post->posts_id }}" class="bookmark-post">
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

            <div class="more-section">
                <a href="{{ URL('/bookmark_post') }}" class="more-button">more >></a>
            </div>
        </div>

        @endif
    @endauth
@endsection
