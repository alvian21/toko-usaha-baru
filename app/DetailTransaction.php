<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailTransaction extends Model
{
    protected $fillable = ['item_id', 'sales_transaction_id', 'jumlah_barang', 'nama_barang', 'harga'];

    public function sales()
    {
        return $this->belongsTo('App\SalesTransaction');
    }
    public function item()
    {
        return $this->belongsTo('App\Item');
    }
}
