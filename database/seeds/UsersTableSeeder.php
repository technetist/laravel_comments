<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\User::class, 3)->create()->each(function ($u) {
            $u->comment()->saveMany(factory(App\Models\Comment::class, rand(1, 3))->make());
        });
    }
}
