<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stock;

class StockController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        
    }

    public function index()
    {
        $data = [
            'cars'=>Stock::get(),
        ];
        return view('stocks/index', $data);
    }

    public function create()
    {
        return view('stocks/create');
    }

    public function store(request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required',
            'stock' => 'required'
        ]);
        
        $stock = Stock::create([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
        ]);
        
        session()->flash('success', 'Stock Created Successfully');

        return redirect(route('stock'));
    }

    public function edit(Stock $stock)
    {
        $data = [
            'stock'=>$stock
        ];
        return view('stocks/create', $data);
    }

    public function update(Request $request, $id)
    {
        $stock = Stock::findOrFail($id);
        
        $this->validate($request, array(
            'name' => 'required',
            'price' => 'required',
            'stock' => 'required'
        ));
        $stock->name = $request->name;
        $stock->price = $request->price;
        $stock->stock = $request->stock;
        
        $stock->save();
        
        session()->flash('success', 'Car Stock Updated Succeessfully');

        return redirect(route('stock'));
    }

    public function destroy($id)
    {
        $stock = Stock::where('id', $id)->firstOrFail();

        $stock->forceDelete();

        session()->flash('success', 'Delete Stock Success');

        return redirect(route('stock'));
    }
}
