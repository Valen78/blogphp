<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10)
    ];
});

/*$factory->define(App\Category::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->title,
    ];
});*/

$factory->define(App\Post::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->title,
        'content' => $faker->paragraph(5),
        'user_id' => rand(1,3),
        'category_id' => rand(1,2),
        'status' => (rand(1, 10) == 1) ? 'published' : 'unpublished',
        'published_at' => $faker->dateTime('now')
    ];
});

$factory->define(App\Tag::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word
    ];
});
