@extends('layouts.main')

@section('content')
  <div class="fav-content">
    @if ($favorites->count() == 0)
      <p class="no-content">Not favorited yet.</p>
    @endif
    @foreach ($favorites as $fav)
      <div class="fav-users">
        <p>
          <a href="/user/{{ $fav->user->id }}"><img src="{{ $fav->user->icon }}" class="fav-user-icon"></a>
          <a href="/user/{{ $fav->user->id }}" class="fav-user-name">{{ $fav->user->name }}</a>
        </p>
      </div>
    @endforeach
  </div>
@endsection
