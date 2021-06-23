<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{

    public function purchase()
    {
        return $this->hasMany('App\Purchase');
    }
    protected $fillable = ['nama_pemasok','alamat','email','nomor_telepon','lead_time'];
}
