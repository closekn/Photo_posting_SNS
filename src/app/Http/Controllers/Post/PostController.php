<?php

namespace App\Http\Controllers\Post;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class PostController extends Controller
{
  public function index()
  {
    $posts = Post::orderBy('created_at', 'desc')->simplePaginate(10);

    return view('post.index', [
      'posts' => $posts
    ]);
  }

  public function show($post_id)
  {
    return view('post.show', [
      'post' => Post::find($post_id)
    ]);
  }

  public function create()
  {
    return view('post.create');
  }

  public function store(Request $request)
  {
    if ( !Auth::check() ) { return redirect('/'); }

    $this->validate($request, [
      'photo' => [
        'required',
        'file',
        'image',
        'mimes:jpeg,png,gif',
      ],
      'caption' => [
        'required',
        'min:1',
        'max:200',
      ]
    ]);

    $photo = 'data:image/png;base64,'.base64_encode(file_get_contents($request->photo->getRealPath()));
    Post::create([
      'user_id' => Auth::id(),
      'photo' => $photo,
      'caption' => $request->caption,
    ]);

    return redirect('/');
  }

  public function delete($post_id)
  {
    if ( Post::find($post_id) == NULL ) { return redirect('/'); }
    if ( Auth::id() != Post::find($post_id)->user_id ) { return redirect('/'); }

    Post::destroy($post_id);

    return redirect('/');
  }

  public function favorites($post_id)
  {
    $favorites = Post::find($post_id)->favorites;

    return view('post.favorites', [
      'favorites' => $favorites
    ]);
  }
}