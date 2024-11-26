<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\JenisBarangController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\MerkController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;




Route::get('/beranda', [MerkController::class, 'beranda'])->name('merk.beranda');

Auth::routes();

Route::get('/X', function () {
  return view('layouts.apps');
});
Route::get('/dash', function () {
  return view('partial.dash');
});
Route::get('/dashboard', function () {
  return view('dashboard');
});

Route::get('/super/home', function () {
  return ('halaman super home');
});
Auth::routes();
Route::middleware(['auth', 'user-access:admin'])->group(function () {

  Route::resource('/merk', MerkController::class);
  Route::resource('/jenis_barang', JenisBarangController::class,);
  Route::resource('/lokasi', LokasiController::class,);
  Route::resource('/supplier', SupplierController::class,);
  Route::resource('/barangs', BarangController::class);
  Route::resource('/penjualan', PenjualanController::class);
  Route::get('admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.dashboard');
});



Route::middleware(['auth', 'user-access:superadmin'])->group(function () {

  Route::get('super/admin', [App\Http\Controllers\HomeController::class, 'superHome'])->name('super.home');
});
Route::middleware('auth')->group(function () {
  Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('/logout');
});
Route::middleware(['auth', 'user-access:user'])->group(function () {
  Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

// product
Route::get('/', [ProductController::class, 'index']);
Route::get('cart', [ProductController::class, 'cart'])->name('cart');
Route::get('add-to-cart/{id}', [ProductController::class, 'addToCart'])->name('add.to.cart');
Route::patch('update-cart', [ProductController::class, 'update'])->name('update.cart');
Route::delete('remove-from-cart', [ProductController::class, 'remove'])->name('remove.from.cart');
