<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sumber_barang extends Model
{
    protected $table = 'sumber_barangs';
    protected $fillable = ['nama_sumber'];

    public function aset(){
        $this->hasMany('App\Aset', 'id_sumber', 'id');
    }
}
