<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class FollowersController extends Controller
{
    /**
     * Follows a new user
     *
     * @param int $id user id
     * @return Response
     */
    public function follow($id)
    {
      $user = User::find(Auth::user()->id);

      $user->follows()->attach($id);

      return redirect()->route('profile',['id' => $id])->with('status', "You're follwing this user");
    }

    /**
     * Unfollow a user
     *
     * @param int $id user id
     * @return Response
     */
    public function unfollow($id)
    {
      $user = User::find($id);

      $user->followers()->detach(Auth::user()->id);

      return redirect()->route('profile',['id' => $id])->with('status', "You've stopped following the user");
    }
}
