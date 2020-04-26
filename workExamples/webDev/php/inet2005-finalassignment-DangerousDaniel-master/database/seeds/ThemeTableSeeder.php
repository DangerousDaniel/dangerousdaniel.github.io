<?php

use App\Role;
use App\Theme;
use Illuminate\Database\Seeder;

class ThemeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $theme1 = new Theme();
        $theme1->name = 'Dark';
        $theme1->cdn_url  = 'https://stackpath.bootstrapcdn.com/bootswatch/4.4.1/darkly/bootstrap.min.css';
        $theme1->description = 'It is very dark!';
        $theme1->is_default = true;
        $theme1->created_by = 1;
        $theme1->save();
    }
}
