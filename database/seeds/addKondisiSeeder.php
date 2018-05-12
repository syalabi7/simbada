<?php

use Illuminate\Database\Seeder;

class addKondisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kondisi_barangs')->insert([
            [
                'id' => null,
                'nama_kondisi' => 'Baik',
            ],[
                'id' => null,
                'nama_kondisi' => 'Rusak Ringan',
            ],[
                'id' => null,
                'nama_kondisi' => 'Rusak Berat',
            ]
        ]);
    }
}
