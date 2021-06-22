<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Customer extends Authenticatable
{
    public function sales()
    {
        return $this->hasMany('App\SalesTransaction');
    }
}
