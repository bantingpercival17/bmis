<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserRoles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // First Create Admistrator Account
        $account = array(
            'name' => 'Percival Banting',
            'email' => 'banting.percival@bamis.gov.ph',
            'password' => Hash::make('bamis.dev')
        );
        $account = User::create($account);
        UserRoles::create(['user_id' => $account->id, 'role_id' => 1]);
    }
}
