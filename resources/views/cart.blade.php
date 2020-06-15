@extends('layouts.app')

@section('content')

      <!-- Hero Area Start-->
      <div class="slider-area ">
          <div class="single-slider slider-height2 d-flex align-items-center">
              <div class="container">
                  <div class="row">
                      <div class="col-xl-12">
                          <div class="hero-cap text-center">
                              <h2>Cart List</h2>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!--================Cart Area =================-->
      <section class="cart_area section_padding">
        <div class="container">
          <div class="cart_inner">
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                      <th >Delete</th>
                    <th scope="col">Product</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total</th>
                  </tr>
                </thead>
                <tbody>
                Count:  {{Cart::content()->count()}} items
                @foreach(Cart::content() as $pdt)
                  <tr class="cart_item">
                    <td class="product-remove">
                      <a class="btn btn-danger" href="{{route('cart.delete',['id'=>$pdt->rowId])}}" role="button">X</a>                        <i class="semicon-delete-bold"></i>
                      </a>
                    </td>
                    <td>
                      <div class="media">
                        <div class="d-flex">
                          <img src="{{asset('storage/' . $pdt->model->image) }}" width="50%" height="50%">
                        </div>
                        <div class="media-body">
                          <p>{{$pdt->name}}</p>
                        </div>
                      </div>
                    </td>
                    <td>
                      <h5>{{$pdt->price}}</h5>
                    </td>
                    <td>
                      <div class="product_count">
                      <a href="{{route('cart.decrement',['id'=>$pdt->rowId,'qty'=>$pdt->qty])}}"><span class="input-number-decrement"><i class="ti-minus"></i></span></a>
                        <input class="input-number" type="text" value="{{$pdt->qty}}" min="0" max="10">
                        <a href="{{route('cart.increment',['id'=>$pdt->rowId,'qty'=>$pdt->qty])}}"><span class="input-number-increment"><i class="ti-plus"></i></span></a>
                      </div>
                    </td>
                    <td>
                      <h5>{{$pdt->total()}}</h5>
                    </td>
                  </tr>
                  @endforeach
                  <tr class="bottom_button">
                    <td>
                      <div class="cupon_text float-right">
                        <a class="btn_1" href="#">Close Coupon</a>
                      </div>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                      <h5>Subtotal</h5>
                    </td>
                    <td>
                      <h5>$ {{Cart::total()}}</h5>
                    </td>
                  </tr>

                </tbody>
              </table>
              <div class="checkout_btn_inner float-right">
                <a class="btn_1" href="{{route('/shop')}}">Continue Shopping</a>
                <a class="btn_1 checkout_btn_1" href="{{route('cart.checkout')}}">Proceed to checkout</a>
              </div>
            </div>
          </div>
      </section>
      <!--================End Cart Area =================-->
      @endsection
      @section('script')

      @endsection
