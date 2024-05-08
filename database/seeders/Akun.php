<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class akun extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama_petugas' => 'qwer',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('asd'),
                'id_level' => 1
            ],
            [
                'nama_petugas' => 'adi',
                'email' => 'adi@gmail.com',
                'password' => bcrypt('asd'),
                'id_level' => 2
            ],
            [
                'nama_petugas' => 'sir',
                'email' => 'sir@gmail.com',
                'password' => bcrypt('asd'),
                'id_level' => 1
            ],
        ];

        foreach($data as $key => $d)
        {
            User::create($d);
        }
    }
}
