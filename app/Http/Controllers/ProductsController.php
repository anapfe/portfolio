<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Product;

class ProductsController extends Controller
{
  public function listProducts()
  {
    $products = Product::all();
    $param = [
      'products' => $products
    ];
    return view('products.list', $param);
  }

  public function listProductsByPriceAsc()
  {
    $products = Product::orderBy('price', 'asc')->get();
    $param = [
      'products' => $products
    ];
    return view('products.list', $param);
  }

  public function listProductsByPriceDesc()
  {
    $products = Product::orderBy('price', 'desc')->get();
    $param = [
      'products' => $products
    ];
    return view('products.list', $param);
  }

  public function productDescription($id)
  {
    $product = Product::find($id);
    $param = [
      'product' => $product
    ];
    return view('product.show', $param);
  }

  public function createProduct()
  {
    return view('products.create');
  }

  public function storeProduct(Request $request) {
    $rules = [
      'name' => 'required',
      'price' => 'required'
    ];
    $messages = [
      'required' => "el campo es obligatorio"
    ];

    $request->validate($rules, $messages);

    if ($request->has('primary_img')) {
      $extension = $request->file('primary_img')->getClientOriginalExtension();
      $path = $request->file('primary_img')->storeAs("/product_img", uniqid() . "."  . $extension, 'public');
    } else {
      $path = "";
    }

    $product = Product::create([
      'name' => $request->input('name'),
      'description' => $request->input('description'),
      'price' => $request->input('price'),
      // 'format' => $request->input('size');
      "primary_img" => $path
    ]);
    $product->save();
    return redirect('/productos');
  }

  public function editProduct($id)
  {
    $product = Product::find($id);
    $param = [
      'product' => $product,
    ];
    return view('products.edit', $param);
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function updateProduct(Request $request, $id)
  {
    $product = Product::find($id);

    $product->name = $request->input('name');
    $product->description = $request->input('description');
    $product->price = $request->input('price');

    if ($request->has('primary_img')) {
      $extension = $request->file('primary_img')->getClientOriginalExtension();
      $path = $request->file('primary_img')->storeAs('/product_img', uniqid() . "."  . $extension, 'public');
      $product->primary_img = $path;
    } else {
      $product->primary_img = $product->primary_img;
    }
    $product->save();

    return redirect('/productos');
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroyProduct($id)
  {
    $product = Product::find($id);
    $product->delete();
    return redirect('/productos');
  }
}
