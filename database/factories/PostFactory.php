<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(\App\Models\Post::class, function (Faker $faker) {
    $title = $faker->sentence;
    return [
        'title' => $faker->sentence,
        'slug' => \Illuminate\Support\Str::slug($title,'-'),
        'description' => $faker->paragraph,
        'publication_date' => now()->toDate(),
        'user_id' => function(){
            return factory(\App\Models\User::class)->create()->id;
        }
    ];
});
