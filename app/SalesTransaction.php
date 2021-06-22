<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalesTransaction extends Model
{
    protected $fillable = ['customer_id', 'customer_address_id', 'total_barang', 'tgl_pemesanan', 'bukti_pembayaran', 'no_resi', 'jasa', 'ongkir', 'status_penjualan', 'status_pembayaran'];

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }
}
