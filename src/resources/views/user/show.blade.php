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

    <div class="user-photo-content">
      @foreach ($user->posts->sortByDesc('created_at') as $post)
        <div>
          <a href="/post/{{ $post->id }}">
            <img src="{{ $post->photo }}">
          </a>
        </div>
      @endforeach
    </div>
    
  </div>
@endsection
