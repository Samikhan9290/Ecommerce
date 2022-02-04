<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Review;

class ReviewController extends Controller
{
    public function index()
    {
        $result['data']=DB::table('reviews')
            ->leftJoin('products','products.id','reviews.product_id')
            ->leftJoin('customers','customers.id','=','reviews.customer_id')
            ->orderBy('reviews.created_at','desc')
            ->select('customers.name','reviews.rating','reviews.review','reviews.created_at','products.name as pname','reviews.id','reviews.status')
            ->get();
//        prx( $result['product_review']);
        return view('admin/review',$result);
    }


    public function delete(Request $request,$id){
        $model=Review::find($id);
        $model->delete();
        $request->session()->flash('message','Review deleted');
        return redirect('admin/review');
    }

    public function status(Request $request,$status,$id){
        DB::table('reviews')->where(['id'=>$id])
            ->update(['status'=>$status]);
        $request->session()->flash('message','Review status updated');
        return redirect('admin/review');
    }
}
