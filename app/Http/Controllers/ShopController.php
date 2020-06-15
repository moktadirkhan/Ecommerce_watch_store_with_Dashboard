<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;

class ShopController extends Controller
{
  public function index()
  {
    $product=Product::orderBy('created_at','desc')->simplepaginate(7);

      return view('shop')
        ->with('products',$product);

  }
  public function show($id)
  {
     $d=Product::where('id',$id)->first();

     return view('details')->with('product_details',$d);
  }
}
