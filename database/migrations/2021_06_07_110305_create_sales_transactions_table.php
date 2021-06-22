<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->nullable()->constrained();
            $table->foreignId('customer_address_id')->nullable()->constrained();
            $table->integer('total_barang');
            $table->date('tgl_transaksi');
            $table->string('bukti_pembayaran')->nullable();
            $table->string('no_resi')->nullable();
            $table->string('jasa')->nullable();
            $table->integer('ongkir')->nullable();
            $table->string('status')->nullable();
            $table->string('status_penjualan');
            $table->string('status_pembayaran')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales_transactions');
    }
}
