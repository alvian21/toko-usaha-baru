<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['nama_barang','harga','stok'];

    public function safetystok()
    {
        return $this->hasOne('App\SafetyStok');
    }
    public function purchase()
    {
        return $this->hasMany('App\Purchase');
    }
    public function detail()
    {
        return $this->hasMany('App\DetailTransaction');
    }
}
