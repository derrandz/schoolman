<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        Role::create(['name' => 'SUPERADMIN', 'display_name' => 'Super Admin', 'description' => 'This user has the access level of a super admin.',]);
	    Role::create(['name' => 'ADMIN', 'display_name' => 'Admin', 'description' => 'This user has the access level of an admin.',]);
	    Role::create(['name' => 'ASSISTANT', 'display_name' => 'Assisant', 'description' => 'This user has the access level of an assistant',]);
	    Role::create(['name' => 'TEACHER', 'display_name' => 'Teacher', 'description' => 'This user has the access level of a teacher.',]);
	    Role::create(['name' => 'PARENT', 'display_name' => 'Parent', 'description' => 'This user has the access level of a parent.',]);
    }
}
