<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        for ($i = 1; $i <= 10; $i++) {
            DB::table('users')->insert([
                'name' => 'user' . $i,
                'email' => 'user' . $i . '@gmail.com',
                'password' => bcrypt('password123'),
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }
}