<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class orderController extends Controller
{
    public function index()
    {
        $result['orders']=DB::table('orders')
            ->select('orders.*','orders_status.orders_status')
            ->leftJoin('orders_status','orders_status.id','=','orders.order_status')->get();
//        prx($result);

        return view('admin/order',$result);
    }

    public function order_detail(Request $request,$id){
        $result['order_detail']=DB::table('order_detail')
            ->select('orders.*','order_detail.price','order_detail.qty','products.name as pname','products_attr.attr_image','sizes.size','colors.color','orders_status.orders_status')
            ->leftJoin('orders','orders.id','=','order_detail.orders_id')
            ->leftJoin('products_attr','products_attr.id','=','order_detail.product_attr_id')
            ->leftJoin('products','products.id','=','products_attr.products_id')
            ->leftJoin('sizes','sizes.id','=','products_attr.size_id')
            ->leftJoin('colors','colors.id','=','products_attr.color_id')
            ->leftJoin('orders_status','orders_status.id','=','orders.order_status')
            ->where(['orders.id'=>$id])->get();
//        if (!isset($result['order_detail'][0])){
//            return redirect('/');
//        }
        $result['order_status']=DB::table('orders_status')->get();
//                prx($result['order_status']);

        $result['payment_status']=['success','pending','fail'];
        return view('admin.order_detail',$result);
    }
    public  function updateStatus(Request $request ,$status , $id){
        DB::table('orders')->where(['id'=>$id])
            ->update(['paymetn_status'=>$status]);
        return redirect('/admin/order_detail/'.$id);
    }
    public  function update_order_status(Request $request ,$status , $id){
        DB::table('orders')->where(['id'=>$id])
            ->update(['order_status'=>$status]);
        return redirect('/admin/order_detail/'.$id);
    }

    public function update_track_detail(Request $request,$id){
        $track_Detail=$request->track_detail;
        DB::table('orders')->where(['id'=>$id])->update(['track_detail'=>$track_Detail]);
        return redirect('/admin/order_detail/'.$id);

    }




}
