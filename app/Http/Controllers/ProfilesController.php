<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\User;

class ProfilesController extends Controller
{
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $data = [
        'user' => User::find($id),
        'comments' => Comment::where('user_id','=',$id)->paginate(10)
      ];

      return view('profiles.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
