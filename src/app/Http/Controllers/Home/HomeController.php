<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;

class HomeController extends Controller
{
  public function index()
  {
    $posts = Post::orderBy('created_at', 'desc')->simplePaginate(3);

    return view('home.index', [
      'posts' => $posts
    ]);
  }
}
