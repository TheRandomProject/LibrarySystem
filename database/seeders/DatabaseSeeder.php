<?php

namespace Database\Seeders;

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
        $this->call(StudentSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(BookSeeder::class);
        $this->call(GenreSeeder::class);
        $this->call(LibrarianSeeder::class);
    }
}
