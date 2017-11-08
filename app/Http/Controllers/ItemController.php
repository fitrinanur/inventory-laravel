<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Category;
use Cache;
class ItemController extends Controller
{
    public function index(Request $request)
    {
        $page = $request->get('page', 1);
        $cache_name = 'items' . $page;
        if (Cache::has($cache_name)){
            $items = Cache::get($cache_name);
        } else {
            $items = Item::all();
            Cache::put($cache_name, $items, 1);
        }
        $items = Item::latest()->paginate((env('PER_PAGE')));
        return view('items.index', compact('items'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('items.create',compact('categories'));
    }

    public function store(Request $request)
    {
        
        
        $this->validate(request(),[
            'name_items' => 'required',
            'category_id' => 'required',
            'descriptions' => 'required|min:10',
            'units' => 'required',
            'purchase_prices' => 'required|numeric',
            'sale_prices' => 'required|numeric',
            'image' => 'required'
        ]);
        
        $file       = $request->file('image');
        $fileName   = $file->getClientOriginalName();
        $request->file('image')->move("image/", $fileName);

        Item::create([
            'name_items' => request('name_items'),
            'category_id' => request('category_id'),
            'descriptions' => request('descriptions'),
            'units' => request('units'),
            'purchase_prices' => request('purchase_prices'),
            'sale_prices' => request('sale_prices'),
            'image' => $fileName 
        ]);

        return redirect()->route('item.index');
    }
    public function search(Request $request)
    {
        $query = $request->get('q');
        $results = Item::where('name_items', 'LIKE', '%' . $query . '%')->paginate((env('PER_PAGE')));

        return view('items.result', compact('results', 'query'));
    }

    public function edit(Item $item)
    {
        $categories = Category::all();

        return view('items.edit',compact('item','categories'));
    }

    public function update(Item $item, Request $request)
    {
        $file       = $request->file('image');
        $fileName   = $file->getClientOriginalName();
        $request->file('image')->move("image/", $fileName);

        $item->update([
            'name_items' => request('name_items'),
            'category_id' => request('category_id'),
            'descriptions' => request('descriptions'),
            'units' => request('units'),
            'purchase_prices' => request('purchase_prices'),
            'sale_prices' => request('sale_prices'),
            'image' => $fileName
        ]);

        return redirect()->route('item.index');
    }
    public function destroy(Item $item)
    {
        $item->delete();

        return redirect()->route('item.index');
    }

}
