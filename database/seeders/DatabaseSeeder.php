<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\pengaduan;
use App\Models\tanggapan;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt('password'),
            'level' => 'SUPERADMIN'
        ]);

        User::create([
            'nik' => '32201921819382',
            'name' => 'Musthafa Hanif',
            'email' => 'musthafahanif2005@gmail.com',
            'hp' => '0817128128123',
            'password' => bcrypt('password'),
            'level' => 'ADMIN'
        ]);

        User::create([
            'nik' => '30182513812918',
            'name' => 'Udin Bahrudin',
            'email' => 'gamingtobat@gmail.com',
            'hp' => '0867162712171',
            'password' => bcrypt('password'),
            'level' => 'USER'
        ]);

        User::create([
            'nik' => '30012751541271',
            'name' => 'Wildan Gaming',
            'email' => 'wiljimmie@gmail.com',
            'hp' => '0857129341212',
            'password' => bcrypt('password'),
            'level' => 'USER'
        ]);

        User::create([
            'nik' => '30012048711231',
            'name' => 'Faisal',
            'email' => 'mohfaisal@gmail.com',
            'hp' => '0877199121388',
            'password' => bcrypt('password'),
            'level' => 'USER'
        ]);

        pengaduan::create([
            'userID' => 2,
            'name' => 'Udin Bahrudin',
            'laporan' => 'ada pohon jatuh uy, mohon diangkat',
            'image' => '20220916102402.jpg',
            'status' => 'belum di proses'
        ]);

        pengaduan::create([
            'userID' => 2,
            'name' => 'Udin Bahrudin',
            'laporan' => 'banjir masuk ke sekolah, tolong dibersihkan kali nya',
            'image' => '20220916102421.jpg',
            'status' => 'sedang di proses',
            'update' => '2022-09-16'
        ]);

        pengaduan::create([
            'userID' => 3,
            'name' => 'Wildan Gaming',
            'laporan' => 'aduh plafon sekolahan sudah berlubang, mohon bantuannya pak',
            'image' => '20220916102458.jpg',
            'status' => 'sudah di proses',
            'update' => '2022-09-15'
        ]);

        pengaduan::create([
            'userID' => 3,
            'name' => 'Wildan Gaming',
            'laporan' => 'jalanan berlubang bikin riweh sendiri kalo lagi naik motor',
            'image' => '20220916102519.jpg',
            'status' => 'sudah di proses',
            'update' => '2022-09-01'
        ]);

        tanggapan::create([
            'pengaduanID' => 4,
            'tanggapan' => 'baik jalanan tersebut sudah diperbaiki',
            'update' => '2022-09-16'
        ]);

        tanggapan::create([
            'pengaduanID' => 3,
            'tanggapan' => 'sudah diperbaiki, terimakasih atas informasinya',
            'update' => '2022-09-16'
        ]);

        tanggapan::create([
            'pengaduanID' => 2,
            'tanggapan' => 'baik akan kami telusuri masalahnya',
            'update' => '2022-09-16'
        ]);
    }
}
