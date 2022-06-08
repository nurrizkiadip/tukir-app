<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // admin
        User::create([
            'name' => "Fauza",
            'email' => 'fauzafirdhan@gmail.com',
            'password' => bcrypt('password'),
        ]);

        $this->call([
            CategorySeeder::class,
            MenuSeeder::class,
            EventSeeder::class
        ]);
    }
}
