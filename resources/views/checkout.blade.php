@extends('layouts.app')

@section('content')
<!-- Hero Area Start-->
<div class="slider-area ">
    <div class="single-slider slider-height2 d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center">
                        <h2>Checkout</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--================Checkout Area =================-->
<section class="checkout_area section_padding">
  <div class="container">
      @guest
    <div class="returning_customer">

      <div class="check_title">
        <h2>
          Returning Customer?

          <a href="{{route('login')}}">Click here to login</a>

        </h2>
      </div>

      <p>
        If you have shopped with us before, please enter your details in the
        boxes below. If you are a new customer, please proceed to the
        Billing & Shipping section.
      </p>
      <form class="row contact_form" action="{{ route('login') }}" method="post" novalidate="novalidate">
        @csrf
        <div class="col-md-6 form-group p_star">
          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email" autofocus>
          @error('email')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror        </div>
        <div class="col-md-6 form-group p_star">
          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"   placeholder="Password" required autocomplete="current-password">
          @error('password')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div>
        <div class="col-md-12 form-group">
          <button type="submit" value="submit" class="btn_3">
            log in
          </button>
          <div class="creat_account">
            <input type="checkbox" id="f-option" name="selector" />
            <label for="f-option">Remember me</label>
          </div>
          @if (Route::has('password.request'))
              <a class="lost_pass" href="{{ route('password.request') }}">
                  {{ __('Forgot Your Password?') }}
              </a>
          @endif
        </div>
      </form>
    </div>
  @endguest
    <div class="billing_details">
      <div class="row">
        <div class="col-lg-8">
          <h3>Billing Details</h3>
          <form class="row contact_form" action="{{route('checkout.store')}}" method="post" novalidate="novalidate">
            <div class="col-md-6 form-group p_star">
              <input type="text" class="form-control" id="first" name="firstname" placeholder="First Name" required/>

            </div>
            <div class="col-md-6 form-group p_star">
              <input type="text" class="form-control" id="last" name="lastname" placeholder="Last Name" required/>
            </div>

            <div class="col-md-6 form-group p_star">
              <input type="text" class="form-control" id="number" name="phone" placeholder="Phone Number" required/>
            </div>


            <div class="col-md-12 form-group p_star">
              <input type="text" class="form-control" id="add1" name="address" placeholder="Address" required/>
            </div>

            <div class="col-md-12 form-group p_star">
              <input type="text" class="form-control" id="city" name="city" placeholder="City" required/>
            </div>



            <div class="col-md-12 form-group">
                <h3>Shipping Details</h3>
                <label for="f-option3">Ship to a different address?</label>
              </div>
              <textarea class="form-control" name="message" id="message" rows="1"
                placeholder="Order Notes"></textarea>
            </div>
          </form>
        </div>
        <div class="col-lg-4">
          <div class="order_box">
            <h2>Your Order</h2>

            <ul class="list">

              <li>
                <a href="#">Product
                  <span>Total</span>
                </a>
              </li>
                @foreach(Cart::content() as $item)
              <li>
                <a href="#">{{$item->name}}
                  <span class="middle">x {{$item->qty}}</span>
                  <span class="last">$ {{$item->total()}}</span>
                </a>
              </li>
              @endforeach
            </ul>
            <ul class="list list_2">
              <li>
                <a href="#">Subtotal
                  <span>$ {{Cart::total()}}</span>
                </a>
              </li>

            </ul>
            <div class="payment_item">
              <div class="radion_btn">
                <input type="radio" id="f-option5" name="payment_type" />
                <label for="cash_on_delivery">Cash On delivery</label>
                <div class="check"></div>
              </div>

            </div>
            <div class="payment_item active">
              <div class="radion_btn">
                <input type="radio" id="f-option6" name="payment_type" />
                <label for="Bkash">Bkash </label>
                <img src="img/product/single-product/card.jpg" alt="" />
                <div class="check"></div>
              </div>

            </div>
            <div class="creat_account">
              <input type="checkbox" id="f-option4" name="selector" />
              <label for="f-option4">I’ve read and accept the </label>

              <a href="#">terms & conditions*</a>
            </div>
            <a class="btn_3" href="#">Proceed</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--================End Checkout Area =================-->
@endsection
@section('script')

@endsection
