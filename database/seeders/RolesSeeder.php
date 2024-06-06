<?php

namespace Database\Seeders;

use App\Models\Roles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $roles = array(
            array('name' => 'administrator', 'display_name' => 'Administrator'),
            array('name' => 'barangay', 'display_name' => 'Barangay Official'),
            array('name' => 'municipality', 'display_name' => 'Municipality Official'),
            array('name' => 'province', 'display_name' => 'Province Official'),
        );
        foreach ($roles as $key => $role) {
            Roles::create($role);
        }
    }
}
