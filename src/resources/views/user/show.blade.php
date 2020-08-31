@extends('layouts.main')

@section('content')
  <div class="user-content">

    <div class="user-content-info">
      <img src="{{ $user->icon }}" class="user-content-icon">
      <div class="user-content-name">{{ $user->name }}</div>
      <div class="user-content-fav">
        <small>Get <i class="fas fa-star" style="color: gold;"></i></small>
        <br>{{ $user->getFavorites->count() }}
      </div>
    </div>

    <div class="tab_wrap">
      <input id="tab1" type="radio" name="tab_btn" checked>
      <input id="tab2" type="radio" name="tab_btn">

      <div class="tab_area">
        <label class="tab1_label" for="tab1">
          Posts&nbsp;
          <small>
            <i class="fas fa-camera"></i>
            {{ $user->posts->count() }}
          </small>
        </label>
        <label class="tab2_label" for="tab2">
          Favorites&nbsp;
          <small>
            <i class="fas fa-star" style="color: gold;"></i>
            {{ $favorites->count() }}
          </small>
        </label>
      </div>
      <div class="panel_area">
        <!-- posts -->
        <div id="panel1" class="tab_panel">
          @if ($user->posts->count() == 0)
            <div class="home-content">
              <p class="no-content">No posts.</p>
            </div>
          @else
            <div class="user-photo-content">
              @foreach ($user->posts->sortByDesc('created_at') as $post)
                <div>
                  <a href="/post/{{ $post->id }}">
                    <img src="{{ $post->photo }}">
                  </a>
                </div>
              @endforeach
            </div>
          @endif
        </div>
        <!-- favorites -->
        <div id="panel2" class="tab_panel">
          <div class="home-content">
            @if ($favorites->count() == 0)
              <p class="no-content">No favorites.</p>
            @endif
            @foreach ($favorites as $fav)
              <div class="home-post">
                <div class="post-head">
                  <a href="/user/{{ $fav->post->user->id }}"><img src="{{ $fav->post->user->icon }}" class="post-user-icon"></a>
                  <a href="/user/{{ $fav->post->user->id }}" class="post-user-name">{{ $fav->post->user->name }}</a>
                  <div class="post-head-sub-items">
                    <small class="post-time">{{ $fav->post->created_at }}</small>
                  </div>
                </div>
                <a href="/post/{{ $fav->post->id }}"><img src="{{ $fav->post->photo }}" class="post-photo"></a>
                <div class="post-foot">
                  <p class="post-caption">{!! nl2br(e($fav->post->caption)) !!}</p>
                  <div class="post-favorite-items">
                    @if ( Auth::check() )
                      @if ( $fav->post->isFavoritedByAuthUser() )
                      <form action="/favorite/delete" method="post" name="deleteFavorite{{ $fav->post->id }}" class="post-good-form">
                        {{ csrf_field() }}
                        <input type="hidden" name="post_id" value="{{ $fav->post->id }}">
                        <a href="javascript:deleteFavorite{{ $fav->post->id }}.submit()"><i class="fas fa-star" style="color: gold;"></i></a>
                      </form>
                      @else
                      <form action="/favorite/create" method="post" name="createFavorite{{ $fav->post->id }}" class="post-good-form">
                        {{ csrf_field() }}
                        <input type="hidden" name="post_id" value="{{ $fav->post->id }}">
                        <a href="javascript:createFavorite{{ $fav->post->id }}.submit()"><i class="far fa-star" style="color: gray;"></i></a>
                      </form>
                      @endif
                    @else
                      <i class="far fa-star" style="color: gray;"></i>
                    @endif
                    <a href="/post/{{ $fav->post->id }}/favorites" class="post-good-user">いいねしたユーザ</a>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
    
  </div>
@endsection
