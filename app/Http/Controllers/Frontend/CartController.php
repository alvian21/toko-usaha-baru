<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Item;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item = Item::all();
        return view("frontend.cart.index", ['item' => $item]);
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
        if (Auth::guard('frontend')->check()) {
            $item = Item::find($request->get('id'));

            $idUser = Auth::guard('frontend')->user()->id;
            $arr = [];
            if (session()->has('cart')) {
                $cart = session('cart');

                $status = false;
                foreach ($cart as $key => $value) {
                    if ($value['id_barang'] == $request->get('id')) {
                        $value['qty'] = $request->get('qty') + $value['qty'];
                        $status = true;
                        array_push($arr, $value);
                    } else {
                        array_push($arr, $value);
                    }
                }

                if (!$status) {
                    $cart = [
                        'id_user' => $idUser,
                        'id_barang' => $request->get('id'),
                        'qty' => $request->get('qty'),
                        'harga' => $item->harga,
                        'total' => $request->get('qty') * $item->harga
                    ];
                    array_push($arr, $cart);
                }
                session(['cart' => $arr]);

                session()->save();
            } else {
                $cart = [
                    'id_user' => $idUser,
                    'id_barang' => $request->get('id'),
                    'qty' => $request->get('qty'),
                    'harga' => $item->harga,
                    'total' => $request->get('qty') * $item->harga
                ];
                array_push($arr, $cart);
                session(['cart' => $arr]);
            }



            $data = '<i class="fas fa-shopping-cart"
            data-count="1"></i>' . count($arr);

            echo $data;
        } else {
            echo 'false';
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}
