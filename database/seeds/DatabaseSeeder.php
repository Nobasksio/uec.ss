<?php

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
        // $this->call(UsersTableSeeder::class);
//        DB::table('users')->insert([
//            'name'=>'Test testovich',
//            'email'=>'ae@rest38.ru',
//            'password'=>bcrypt('asdewq')
//        ]);
        DB::table('project')->insert([
            'name'=>'Майн Корпорасьон',
            'active'=>true,
        ]);
    }
}
