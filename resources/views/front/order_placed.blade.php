@extends('front/layout')
@section('page_title','Category')
@section('container')

  <!-- product category -->
<section id="aa-product-category">
   <div class="container">
      <div class="row" style="text-align:center;">
        <br/><br/><br/>
            <h2>Your order Placed successfully</h2>
          <h3>Order id-{{session()->get('ORDER_ID')}}</h3>
        <br/><br/><br/>
      </div>
   </div>
</section>
@endsection
