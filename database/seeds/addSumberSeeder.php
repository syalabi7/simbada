<?php

use Illuminate\Database\Seeder;

class addSumberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sumber_barangs')->insert([
            [
                'id' => null,
                'nama_sumber' => 'Dinas Pendidikan / APBD',
            ],[
                'id' => null,
                'nama_sumber' => 'BOS',
            ],[
                'id' => null,
                'nama_sumber' => 'Blockgrant Pusat',
            ],[
                'id' => null,
                'nama_sumber' => 'CSR / Perusahaan',
            ],[
                'id' => null,
                'nama_sumber' => 'Komite / Orang Tua Siswa',
            ]
        ]);
    }
}
