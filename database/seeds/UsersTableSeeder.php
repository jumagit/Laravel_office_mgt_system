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
        $user =   App\User::create([
            'name' =>'kat',
            'email'=>'kat@gmail.com',
            'firstname'=>'katusiime',
            'lastname' =>'serina',
            'admin' => 1,
            'added_by'=> 1,
            'password'=>bcrypt('password')
        ]);


        App\Profile::create([

            'user_id' => $user->id,
            'avatar'  => '/uploads/avatars/1.jpg',
            'about'   => 'He is an administrator to own many previlages',
         

        ]);
    }
}
