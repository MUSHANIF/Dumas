<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('users')->insert([
        //     'nik' => '1234567891234567',
        //     'name' => Str::random(8),

        //     'email' => Str::random(6) . '@gmail.com',
        //     ' hp' => '23423423',
        //     'password' => Hash::make('password'),
        // ]);
    }
}
