<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Divisi;

class UserKaryawanDivisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $it = Divisi::create([
            'nama' => 'it',
            'active' => 1
        ]);

        $staff_it = User::factory()->create([
            'nama' => 'staff_it',
            'email' => 'ringin@gmail.com',
        ]);
        $supervisor_it = User::factory()->create([
            'nama' => 'supervisior_it',
            'email' => 'supervisior_it@gmail.com',
        ]);
        $manager_it = User::factory()->create([
            'nama' => 'manager_it',
            'email' => 'manager_it@gmail.com',
        ]);
        

        $staff_it->atasan()->attach([
            $supervisor_it->id => ['level' => 1],
            $manager_it->id => ['level' => 2],
        ]);

        $staff_it->karyawan()->create([
            'nama' => $staff_it->nama,
            'divisi_id' => $it->id,
            'nama_divisi' => $it->nama,
            'status_karyawan' => 'tetap',
            'tanggal_masuk' => now(),
            'jenis_kelamin' => 'L'
        ]);
    
    }
}
