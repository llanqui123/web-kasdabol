<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Role;
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
        Role::create([
            'name'=>'Admin',
            'slug'=>'admin',
            'special'=>'all-access',
        ]);
        
        $user = User::create([
            'name'=>'Jhonnatan Gutierrez',
            'email'=>'llanquijhonatan@gmail.com',
            'password'=>'$2y$10$IMD/Ui2XbyQ/7GPLAjoQ2ORAx3IAww5ojm9N7ohpY7zIE6cVydEZu',
        ]);

        $user->roles()->sync(1);
    }
}
