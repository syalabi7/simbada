<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aset extends Model
{
    protected $table = 'asets';

    protected $fillable = [
        'nama_aset',
        'merk',
        'tahun',
        'keterangan',
        'nilai_barang',
        'id_lokasi',
        'id_kategori',
        'id_sumber',
        'id_kondisi',
    ];

    public function location(){
        return $this->belongsTo('App\Location', 'id_lokasi');
    }
//
    public function category(){
        return $this->belongsTo('App\Category', 'id_kategori');
    }
//
    public function kondisi_barang(){
        return $this->belongsTo('App\Kondisi_barang', 'id_kondisi');
    }

    public function sumber_barang(){
        return $this->belongsTo('App\Sumber_barang', 'id_sumber');
    }
}