<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['nama_kategori'];

    public function aset(){
        $this->hasMany('App\Aset', 'id_kategori', 'id');
    }
}
