<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Finance extends Model
{
    protected $fillable = ['nama_keuangan','jenis_keuangan','tgl_keuangan'];
}
