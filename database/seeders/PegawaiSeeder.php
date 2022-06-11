<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\facades\DB;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pegawais')->insert([
            'Nama'=> 'Burhanuddin',
            'No_HP'=> '081226555122',
            'Alamat'=> 'Semanggi',
            'Gender'=> 'Laki-Laki',
        ]);
    }
}
