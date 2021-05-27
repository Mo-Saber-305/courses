<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Track;
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'type' => $faker->randomElement(['user', 'admin']),
        'image' => 'default_user.jpg',
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
        'score' => rand(100, 200),
    ];
});

// track
$factory->define(Track::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
    ];
});

// course
$factory->define(\App\Models\Course::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'description' => $faker->paragraph,
        'link' => $faker->url,
        'image' => 'course_default.jpg',
        'status' => $faker->randomElement([0, 1]),
        'track_id' => Track::all()->random()->id,
    ];
});

// video
$factory->define(\App\Models\Video::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'link' => $faker->url,
        'course_id' => \App\Models\Course::all()->random()->id,
    ];
});

// quiz
$factory->define(\App\Models\Quiz::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'course_id' => \App\Models\Course::all()->random()->id,
    ];
});

// question
$factory->define(\App\Models\Question::class, function (Faker $faker) {
    $answers = $faker->randomElements($faker->words(10), 4);
    $right_answer = $faker->randomElement($answers);
    return [
        'title' => $faker->sentence,
        'answers' => json_encode($answers),
        'right_answer' => $right_answer,
        'score' => $faker->randomElement([5, 10, 15, 20]),
        'quiz_id' => \App\Models\Quiz::all()->random()->id,
    ];
});
