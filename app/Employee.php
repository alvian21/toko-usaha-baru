<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee  extends Authenticatable
{
    public function purchase()
    {
        return $this->hasMany('App\Purchase');
    }
}
