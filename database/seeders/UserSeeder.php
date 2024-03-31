<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'Admin DPP',
                'username' => 'admindpp',
                'email' => 'dpp@admin.com',
                'province_id' => 18,
                'regency_id' => 1871,
                'district_id' => 187115,
                'village_id' => 1871151001,
                'password' => bcrypt('password'),
                'status' => 'system',
            ],
            [
                'name' => 'Admin DPD',
                'username' => 'admindpd',
                'email' => 'dpd@admin.com',
                'province_id' => 18,
                'regency_id' => 1871,
                'district_id' => 187115,
                'village_id' => 1871151001,
                'password' => bcrypt('password'),
                'status' => 'system',
            ],
            [
                'name' => 'Admin DPC',
                'username' => 'admindpc',
                'email' => 'dpc@admin.com',
                'province_id' => 18,
                'regency_id' => 1871,
                'district_id' => 187115,
                'village_id' => 1871151001,
                'password' => bcrypt('password'),
                'status' => 'system',
            ],
            [
                'name' => 'Admin PAC',
                'username' => 'adminpac',
                'email' => 'pac@admin.com',
                'province_id' => 18,
                'regency_id' => 1871,
                'district_id' => 187115,
                'village_id' => 1871151001,
                'password' => bcrypt('password'),
                'status' => 'system',
            ],
            [
                'name' => 'Admin PR',
                'username' => 'adminpr',
                'email' => 'pr@admin.com',
                'province_id' => 18,
                'regency_id' => 1871,
                'district_id' => 187115,
                'village_id' => 1871151001,
                'password' => bcrypt('password'),
                'status' => 'system',
            ],
            [
                'name' => 'Admin PAR',
                'username' => 'adminpar',
                'email' => 'par@admin.com',
                'province_id' => 18,
                'regency_id' => 1871,
                'district_id' => 187115,
                'village_id' => 1871151001,
                'password' => bcrypt('password'),
                'status' => 'system',
            ]
        ];

        User::insert([
            'id' => 0,
            'name' => 'Super',
            'username' => 'super',
            'email' => 'super@super.com',
            'password' => bcrypt('password'),
            'status' => 'system',
        ]);
        User::insert($user);
    }
}
