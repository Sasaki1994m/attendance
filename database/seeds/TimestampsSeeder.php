<?php

use Illuminate\Database\Seeder;

class TimestampsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //timestampsテーブルにテストデータを登録
        // $this->call(timestamps_tableSeeder::class);
        $params = [
            'user_id' => '1',
            'punch_in' => '2020-09-13 08:55:07',
            'punch_out' => '2020-09-13 18:05:09',
        ];
        DB::table('timestamp')->insert($params);

        $params = [
            'user_id' => '2',
            'punch_in' => '2020-09-13 08:49:10',
            'punch_out' => '2020-09-13 18:10:09',
        ];
        DB::table('timestamp')->insert($params);
        
        $params = [
            'user_id' => '3',
            'punch_in' => '2020-09-13 08:53:15',
            'punch_out' => '2020-09-13 18:20:09',
        ];
        DB::table('timestamp')->insert($params);
    }
    
}
