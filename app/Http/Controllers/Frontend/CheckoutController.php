<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Item;
use App\CustomerAddress;
use App\SalesTransaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use App\DetailTransaction;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item = Item::all();
        $address = CustomerAddress::where('customer_id', Auth::guard('frontend')->user()->id)->first();


        return view("frontend.checkout.index", ['item' => $item, 'address'=>$address]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $jasaongkir = session('jasaongkir');
        // $jasa = $jasaongkir['code'];
        // $biaya = $jasaongkir['costs'][0]['cost'][0];
        // $etd = $biaya['etd'];
        // $biaya = $biaya['value'];
        // $cart = session('cart');

        // $idcust = Auth::guard('frontend')->user()->id;
        // $address = CustomerAddress::where('customer_id', $idcust)->first();

        // $total = 0;
        // $subtotal = 0;
        // foreach ($cart as $key => $value) {
        //     $total += $value['qty'];
        //     $subtotal += $value['qty'] * $value['harga'];
        // }
        // $subtotal = $biaya + $subtotal;

        // $sales = new SalesTransaction();
        // $sales->id = $this->generateNumber();
        // $sales->customer_id = $idcust;
        // $sales->customer_address_id = $address->id;
        // $sales->total_barang = $total;
        // $sales->tgl_pemesanan = date('Y-m-d');
        // $sales->no_resi = "belum ada";
        // $sales->jasa = $jasa;
        // $sales->ongkir = $biaya;
        // $sales->status_penjualan = 'online';
        // $sales->bukti_pembayaran = 'belum di upload';
        // $sales->status_pembayaran = 'belum dibayar';
        // $sales->save();


        // foreach ($cart as $key => $value) {
        //     $item = Item::find($value['id_barang']);
        //     $detail = new DetailTransaction();
        //     $detail->sales_transaction_id = $sales->id;
        //     $detail->jumlah_barang = $value['qty'];
        //     $detail->item_id = $value['id_barang'];
        //     $detail->nama_barang = $item->nama_barang;
        //     $detail->harga = $value['harga'];
        //     $detail->save();
        // }

        // $idcheckout = md5($this->generateNumber());
        // session(['id_checkout' => $idcheckout]);
        // $total = session(['total_harga' => $subtotal]);
        // session()->forget('cart');
        // return redirect('/checkout/' . $idcheckout);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $idcheckout = session('id_checkout');
        if ($idcheckout == $id) {
            return view("frontend.checkout.show");
        } else {
            return redirect('/');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

  
    public function changeQty(Request $request)
    {
        if ($request->ajax()) {
            $id = $request->get('id');
            $qty = $request->get('qty');

            $cart = session('cart');
            $arr = [];
            foreach ($cart as $key => $value) {
                if ($value['id_barang'] == $id) {
                    $value['qty'] = $qty;
                    array_push($arr, $value);
                } else {
                    array_push($arr, $value);
                }
            }

            session(['cart' => $arr]);

            session()->save();

            return response()->json([
                'message' => 'true'
            ]);
        }
    }

    public function deleteCart(Request $request)
    {
        if ($request->ajax()) {
            $id = $request->get('id');
            $cart = session('cart');
            $arr = [];
            foreach ($cart as $key => $value) {
                if ($value['id_barang'] != $id) {
                    array_push($arr, $value);
                }
            }

            session(['cart' => $arr]);

            session()->save();

            return response()->json([
                'message' => 'true'
            ]);
        }
    }

    public function generateNumber()
    {
        $i = 0;
        $tmp = mt_rand(1, 9);
        do {
            $tmp .= mt_rand(0, 9);
        } while (++$i < 14);
        return $tmp;
    }
}
