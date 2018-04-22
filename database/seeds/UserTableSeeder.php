<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        App\User::create(['name'=> 'sinhvien',
        'email'=>'sinhvien@gmail.com',
        'password' => bcrypt(123456),
        'level' => 1]);
        
        DB::table('users')->insert(
          
            [ 'name'=> 'loptruong',
                'email'=>'loptruong@gmail.com',
                'password' => bcrypt(123456),
                'level' => 2
            ]
        );

        DB::table('users')->insert(
         [ 'name'=> 'covan',
        'email'=>'covan@gmail.com',
        'password' => bcrypt(123456),
        'level' => 3
        ]
        );
      
    }
}
