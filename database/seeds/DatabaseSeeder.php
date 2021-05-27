<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);

        $users = factory(\App\Models\User::class, 30)->create();
        $tracks = factory(\App\Models\Track::class, 20)->create();
        factory(\App\Models\Course::class, 50)->create();
        factory(\App\Models\Video::class, 100)->create();
        $quizzes = factory(\App\Models\Quiz::class, 100)->create();
        factory(\App\Models\Question::class, 200)->create();

        foreach ($users as $user) {
            $tracksIds = [];
            $tracksIds[] = \App\Models\Track::all()->random()->id;
            $tracksIds[] = \App\Models\Track::all()->random()->id;
            $tracksIds[] = \App\Models\Track::all()->random()->id;
            $user->tracks()->sync($tracksIds);

            $quizzes_ids = [];
            $quizzes_ids[] = \App\Models\Quiz::all()->random()->id;
            $quizzes_ids[] = \App\Models\Quiz::all()->random()->id;
            $quizzes_ids[] = \App\Models\Quiz::all()->random()->id;
            $user->quizzes()->sync($quizzes_ids);

            $coursesIds = [];
            $coursesIds[] = \App\Models\Course::all()->random()->id;
            $coursesIds[] = \App\Models\Course::all()->random()->id;
            $coursesIds[] = \App\Models\Course::all()->random()->id;
            $coursesIds[] = \App\Models\Course::all()->random()->id;
            $coursesIds[] = \App\Models\Course::all()->random()->id;
            $user->courses()->sync($coursesIds);
        }
    }
}
