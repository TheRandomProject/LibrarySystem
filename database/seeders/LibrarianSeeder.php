<?php

namespace Database\Seeders;

use App\Models\Librarian;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class LibrarianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('librarians')->insert([
            'username' => 'John',
            'password' => Hash::make('password'),
            'email' =>  'librarian@librarian.com',
        ]);
    }
}
