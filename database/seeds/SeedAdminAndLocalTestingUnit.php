<?php

use Illuminate\Database\Seeder;

class SeedAdminAndLocalTestingUnit extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SchoolsFactory::create(['name' => 'local_testing_unit', 'code' => '##1']);
        DatabaseConnection::connectTo(['database' => 'central_database']);
        User::create(['name' => 'superadmin', 'email' => 'superadmin@inventis.ma', 'password' => bcrypt('rootadminpw'), 'school_id' => 1]);
 		( User::find(1) )->attachRole( Role::find(1) );
    }
}
