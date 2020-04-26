<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user_admin = new Role();
        $role_user_admin->title = 'User Admin';
        $role_user_admin->save();

        $role_post_admin = new Role();
        $role_post_admin->title = 'Post Admin';
        $role_post_admin->save();

        $role_Theme_admin = new Role();
        $role_Theme_admin->title = 'Theme Admin';
        $role_Theme_admin->save();
    }
}
