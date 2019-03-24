<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
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
}
