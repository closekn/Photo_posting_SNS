@extends('layouts.main')

@section('content')
  <!-- error message -->
  @if ($errors->any())
  <div class="error-post-create">
    <strong>ERROR</strong>
    <ul>
      @foreach($errors->all() as $error)
      <li>・{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif

  <!-- Form -->
  <form action="/post" method="post" enctype="multipart/form-data">

    <div class="form-group">
      <div class="custom-file">
        <input type="file" class="custom-file-input" accept="image/*" name="photo" id="photo" onchange="viewPhotonameAndPreviewImage(this);">
        <label for="photo" class="custom-file-label" id="custom-file-label">Choose Photo</label>
      </div>
      <br>
      <img id="preview" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" style="max-width:200px;">
      </p>
      <script src="{{ asset('/js/post.create.js') }}"></script>

      <label for="caption">Caption</label>
      <textarea class="form-control" name="caption" id="caption" rows="8" placeholder="200 characters or less"></textarea>
      <br>

      {{ csrf_field() }}
      <button class="btn btn-outline-secondary">Post</button>
    </div>

  </form>
@endsection