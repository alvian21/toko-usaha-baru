<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['nama_barang','harga','stok'];


    public function purchase()
    {
        return $this->hasMany('App\Purchase');
    }
}
