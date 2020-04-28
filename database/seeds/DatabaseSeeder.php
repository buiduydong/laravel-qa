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
        $users = factory(App\User::class, 3)
           ->create()
           ->each(function ($user) {
            $user->questions()->createMany(
                factory(App\Question::class, 3)->make()->toArray()
            );
        });
    }
}
