@extends('front/layout')
@section('page_title','orders Page')
@section('container')

<!-- catg header banner section -->
<section id="aa-catg-head-banner">
   <div class="aa-catg-head-banner-area">
     <div class="container">

     </div>
   </div>
  </section>
  <!-- / catg header banner section -->

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
                        <th>Order id</th>
                        <th>Order Status</th>
                        <th>payment status</th>
                        <th>Total Amount</th>
                        <th>palce At</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $list)
                    <tr>
                        <td>
                            <a href="{{url('order_detail')}}/{{$list->id}}">{{$list->id}}</a>
                            </td>
                        <td>{{$list->order_status}}</td>
                        <td>{{$list->orders_status}}</td>
                        <td>{{$list->total_amount}}</td>
                        <td>{{$list->order_on}}</td>

                    </tr>
                    @endforeach
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
