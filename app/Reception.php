<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reception extends Model
{
    public function supplier()
    {
        return $this->belongsTo('App\Supplier');
    }
    public function item()
    {
        return $this->belongsTo('App\Item');
    }
    public function purchase()
    {
        return $this->belongsTo('App\Purchase');
    }
}
