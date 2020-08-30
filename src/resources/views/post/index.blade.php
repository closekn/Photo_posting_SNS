@extends('layouts.main')

@section('content')
  <div class="home-content">
    @foreach ($posts as $post)
      <div class="home-post">
        <p>
          <a href="/user/{{ $post->user->id }}" class="post-user-name">{{ $post->user->name }}</a>
          <small class="post-time">{{ $post->created_at }}</small>
        </p>
        <img src="{{ $post->photo }}" class="post-photo">
        <div class="post-sub">
          <p class="post-caption">{!! nl2br(e($post->caption)) !!}</p>
          <div class="post-favorite-items">
            @if ( Auth::check() )
              @if ( $post->isFavoritedByAuthUser() )
              <form action="/favorite/delete" method="post" name="deleteFavorite{{ $post->id }}" class="post-good-form">
                {{ csrf_field() }}
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                <a href="javascript:deleteFavorite{{ $post->id }}.submit()"><i class="fas fa-star" style="color: gold;"></i></a>
              </form>
              @else
              <form action="/favorite/create" method="post" name="createFavorite{{ $post->id }}" class="post-good-form">
                {{ csrf_field() }}
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                <a href="javascript:createFavorite{{ $post->id }}.submit()"><i class="far fa-star" style="color: gray;"></i></a>
              </form>
              @endif
            @else
              <i class="far fa-star" style="color: gray;"></i>
            @endif
            <a href="/post/{{ $post->id }}/favorites" class="post-good-user">いいねしたユーザ</a>
          </div>
        </div>
      </div>
    @endforeach
  </div>
  <div class="home-paging">
    {{ $posts->links('vendor.pagination.simple-default') }}
  </div>
@endsection
