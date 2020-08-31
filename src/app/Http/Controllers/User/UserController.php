<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
  // user profile
  public function show($user_id)
  {
    $user = User::find($user_id);
    if ( $user == NULL ) { return back(); }

    $favorites = $user->favorites->sortByDesc('id');

    return view('user.show', [
      'user' => $user,
      'favorites' => $favorites
    ]);
  }
}