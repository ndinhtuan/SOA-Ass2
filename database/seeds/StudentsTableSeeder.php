<?php

use Illuminate\Database\Seeder;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->insert(
            [
                'msv' => 1,
                'user_id' => 1,
                'teacherID' => 3,
                'name' => 'viet'
            ]
        );

        DB::table('students')->insert(
            [
                'msv' => 2,
                'user_id' => 2,
                'teacherID' => 3,
                'name' => 'tuan'
            ]
        );
        DB::table('students')->insert(
            [
                'msv' => 3,
                'user_id' => 4,
                'teacherID' => 3,
                'name' => 'tung'
            ]
        );
    }
}
