<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use App\Post;
use App\User;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
      'title' => $faker->sentence($nbWords = 6, $variableNbWords = true),
      'content' => $faker->text($maxNbChars = 200),
      'user_id' => function() {
        return factory(User::class)->create()->id;
      },
      'category_id' => function() {
        return factory(Category::class)->create()->id;
      }
    ];
});
