<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LikesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();

        for ($i = 1; $i <= 100; $i++) {
            DB::table('likes')->insert([
                'topic_id' => rand(1, 10),
                'user_id' => rand(1, 10),
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }
}