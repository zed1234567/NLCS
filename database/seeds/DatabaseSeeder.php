<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groups')->insert([
            ['group' => 'SMARTPHONE'],
            ['group' => 'TABLE'],
            ['group' => 'LAPTOP']
        ]);

        DB::table('users')->insert([
            'name' => 'Huỳnh Thiên',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456789')
        ]);
        
    }
}
