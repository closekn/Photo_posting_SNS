<?php

namespace App\Http\Controllers\Favorite;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Favorite;

class FavoriteController extends Controller
{
  public function create(Request $request)
  {
    if ( !Auth::check() ) { return redirect('/login'); }
    if ( $request->post_id == NULL ) { return back(); }

    $newFavorite = Favorite::firstOrCreate([
      'user_id' => Auth::id(),
      'post_id' => $request->post_id,
    ]);

    return back();
  }

  public function delete(Request $request)
  {
    if ( !Auth::check() ) { return redirect('/login'); }

    $deleteFavorite = Favorite::where('user_id', Auth::id())
                                ->where('post_id', $request->post_id)
                                ->first();
    
    if ( $deleteFavorite != NULL ) {
      Favorite::destroy($deleteFavorite->id);
    }

    return back();
  }
}