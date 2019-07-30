<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class create_user extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            "email"=>"marcaosi2014@gmail.com",
            "password"=> Hash::make('senha')
        ]);
    }
}
