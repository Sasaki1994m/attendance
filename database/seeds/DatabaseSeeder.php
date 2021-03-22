<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        // $data = [
        //     'name' => '山本一郎',
        //     'email' => 'yamamoto@info.com',
        //     'password' => 'yamamoto',
        // ];
        // DB::table('users')->insert($data);

        // $data = [
        //     'name' => '田中一郎',
        //     'email' => 'tanaka@info.com',
        //     'password' => 'tanaka',
        // ];
        // DB::table('users')->insert($data);

        // $data = [
        //     'name' => '橋本一郎',
        //     'email' => 'hashimoto@info.com',
        //     'password' => 'hashimoto',
        // ];
        // DB::table('users')->insert($data);

        //timestampsテーブルにテストデータを登録
        // $this->call(TimestampsSeeder::class);

        // $params = [
        //     'user_id' => '1',
        //     'punch_in' => '2020-09-13 08:55:07',
        //     'punch_out' => '2020-09-13 18:05:09',
        // ];

        // DB::table('timestamps')->insert($params);
        // $params = [
        //     'user_id' => '2',
        //     'punch_in' => '2020-09-13 08:49:10',
        //     'punch_out' => '2020-09-13 18:10:09',
        // ];

        // DB::table('timestamps')->insert($params);
        // $params = [
        //     'user_id' => '3',
        //     'punch_in' => '2020-09-13 08:53:15',
        //     'punch_out' => '2020-09-13 18:20:09',
        // ];
        // DB::table('timestamps')->insert($params);
    }
}
