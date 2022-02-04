@extends('front/layout')
@section('page_title','Cart Page')
@section('container')

<!-- catg header banner section -->
<section id="aa-catg-head-banner">
   <div class="aa-catg-head-banner-area">
     <div class="container">

     </div>
   </div>
  </section>
  <!-- / catg header banner section -->


<section id="checkout">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="checkout-area">
                    <form id="frmPlaceOrder">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="checkout-left">
                                    <div class="panel-group" id="accordion">
                                        @if(session()->has('FRONT_USER_LOGIN')==null)

                                            <input type="button" value="Login" class="aa-browse-btn" data-toggle="modal" data-target="#login-modal">
                                            <br/><br/>
                                            OR
                                            <br/><br/>


                                    <!-- Shipping Address -->
                                        @endif

                                        <div class="panel panel-default aa-checkout-billaddress">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#accordion">
                                                        User Details Address
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseFour" class="panel-collapse collapse in">
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="aa-checkout-single-bill">
                                                                <input type="text" placeholder=" Name*" value="{{$customer['name']}}"  name="name" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="aa-checkout-single-bill">
                                                                <input type="email" placeholder="Email Address*" value="{{$customer['email']}}" name="email" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="aa-checkout-single-bill">
                                                                <input type="tel" placeholder="Phone*" value="{{$customer['mobile']}}" name="mobile" required>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="aa-checkout-single-bill">
                                                                <textarea cols="8" rows="3" name="address" required>{{$customer['address']}}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="aa-checkout-single-bill">
                                                                <input type="text" placeholder="City / Town*"  name="city" value="{{$customer['city']}}" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="aa-checkout-single-bill">
                                                                <input type="text" placeholder="State*" value="{{$customer['state']}}"  name="state" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="aa-checkout-single-bill">
                                                                <input type="text" placeholder="Postcode / ZIP*"  name="zip" value="{{$customer['zip']}}" required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="checkout-right">
                                    <h4>Order Summary</h4>
                                    <div class="aa-order-summary-area">
                                        <table class="table table-responsive">
                                            <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Total</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @php
                                            $totalPrice=0;
                                            @endphp
                                            @foreach($cart_data as $list)
                                                @php
                                                    $totalPrice=$totalPrice+($list->price*$list->qty);
                                                @endphp

                                                <tr>
                                                    <td> {{$list->name}} <strong> x{{$list->qty}}  </strong>
                                                        <br/>
                                                        <span style="color: green;font-weight: bold" class="cart_color">{{$list->color}}</span>
                                                    </td>
                                                    <td>Rs: {{$list->price*$list->qty}}</td>
                                                </tr>
                                            @endforeach

                                            </tbody>
                                            <tfoot>
                                            <tr class="hide show_coupon_box">
                                                <th>Coupon code <a href="javascript:void(0)" onclick="removeCouponCode()" style="color: red;font-size: 13px;">Remove</a></th>
                                                <td id="coupon_code_str"> </td>
                                            </tr>
                                            <tr>
                                                <th>Total</th>
                                                <td id="total_price">Rs: {{$totalPrice}} </td>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <h4>Coupon Code</h4>
                                    <div class="aa-payment-method coupon_code">
                                        <input type="text" placeholder="Coupon Code" name="coupon_code" id="coupon_code" class="aa-coupon-code apply_Coupon_Code_Box">
                                        <input type="button" onclick="ApplyCouponCode()" value="Apply Coupon" class="aa-browse-btn apply_Coupon_Code_Box">
                                    <div id="coupon_code_msg" style="color: red;"></div>
                                    </div>
                                    <br/>
                                    <h4>Payment Method</h4>
                                    <div class="aa-payment-method">
                                        <label for="cod"><input type="radio" id="cod" value="COD" name="payment_type" checked> Cash on Delivery </label>
                                        <label for="Easy_paisa"><input type="radio" id="Easy_paisa" value="Gateway" name="payment_type" > Via Easy Paisa </label>
                                        <input type="submit" value="Place Order" id="btnPlaceOrder" class="aa-browse-btn">
                                    </div>
                                    <div id="orderPlaceMsg" style="color: red"></div>
                                </div>
                            </div>
                        </div>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
