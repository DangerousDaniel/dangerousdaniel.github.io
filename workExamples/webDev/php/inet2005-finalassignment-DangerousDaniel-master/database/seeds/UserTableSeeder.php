<?php

use App\Lists;
use App\User;
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
        $user1 = new User();
        $user1->name = 'Daniel';
        $user1->email = 'daniel@mail.com';
        $user1->password = bcrypt('xew125674');
        $user1->save();
    }
}
