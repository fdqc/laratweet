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

    /**
     * Returns a list of users that are
     * following the provided user.
     *
     * @param int $id user's id
     * @return Response
     */
    public function followers($id)
    {
      $data = [
        'user' => User::findOrFail($id),
        'follows' => User::findOrFail($id)->followers,
        'title' => 'Followers'
      ];

      return view('profiles.follow',$data);
    }

    /**
     * Returns a list of users that being
     * followed by the provided user.
     *
     * @param int $id user's id
     * @return Response
     */
    public function follows($id)
    {
      $data = [
        'user' => User::findOrFail($id),
        'follows' => User::findOrFail($id)->follows,
        'title' => 'Follows'
      ];

      return view('profiles.follow',$data);
    }
}
