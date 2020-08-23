@extends('layouts.main')

@section('content')
  <div class="fav-content">
    @foreach ($favorites as $fav)
      <div class="fav-users">
        <p>
          <a href="/"><img src="{{ $fav->user->icon }}" class="fav-user-icon"></a>
          <a href="/" class="fav-user-name">{{ $fav->user->name }}</a>
        </p>
      </div>
    @endforeach
  </div>
@endsection
