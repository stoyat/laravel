<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         factory(App\User::class, 5)->create()->each(function($user) {
            factory(App\Book::class, 3)->make()->each(function($book) use ($user) {
                $user->books()->save($book);
            });
        });
    }
}
