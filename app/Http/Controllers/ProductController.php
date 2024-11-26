<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $products = Product::all();
    return view('products', compact('products'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    //
  }
  public function cart()
  {
    return view('cart');
  }

  public function addToCart($id)
  {
    $product = Product::findOrFail($id);

    $cart = session()->get('cart', []);

    if (isset($cart[$id])) {
      $cart[$id]['quantity']++;
    } else {
      $cart[$id] = [
        "name" => $product->name,
        "quantity" => 1,
        "price" => $product->price,
        "image" => $product->image
      ];
    }

    session()->put('cart', $cart);
    return redirect()->back()->with('success', 'Product added to cart successfully!');
  }



  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   */
  public function show(Product $product)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Product $product)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Product $product)
  {
    if ($request->id & $request->quantity) {
      $cart = session()->get('cart');
      $cart[$request->id]["quantity"] = $request->quantity;
      session()->put('cart', $cart);
      session()->flash('success', 'Cart updated successfully');
    }
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Product $product)
  {
    //
  }
  public function remove(Request $request)
  {
    if ($request->id) {
      $cart = session()->get('cart');
      if (isset($cart[$request->id])) {
        unset($cart[$request->id]);
        session()->put('cart', $cart);
      }
      session()->flash('success', 'Product removed successfully');
    }
  }
}
