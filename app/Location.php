<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = 'locations';
    protected $fillable = ['id_lokasi_pusat', 'nama_lokasi'];

    public function aset(){
        $this->hasMany('App\Aset', 'id_lokasi', 'id');
    }
}