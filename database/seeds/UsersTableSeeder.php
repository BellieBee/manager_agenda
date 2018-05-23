<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use App\Role;
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
        DB::table('users')->delete();
        
        $user = User::create([
        	'name' => 'Bon Jovi',
        	'email' => 'admin@example.com',
        	'password' => bcrypt('admin123')
        ]);
        
    }
}
