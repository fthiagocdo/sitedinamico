<?php

use Illuminate\Database\Seeder;
use App\User;

class PapelUserSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(!User::where('email', '=', 'admin@mail.com')->first()->existeAdmin()){
        	User::where('email', '=', 'admin@mail.com')->first()->adicionarPapel('admin');
        }
    }
}
