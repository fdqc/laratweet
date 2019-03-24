<?php

use Faker\Generator as Faker;

$factory->define(App\Reply::class, function (Faker $faker) {
    return [
      'comment_id' => rand(1,10),
      'reply_id' => rand(11,15)
    ];
});
