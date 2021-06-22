<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\SalesTransaction;
use Illuminate\Support\Facades\Auth;
use App\DetailTransaction;
use App\Item;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = SalesTransaction::all()->where('customer_id', Auth::guard('frontend')->user()->id);

        return view("frontend.user.order.index", ['order' => $order]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $order = DetailTransaction::where('sales_transaction_id', $id)->get();
        $item = Item::all();

        return view('frontend.user.order.show', ['order' => $order, 'item' => $item]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sales = SalesTransaction::find($id);
        return view('frontend.user.order.edit', ['sales' => $sales]);
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
        $validator = Validator::make($request->all(), [
            'upload_pembayaran' => 'required|image|mimes:jpeg,png,jpg'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors());
        }else{
            $file = $request->file('upload_pembayaran');
            $name = time() . $file->getClientOriginalExtension();
            $file->move(\base_path() . "/public/bukti_pembayaran", $name);

            $sales = SalesTransaction::find($id);
            $sales->bukti_pembayaran = $name;
            $sales->save();

            return redirect()->route('order.index');
        }
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
