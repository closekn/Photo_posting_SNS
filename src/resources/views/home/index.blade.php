@extends('layouts.main')

@section('content')
  <div class="home-content">
    @foreach ($posts as $post)
      <div class="home-post">
        <p>
          <a href="/" class="post-user-name">{{ $post->user->name }}</a>
          <small class="post-time">{{ $post->created_at }}</small>
        </p>
        <img src="{{ $post->photo }}" class="post-photo">
        <div class="post-sub">
          <p class="post-caption">{{ $post->caption }}</p>
          <p>
            @if (true)
              <a href="/" class="post-good"><i class="far fa-star" style="color: gray;"></i></a>
            @else
              <a href="/" class="post-good"><i class="fas fa-star" style="color: gold;"></i></a>
            @endif
            <a href="/post/{{ $post->id }}/favorites" class="post-good-user">いいねしたユーザ</a>
          </p>
        </div>
      </div>
    @endforeach
  </div>
  <div class="home-paging">
    {{ $posts->links() }}
  </div>
@endsection
