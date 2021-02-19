<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'Grumbles',
            'firstname' => 'oyuioyuio',
            'lastname' => 'vtyvty',
            'contact' => '789789',
            'password' => Hash::make('password'),
            'email' =>  'student@student.com'

        ]);
    }
}
