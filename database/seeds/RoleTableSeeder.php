<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->delete();

        $admin = new Role();
        $admin->name = 'Administrator';
        $admin->display_name = 'Administrator';
        $admin->description = 'Administrator of system.';
        $admin->save();

        $owner = new Role();
        $owner->name = 'Owner';
        $owner->display_name = 'Owner';
        $owner->description = 'Foreign of system.';
        $owner->save();

        $user = User::where('name', 'Bon Jovi')->first();
        $user->attachRole($admin);

    }
}
