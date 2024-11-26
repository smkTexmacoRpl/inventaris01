<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
      $suppliers = Supplier::paginate(10); 
      return view('supplier.index',\compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('supplier.input');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $request->validate([
            'kode_supplier' => 'required|string|max:50',
            'nama_supplier' => 'required|string|max:50',
            'alamat_supplier' => 'required|string|max:100',
            'telepon' => 'required|numeric|max:13',
            'email' => 'required|email',
        ]);

        Supplier::create([
                'kode_supplier' => $request->kode_supplier,
                'nama_supplier' => $request->nama_supplier,
                'alamat_supplier' => $request->alamat_supplier,
                'telepon_supplier' => $request->telepon,
                'email_supplier' => $request->email,
            ]);

        return redirect()->route('supplier.index')->with('success', 'Data Supplier Berhasil Ditambahkan');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $supplier): view
    {
      $supplier = Supplier::findOrFail($supplier['id']);

      return view('supplier.edit',\compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Supplier $supplier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier)
    {
        //
    }
}
