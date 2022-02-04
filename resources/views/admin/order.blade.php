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

    <div class="row m-t-30">
        <div class="col-md-12">
            <!-- DATA TABLE-->
            <div class="table-responsive m-b-40">
                <table class="table table-borderless table-data3">
                    <thead>
                        <tr>
                            <th>order id</th>
                            <th>customer Detail</th>
                            <th>amount</th>
                            <th>Order Status</th>
                            <th>Payment status</th>
                            <th>Payment type</th>
                            <th>Order date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $list)
                        <tr>
                            <td><a href="{{url('admin/order_detail')}}/{{$list->id}}">{{$list->id}}</a></td>
                            <td>{{$list->name}}
                                {{$list->email}}
                                {{$list->mobile}}
                                {{$list->address}}
                            </td>
                            <td>{{$list->total_amount}}</td>
                            <td>{{$list->orders_status}}</td>
                            <td>{{$list->paymetn_status}}</td>
                            <td>{{$list->payment_type}}</td>
                            <td>{{$list->order_on}}</td>

{{--                            <td>--}}
{{--                                <a href="{{url('admin/customer/show/')}}/{{$list->id}}"><button type="button" class="btn btn-success">View</button></a>--}}

{{--                                @if($list->status==1)--}}
{{--                                    <a href="{{url('admin/customer/status/0')}}/{{$list->id}}"><button type="button" class="btn btn-primary">Active</button></a>--}}
{{--                                 @elseif($list->status==0)--}}
{{--                                    <a href="{{url('admin/customer/status/1')}}/{{$list->id}}"><button type="button" class="btn btn-warning">Deactive</button></a>--}}
{{--                                @endif--}}

{{--                            </td>--}}
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- END DATA TABLE-->
        </div>
    </div>

@endsection
