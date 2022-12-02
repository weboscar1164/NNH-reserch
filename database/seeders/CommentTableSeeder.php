<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentTableSeeder extends Seeder
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
            $rand_topic = rand(4, 6);
            if ($rand_topic === 4) {
                $rand_answer = rand(1, 5);
            } elseif ($rand_topic === 5) {
                $rand_answer = rand(1, 2);
            } elseif ($rand_topic === 6) {
                $rand_answer = rand(1, 4);
            }
            $rand_comment = rand(0, 1) ? 'ここにコメントが入ります。' : null;
            DB::table('comments')->insert([
                'topic_id' => $rand_topic,
                'user_id' => rand(1, 10),
                'answer' => $rand_answer,
                'comment_body' => $rand_comment,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }
}