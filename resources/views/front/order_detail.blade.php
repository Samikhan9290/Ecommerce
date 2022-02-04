@extends('front/layout')
@section('page_title','order Detail Page')
@section('container')

<!-- catg header banner section -->
<section id="aa-catg-head-banner">
   <div class="aa-catg-head-banner-area">
     <div class="container">

     </div>
   </div>
  </section>
  <!-- / catg header banner section -->
<div class="col-md-12">
    <div class="col-md-6">
        <h1>address detail</h1>
        <p>Name :{{$order_detail['0']->name}}</p>
        <p>phone :{{$order_detail['0']->mobile}}</p>
        <p>Address:{{$order_detail['0']->address}}</p>
        <p>City :{{$order_detail['0']->city}}</p>
        <p>state: {{$order_detail['0']->state}}</p>
    </div>
    <div class="col-md-6">
        <h1>Order detail</h1>
        <p>product Name :{{$order_detail['0']->pname}}</p>
        <p>Order Status:{{$order_detail['0']->orders_status}}</p>
        <p>Payment Status:{{$order_detail['0']->paymetn_status}}</p>
        <p>Payment Type: {{$order_detail['0']->payment_type}}</p>
        <p>Track detail: {{$order_detail['0']->track_detail}}</p>

    </div>
</div>
  <section id="cart-view">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="cart-view-area">
           <div class="cart-view-table">
             <form action="">
               <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>product id</th>
                        <th>product</th>

                        <th>image</th>
                          <th>size</th>
                          <th>color</th>
                          <th>price</th>
                        <th>quantity</th>
                        <th>total</th>

                      </tr>
                    </thead>
                    <tbody>
                    @php
                    $total_amount=0;
                    @endphp
                    @foreach($order_detail as $list)
                        @php
                            $total_amount=$total_amount+($list->qty * $list->price);
                        @endphp
                    <tr>
                        <td>
                            {{$list->id}}
                            </td>
                        <td>{{$list->name}}</td>
                        <td><img src="{{asset('storage/media/'.$list->attr_image)}}"></td>
                        <td>{{$list->size}}</td>
                        <td>{{$list->color}}</td>

                        <td>{{$list->price}}</td>
                        <td>{{$list->qty}}</td>
                        <td>{{$list->qty * $list->price}}</td>


                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="6">&nbsp;</td>
                        <td>total</td>
                        <td>{{$total_amount}}</td>


                    </tr>
                    <?php

                    if ($order_detail[0]->coupon_value>0){
                        echo ' <tr>
                        <td colspan="6">&nbsp;</td>
                        <td>coupon</td>
                        <td>'.$order_detail[0]->coupon_value.'</td>
                    </tr>';
                        $total_amount=$total_amount-$order_detail[0]->coupon_value;
                        echo ' <tr>
                        <td colspan="6">&nbsp;</td>
                        <td>final total</td>
                        <td>'.$total_amount.'</td>
                    </tr>';
                    }
                    ?>
                      </tbody>
                  </table>
                </div>
             </form>
             <!-- Cart Total view -->

		   </div>
         </div>
       </div>
     </div>
   </div>
 </section>
@endsection
