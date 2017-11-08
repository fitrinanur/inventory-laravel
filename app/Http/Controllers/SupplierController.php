<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;
use App\City;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::latest()->paginate(env('PER_PAGE'));

        return view('suppliers.index',compact('suppliers'));

    }
    public function search(Request $request)
    {
        $query = $request->get('supplierkey');
        $results = Supplier::where('supplier_name', 'LIKE', '%' . $query . '%')->paginate((env('PER_PAGE')));

        return view('suppliers.result', compact('results', 'query'));
    }

    public function create()
    {
        $cities = City::all();

        return view('suppliers.create',compact('cities'));
    }

    public function store(Request $request)
    {
        $file       = $request->file('image');
        $fileName   = $file->getClientOriginalName();
        $request->file('image')->move("supplier/", $fileName);

        Supplier::create([

            'supplier_name' => request('supplier_name'),
            'phone' => request('phone'),
            'email' => request('email'),
            'address' => request('address'),
            'city_id' => request('city_id'),
            'image' => $fileName
        ]);

        return redirect()->route('supplier.index');
    }

    public function edit(Supplier $supplier)
    {
        $cities = City::all();
        return view('suppliers.edit',compact('supplier','cities'));
    }

    public function update(Supplier $supplier, Request $request)
    {
        $file       = $request->file('image');
        $fileName   = $file->getClientOriginalName();
        $request->file('image')->move("supplier/", $fileName);

        $supplier->update([
            'supplier_name' => request('supplier_name'),
            'phone' => request('phone'),
            'email' => request('email'),
            'address' => request('address'),
            'city_id' => request('city_id'),
            'image' => $fileName
        ]);

        return redirect()->route('supplier.index');
    }
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        
        return redirect()->route('supplier.index');
    }
}
