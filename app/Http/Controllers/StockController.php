<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;
use App\Stock;
use App\Item;

class StockController extends Controller
{
    public function index()
    {
        
        $stocks = Stock::latest()->paginate(env('PER_PAGE'));
        return view('stocks.index',compact('stocks'));
    }
    
    public function create()
    {
        
        $items      = Item::all();
        $suppliers  = Supplier::all();

        return view('stocks.create',compact('items','suppliers'));
    }

    public function store(Request $request)
    {
       Stock::create([
            'item_id'       => request('item_id'),
            'supplier_id'   => request('supplier_id'),
            'stocks'        => request('stocks')
        ]);
        
        return redirect()->route('stock.index')->withSuccess('Data has been added');
    }

    public function itemsin()
    {
        $stocks      = Stock::all();
       

        return view('stocks.in',compact('stocks'));
    }
    public function update(Request $request, Stock $stocks)
    {

    }


    public function checkout_form(Request $request)
    {
        $items      = Item::all();
        $suppliers  = Supplier::all();

        return view('stocks.out',compact('items','suppliers'));
    }
}
