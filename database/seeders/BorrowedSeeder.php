<?php

namespace Database\Seeders;

use App\Models\Borrowed;
use Illuminate\Database\Seeder;

class BorrowedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Borrowed::factory()
            ->count(5)
            ->create();
    }
}
