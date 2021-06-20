<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SafetyStok extends Model
{
    public function item()
    {
        return $this->belongsTo('App\Item');
    }
}
