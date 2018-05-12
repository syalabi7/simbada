<?php

use Illuminate\Database\Seeder;

class addCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'id' => null, 'nama_kategori' => 'Komputer',
            ], [
                'id' => null, 'nama_kategori' => 'Laptop',
            ], [
                'id' => null, 'nama_kategori' => 'Kursi Siswa',
            ], [
                'id' => null, 'nama_kategori' => 'Meja Siswa',
            ], [
                'id' => null, 'nama_kategori' => 'Alat Olahraga',
            ], [
                'id' => null, 'nama_kategori' => 'Alat Praktik',
            ], [
                'id' => null, 'nama_kategori' => 'Lemari Besi',
            ], [
                'id' => null, 'nama_kategori' => 'Lemari Kayu',
            ], [
                'id' => null, 'nama_kategori' => 'Locker',
            ], [
                'id' => null, 'nama_kategori' => 'Filling Cabinet',
            ], [
                'id' => null, 'nama_kategori' => 'Meja Guru',
            ], [
                'id' => null, 'nama_kategori' => 'Kursi Guru',
            ], [
                'id' => null, 'nama_kategori' => 'LCD Proyektor',
            ], [
                'id' => null, 'nama_kategori' => 'Printer',
            ], [
                'id' => null, 'nama_kategori' => 'Layar Gantung',
            ], [
                'id' => null, 'nama_kategori' => 'AC',
            ], [
                'id' => null, 'nama_kategori' => 'Alat Musik',
            ], [
                'id' => null, 'nama_kategori' => 'Kipas Angin',
            ], [
                'id' => null, 'nama_kategori' => 'Meja Kursi Tamu',
            ], [
                'id' => null, 'nama_kategori' => 'Scanner',
            ], [
                'id' => null, 'nama_kategori' => 'Mesin Fotocopy',
            ], [
                'id' => null, 'nama_kategori' => 'Barang Perpustakaan',
            ], [
                'id' => null, 'nama_kategori' => 'Atribut Negara',
            ], [
                'id' => null, 'nama_kategori' => 'Alat Kebersihan',
            ], [
                'id' => null, 'nama_kategori' => 'Kendaraan Bermotor',
            ], [
                'id' => null, 'nama_kategori' => 'Alat Perlengkapan Studio',
            ], [
                'id' => null, 'nama_kategori' => 'Alat Kesehatan',
            ], [
                'id' => null, 'nama_kategori' => 'White Board',
            ]
        ]);
    }
}
