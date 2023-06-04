<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		/*
        User::create([
          'name'      => 'Administrador',
		  'username'  => 'admin',
          'email'     => 'suporte@malwarechecker.com.br',
          'password'  => bcrypt('P@ssw0rd'),
      ]);

   
	
        User::create([
            'name'      => 'Jonata',
			'username'  => 'bluecase',
            'email'     => 'Jonata@malwarechecker.com.br',
            'password'  => bcrypt('bluecase01$%#@#'),
        ]);




 User::create([
            'name'      => 'Jefferson',
			'username'  => 'jefferson',
            'email'     => 'Jeferson@malwarechecker.com.br',
            'password'  => bcrypt('jefferson$%#@#'),
        ]);

*/

     User::create([
            'name'      => 'Tiago',
			'username'  => 'teste20',
            'email'     => 'teste20@malwarechecker.com.br',
            'password'  => bcrypt('teste@20'),
        ]);


    }
	
	
}
