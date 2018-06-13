<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use App\Department;

class DepartmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->delete();

        $ceo = Department::create([
        	'name' => 'CEO'
        ]);

        $rrhh = Department::create([
        	'name' => 'RRHH'
        ]);

        $system = Department::create([
        	'name' => 'System'
        ]);

        $marketing = Department::create([
        	'name' => 'Marketing'
        ]);

        $janitorial = Department::create([
        	'name' => 'Janitorial Services'
        ]);

        $development = Department::create([
        	'name' => 'Web Design and Development'
        ]);
    }
}
