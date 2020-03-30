<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        DB::table('roles')->insert([
            array(
                'name' => 'Admin',
                'label' => ''
            ),
            array(
                'name' => 'Librarian',
                'label' => ''
            ),
            array(
                'name' => 'User',
                'label' => ''
            ),
        ]);
    }
}
