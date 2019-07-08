<?php

use Illuminate\Database\Seeder;
use App\Hotel;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=\App\User::create([


        	'name'=>'Davies Maina',
        	'email'=>'daviesmaina@outlook.com',
        	'password'=>bcrypt('admin123'),


        ]);


        $user->hotels()->create([

            'name'=> 'Jabulani Coffee Shop',
            'location'=>'Kanam-Kemer, Turkana',

        ]);

        $user->hotels()->create([

            'name'=>'Campus Cafeteria',
            'location'=>'Kalimapus, Northern Kenya',


        ]);

        $user->hotels()->create([

            'name'=>'Stegra Hotel',
            'location'=>'Kanam-Kemer,Lodwar',


        ]);

        $user->hotels()->create([

            'name'=>'The Cradle Tented Camp',
            'location'=>'Lodwar, Turkana',


        ]);
    }
}
