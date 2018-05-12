<?php

use Illuminate\Database\Seeder;

class addAsetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('asets')->insert([
            'id' => null,
            'nama_aset' => 'Meja/Bangku',
            'merk' => 'IKEA',
            'tahun' => '2016',
            'keterangan' => 'Tidak ada keterangan',
            'nilai_barang' => '2000',
            'id_lokasi' => 4,
            'id_kategori' => 7,
            'id_sumber' => 3,
            'id_kondisi' => 3,
        ]);
    }
}
