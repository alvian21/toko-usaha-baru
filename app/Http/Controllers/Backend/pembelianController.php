<?php

namespace App\Http\Controllers\Backend;

use App\Employee;
use App\Http\Controllers\Controller;
use App\Item;
use Illuminate\Http\Request;
use App\Purchase;
use App\Supplier;
use App\SafetyStok;
use Illuminate\Support\Facades\DB;

class pembelianController extends Controller
{
    public function index()
    {
        $purchase = Purchase::all();
        return view('dashboard.purchase.pembelian', compact('purchase'));
    }


    public function create()
    {
        $item = Item::all();
        $employee = Employee::all();
        $supplier = Supplier::all();
        // dd($item);
        return view('dashboard.purchase.create',compact('item','employee','supplier'))->with('status', 'Data berhasil ditambah!');
    }


    public function store(Request $request)
    {


        $item = $request->get('item_id');

        foreach ($item as $key => $value) {
            $purchase = new Purchase();
            $purchase->item_id = $value;
            $purchase->jumlah = $request->get('jumlah');
            $purchase->supplier_id = $request->get('supplier_id');
            $purchase->employee_id = $request->get('employee_id');
            $purchase->save();
        }


        return redirect('/admin/purchase');
    }


    public function edit(Purchase $purchase)
    {
        $item = Item::all();
        $employee = Employee::all();
        $supplier = Supplier::all();
        return view('dashboard.purchase.edit',compact('purchase','item','employee','supplier'));
    }


    public function update(Request $request, Purchase $purchase)
    {
        $data = $request->all();
        if (count($data['item_id']) > 0) {
            foreach ($data['item_id'] as $item => $value) {
                $data2 = array(
                    'employee_id' => $data['employee_id'],
                    'supplier_id' => $data['supplier_id'],
                    'item_id' => $data['item_id'][$item],
                    'jumlah' => $data['jumlah'][$item],
                );
                Purchase::create($data2);
            }
        }

        return redirect('/admin/purchase')->with('status', 'Data berhasil diubah');
    }


    public function formPembelian()
    {
        $form = Purchase::select('id,', 'item_id', 'supplier_id', 'jumlah')
            ->groupBy('id,', 'item_id', 'supplier_id', 'jumlah')
            ->get();
        return view('dashboard.purchase.formpembelian', compact('form'));
    }
}
