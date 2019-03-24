<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
  /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['text'];

  /**
     * Get the comment's formated created_at
     * value.
     *
     * @param  string  $value
     * @return string
     */
    public function getCreatedAtAttribute($value)
    {
      $date = new \DateTime($value);
      return $date->format('D M d H:i:s O Y');
    }

  /**
   * Gets a reply instance where
   * reply_id is the replying comment's id
   * and comment_id is the replied comment's
   * id.
   *
   * @return Reply instance
   */
    public function reply()
    {
      return $this->hasOne('App\Reply','reply_id');
    }

  /**
   * Returns the user who created
   * the comment.
   *
   * @return User instance
   */
    public function user()
    {
      return $this->belongsTo('App\User');
    }
}
