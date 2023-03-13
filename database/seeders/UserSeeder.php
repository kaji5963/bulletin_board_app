<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'impl_user',
                'email' => 'impl@impl.com',
                'password' => 'aaaaaaaa',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
