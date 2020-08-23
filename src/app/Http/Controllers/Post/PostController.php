<?php

namespace App\Http\Controllers\Post;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;

class PostController extends Controller
{
  public function favorites($post_id)
  {
    $favorites = Post::find($post_id)->favorites;

    return view('post.favorites', [
      'favorites' => $favorites
    ]);
  }
}