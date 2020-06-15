<?php

namespace App\Http\Controllers;

use Cart;
use App\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
  public function add_to_cart()
  {

    $pdt=Product::find(request()->pdt_id);

    $cartItem=Cart::add([
      'id'=>$pdt->id,
      'name'=>$pdt->title,
      'qty'=>request()->qty,
      'price'=>$pdt->price
    ]);
    Cart::associate($cartItem->rowId, 'App\Product');

    return redirect(route('cart'));
  }


  public function cart()
  {
    return view ('cart');
  }


  public function cart_delete($id)
  {
    Cart::remove($id);

    return redirect()->back();
  }

  public function increment($id,$qty)
  {
    Cart::update($id, $qty + 1);

    return redirect()->back();
  }

  public function decrement($id,$qty)
  {
  Cart::update($id, $qty - 1);

    return redirect()->back();
  }


  public function rapid_add($id)
  {

    $pdt=Product::find($id);

    $cartItem=Cart::add([
      'id'=>$pdt->id,
      'name'=>$pdt->title,
      'qty'=>1,
      'price'=>$pdt->price
    ]);
    Cart::associate($cartItem->rowId, 'App\Product');

    return redirect()->back();
  }

  

}
