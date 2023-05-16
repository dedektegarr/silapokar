<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::create([
            'nama' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'nip_nik' => '192839182731',
            'no_telp' => '0896758758473',
            'hak_akses' => 'admin',
        ]);

        \App\Models\User::create([
            'nama' => 'Super Admin',
            'email' => 'super@gmail.com',
            'password' => bcrypt('admin'),
            'nip_nik' => '192839182731',
            'no_telp' => '0896758758473',
            'hak_akses' => 'super admin',
        ]);
    }
}
