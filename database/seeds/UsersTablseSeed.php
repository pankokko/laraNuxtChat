<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
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
                'id'            => 1,
                'name'          => 'テスト管理者',
                'email'         => 'test@gmail.com',
                //password = 5927ffpa
                'password'      => '$2y$10$dHf/O4cuG.WR/4xSzPSuV.jw89w/cVv2Z.b4l80VNquJ3aM7UOabS'
            ],
        ]);    }
}
