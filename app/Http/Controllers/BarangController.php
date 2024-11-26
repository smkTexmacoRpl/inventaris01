<?php

namespace App\Http\Controllers;
// use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\JenisBarang;
use App\Models\Lokasi;
use App\Models\Supplier;
use App\Models\Merk;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;


class BarangController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $barangs = Barang::with(['merk', 'jenis', 'lokasi'])->get();
    return View('barang.index', \compact('barangs'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create(): View
  {

    $merk = Merk::all();
    $jenis = JenisBarang::all();
    $lokasi = Lokasi::all();
    $supplier = Supplier::all();  // ambil semua data supplier

    return view('barang.input', \compact('merk', 'jenis', 'lokasi', 'supplier'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request): RedirectResponse
  {
    //  dd($request->all());  
    $request->validate([

      'kode' => 'required|string|max:10',
      'barang' => 'required|string|max:50',
      'merk' => 'required',
      'jenis' => 'required',
      'lokasi' => 'required',
      'jumlah' => 'required|integer',
      'harga' => 'required|numeric',
      'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
      'keterangan' => 'nullable',
    ]);

    if ($request->hasFile('gambar')) {
      $image = $request->file('gambar');
      $imageName = time() . '-' . 'barang' . '.' . $image->getClientOriginalExtension();
      $image->move('barang', $imageName);
      $manager = new ImageManager(new Driver());
      $thumbImage = $manager->read('barang/' . $imageName);
      $thumbImage->resize(200, 200);
      $thumbImage->save(public_path('barang/thumbnails/' . $imageName));

      Barang::create([
        'kode_barang' => $request->kode,
        'nama_barang' => $request->barang,
        'merk_id' => $request->merk,
        'jenis_id' => $request->jenis,
        'lokasi_id' => $request->lokasi,
        'supplier_id' => 1,
        'jumlah_barang' => $request->jumlah,
        'harga' => $request->harga,
        'gambar_barang' => $imageName,
        'keterangan' => $request->keterangan,
      ]);
    } else {
      Barang::create([
        'kode_barang' => $request->kode,
        'nama_barang' => $request->barang,
        'merk_id' => $request->merk,
        'jenis_id' => $request->jenis,
        'lokasi_id' => $request->lokasi,
        'supplier_id' => 1,
        'jumlah_barang' => $request->jumlah,
        'harga' => $request->harga,
        'keterangan' => $request->keterangan,
      ]);
    }

    return redirect()->route('barangs.index')->with('success', 'Barang berhasil ditambahkan');
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    $barang = Barang::with(['merk', 'jenis', 'lokasi', 'supplier'])->where('id', $id)->first();
    $merk = Merk::all();
    $jenis = JenisBarang::all();
    $lokasi = Lokasi::all();
    $supplier = Supplier::all();

    return view('barang.edit', \compact('barang', 'merk', 'jenis', 'lokasi', 'supplier'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    $request->validate([
      'kode' => 'required|string|max:10',
      'barang' => 'required|string|max:50',
      'merk' => 'required',
      'jenis' => 'required',
      'lokasi' => 'required',
      'jumlah' => 'required|integer',
      'harga' => 'required|numeric',
      'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
      'keterangan' => 'nullable',
    ]);

    $barang = Barang::find($id);

    if ($request->hasFile('gambar')) {
      if ($barang->gambar_barang) {
        $gambar_path = \public_path('barang/' . $barang->gambar_barang);
        $gambar_path1 = \public_path('barang/thumbnails/' . $barang->gambar_barang);

        if (file_exists($gambar_path) && (\file_exists($gambar_path1))) {
          unlink($gambar_path);
          unlink($gambar_path1);
        }
      }

      $image = $request->file('gambar');
      $imageName = time() . '-' . 'barang' . '.' . $image->getClientOriginalExtension();
      $image->move('barang', $imageName);
      $manager = new ImageManager(new Driver());
      $thumbImage = $manager->read('barang/' . $imageName);
      $thumbImage->resize(150, 150);
      $thumbImage->save(public_path('barang/thumbnails/' . $imageName));
      $barang->gambar_barang = $imageName;
    }


    $barang->update([
      'kode_barang' => $request->kode,
      'nama_barang' => $request->barang,
      'merk_id' => $request->merk,
      'jenis_id' => $request->jenis,
      'lokasi_id' => $request->lokasi,
      'supplier_id' => $request->supplier,
      'jumlah_barang' => $request->jumlah,
      'harga' => $request->harga,
      'keterangan' => $request->keterangan,
    ]);


    return \redirect()->route('barangs.index')->with('success', 'edited ! ');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    $barang = Barang::find($id);
    if ($barang->gambar_barang) {
      $gambar_path1 = \public_path('barang/thumbnails/' . $barang->gambar_barang);
      $gambar_path = \public_path('barang/' . $barang->gambar_barang);
      if (file_exists($gambar_path) && (\file_exists($gambar_path1))) {
        unlink($gambar_path);
        unlink($gambar_path1);
        $barang->delete();
      }
    }
    $barang->delete();
    return redirect()->route('barangs.index')->with('success', 'Lokasi berhasil dihapus');
  }
}
