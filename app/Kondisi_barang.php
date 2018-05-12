<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kondisi_barang extends Model
{
    protected $table = 'kondisi_barangs';
    protected $fillable = ['nama_kondisi'];

    public function aset(){
        $this->hasMany('App\Aset', 'id_kondisi', 'id');
    }
}
