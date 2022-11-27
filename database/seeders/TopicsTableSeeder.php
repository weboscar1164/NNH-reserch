<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TopicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $params = [
            [
                'title' => 'お好み焼きは何が好き？',
                'views' => 20,
                'choice1' => '豚玉',
                'choice2' => 'いか玉',
                'choice3' => 'えび玉',
                'choice4' => 'モダン焼き',
                'choice5' => '広島風',
                'answer1' => 55,
                'answer2' => 10,
                'answer3' => 30,
                'answer4' => 2,
                'answer5' => 45,
                'published' => 1,
                'user_id' => 1,
                'deleted_at' => null
            ],
            [
                'title' =>  '餃子は何が好き？',
                'views' => 10,
                'choice1' =>  '水餃子',
                'choice2' =>  '焼餃子',
                'choice3' =>  null,
                'choice4' =>  null,
                'choice5' =>  null,
                'answer1' => 55,
                'answer2' => 10,
                'answer3' => 30,
                'answer4' => 2,
                'answer5' => 45,
                'published' => 1,
                'user_id' => 2,
                'deleted_at' => null
            ],
            [
                'title' =>  '朝食の定番といえば？',
                'views' => 30,
                'choice1' =>  '卵かけご飯',
                'choice2' =>  '納豆',
                'choice3' =>  'もずく',
                'choice4' =>  '目玉焼き',
                'choice5' =>  null,
                'answer1' => 55,
                'answer2' => 10,
                'answer3' => 30,
                'answer4' => 2,
                'answer5' => 45,
                'published' => 1,
                'user_id' =>  3,
                'deleted_at' => null
            ],
            [
                'title' => 'お好み焼きは何が好き？',
                'views' => 20,
                'choice1' => '豚玉',
                'choice2' => 'いか玉',
                'choice3' => 'えび玉',
                'choice4' => 'モダン焼き',
                'choice5' => '広島風',
                'answer1' => 55,
                'answer2' => 10,
                'answer3' => 30,
                'answer4' => 2,
                'answer5' => 45,
                'published' => 1,
                'user_id' => 1,
                'deleted_at' => null
            ],
            [
                'title' =>  '餃子は何が好き？',
                'views' => 10,
                'choice1' =>  '水餃子',
                'choice2' =>  '焼餃子',
                'choice3' =>  null,
                'choice4' =>  null,
                'choice5' =>  null,
                'answer1' => 55,
                'answer2' => 10,
                'answer3' => 30,
                'answer4' => 2,
                'answer5' => 45,
                'published' => 1,
                'user_id' => 2,
                'deleted_at' => null
            ],
            [
                'title' =>  '朝食の定番といえば？',
                'views' => 30,
                'choice1' =>  '卵かけご飯',
                'choice2' =>  '納豆',
                'choice3' =>  'もずく',
                'choice4' =>  '目玉焼き',
                'choice5' =>  null,
                'answer1' => 55,
                'answer2' => 10,
                'answer3' => 30,
                'answer4' => 2,
                'answer5' => 45,
                'published' => 1,
                'user_id' =>  3,
                'deleted_at' => null
            ],
            [
                'title' =>  '非公開トピック',
                'views' => 30,
                'choice1' =>  '非公開1',
                'choice2' =>  '非公開2',
                'choice3' =>  '非公開3',
                'choice4' =>  '非公開4',
                'choice5' =>  null,
                'answer1' => 55,
                'answer2' => 10,
                'answer3' => 30,
                'answer4' => 2,
                'answer5' => 45,
                'published' => 0,
                'user_id' =>  1,
                'deleted_at' => null
            ],
            [
                'title' =>  '削除されたトピック',
                'views' => 30,
                'choice1' =>  '非公開1',
                'choice2' =>  '非公開2',
                'choice3' =>  '非公開3',
                'choice4' =>  '非公開4',
                'choice5' =>  null,
                'answer1' => 55,
                'answer2' => 10,
                'answer3' => 30,
                'answer4' => 2,
                'answer5' => 45,
                'published' => 0,
                'user_id' =>  1,
                'deleted_at' => Carbon::now()
            ],
        ];

        $now = Carbon::now();
        foreach ($params as $param) {

            DB::table('topics')->insert([
                'title' => $param['title'],
                'views' => $param['views'],
                'choice1' => $param['choice1'],
                'choice2' => $param['choice2'],
                'choice3' => $param['choice3'],
                'choice4' => $param['choice4'],
                'choice5' => $param['choice5'],
                'answer1' => $param['answer1'],
                'answer2' => $param['answer2'],
                'answer3' => $param['answer3'],
                'answer4' => $param['answer4'],
                'answer5' => $param['answer5'],
                'user_id' => $param['user_id'],
                'published' => $param['published'],
                'deleted_at' => $param['deleted_at'],
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }
}