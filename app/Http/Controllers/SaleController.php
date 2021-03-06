<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sale;
use App\Stock;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailNotify;
use App\Mail\Invoicemail;

class SaleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        
    }

    public function index()
    {
        $data = [
            'sales'=>Sale::get(),
        ];
        return view('sales/index', $data);
    }

    public function create()
    {
        $data = [
            'stock'=>Stock::all()
        ];
        return view('sales/create', $data);
    }

    public function store(request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'phone' => 'required|digits_between:9,12|numeric',
            'car_name' => 'required'
        ]);
        
        $sale = Sale::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'car_name' => $request->car_name
        ]);

        Mail::to($sale->email)->send(new Invoicemail($sale->name, $sale->phone, $sale->car_name));
        
        session()->flash('success', 'Sale Created Successfully');

        return redirect(route('sale'));
    }

    public function destroy($id)
    {
        $sale = Sale::where('id', $id)->firstOrFail();

        $sale->forceDelete();

        session()->flash('success', 'Delete Sale Success');

        return redirect(route('sale'));
    }
}
