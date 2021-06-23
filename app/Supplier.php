<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = ['nama_pemasok','alamat','email','nomor_telepon'];

    public function purchase()
    {
        return $this->hasMany('App\Purchase');
    }
}
