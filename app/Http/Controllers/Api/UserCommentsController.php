<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Comment;

class UserCommentsController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($userId)
    {
      $commentsArray = array();

      $comments = User::findOrFail($userId)
        ->comments()
        ->orderBy('created_at','desc')
        ->limit(10)
        ->get();

      foreach ($comments as $comment) {
        $response = new \stdClass;

        $response->created_at = $comment->created_at;
        $response->text = $comment->text;

        if ($comment->reply != null) {
          $in_reply = new \stdClass;

          $in_reply->id = $comment->reply->comment_id;
          $in_reply->name = Comment::find($in_reply->id)->user->name;

          $response->in_reply = $in_reply;
        }

        array_push($commentsArray,$response);
      }

      return response()->json([
        $commentsArray
      ]);
    }
}
