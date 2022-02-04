@extends('admin/layout')
@section('page_title','Order')
@section('customer_select','active')
@section('container')
{{--    @if(session()->has('message'))--}}
{{--    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">--}}
{{--        {{session('message')}}  --}}
{{--        <button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
{{--            <span aria-hidden="true">×</span>--}}
{{--        </button>--}}
{{--    </div> --}}
{{--    @endif                           --}}
    <h1 class="mb10">order</h1>
<div class="operaton">
    <b>Payment status</b>
    <select class="form-control" id="payment_Status" onchange="statusUpdate({{$order_detail['0']->id}})">
    <?php
    foreach($payment_status as $list){
        if ($order_detail[0]->paymetn_status==$list){
            echo "<option value='$list' selected>$list</option>";
        }
        else{
            echo "<option value='$list'>$list</option>";
        }
    }
    ?>
    </select>


    <b>order status</b>
    <select class="form-control" id="order_Status" onchange="OrderStatusUpdate({{$order_detail['0']->id}})">
        <?php
//        prx($order_status->orders_status);
        foreach($order_status as $list){
            if ($order_detail[0]->order_status==$list->id){
                echo "<option value='".$list->id."' selected>".$list->orders_status."</option>";
            }
            else{
                echo "<option value='".$list->id."'>".$list->orders_status."</option>";
            }
        }
        ?>
    </select>

    <form method="post">
        @csrf
        <b>Track Detail</b>
        <textarea class="form-control" name="track_detail">{{$order_detail['0']->track_detail}}</textarea>
        <input type="submit" class="btn btn-success my-2" value="submit">
    </form>
</div>

    <div class="row m-t-30 whitebg">

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
            </div>



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
                                        <td><img width="100px" height="100px" src="{{asset('storage/media/'.$list->attr_image)}}"></td>
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

@endsection
