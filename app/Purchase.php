<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $guarded = [];

    public function supplier()
    {
        return $this->belongsTo('App\Supplier');
    }
    public function item()
    {
        return $this->belongsTo('App\Item');
    }
    public function employee()
    {
        return $this->belongsTo('App\Employee');
    }
}
