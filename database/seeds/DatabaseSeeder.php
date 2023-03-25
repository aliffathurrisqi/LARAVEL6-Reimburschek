<?php

use Illuminate\Database\Seeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Model\User;


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

        $user = new User();
        $user->username = 'kupril20';
        $user->name = 'Aprilyani Sanjaya';
        $user->email = 'kupril1999@gmail.com';
        $user->password = Hash::make('12345April');
        $user->position = 'Implementor';
        $user->penempatan = 'ESB Jogja';
        $user->save();

    }
}
