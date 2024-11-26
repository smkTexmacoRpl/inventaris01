<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Merk;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class MerkController extends Controller
{
   public function __construct()
   {
    $this->middleware('auth');
   }
   public function adminDashboard(): View
   {
      return view('admin.dashboard');
   }
    public function index() : View
    {
        $merk = Merk::all();
        return view('merk.index', compact('merk'));
    }
    public function beranda() : View
     {
        $users = [['id'=>'1', 'nama'=>'Ronin'],['id'=>'2', 'nama'=>'Robin']];
        return view('home',['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('merk.input_merk');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):RedirectResponse
    {
        
        $request->validate([
            'merk' => 'required|string|max:50',
        ]);

        Merk::create([
                'merk_barang' => $request->merk,
            ]);
           
        return redirect()->route('merk.index')->with('success', 'Merk barang berhasil ditambahkan');       
       }

    /**
     * Display the specified resource.
     */
    public function show(Merk  $merk):View
    {
        return View('merk.show',\compact('merk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id):View
    {
        $merk = Merk::findOrFail($id);
        return view('merk.edit', compact('merk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id ):RedirectResponse
    {
        
        $merk = Merk::findOrFail($id);
        $merk->merk_barang = $request->merk;
        $merk->save();

        return redirect()->route('merk.index')->with('success', 'Merk updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Merk $merk)
    {
        $merk->delete();

        return redirect()->route('merk.index')->with('success', 'Merk deleted successfully.');
    }
}
