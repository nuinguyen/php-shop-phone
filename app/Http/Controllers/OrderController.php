<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use App\User;
use App\Receiver;
use App\OrderDetail;
use App\Http\Requests;

class OrderController extends Controller
{
    public function status_order(Request $request){
        $data=$request->all();
        $order = Order::where('order_id', $data['ord_id'])
            ->update(['order_status'=> $data['status']]);
    }
    public function order_detail($orer_id){

        $user=Order::join('users','tbl_order.user_id','=','users.id')->where('tbl_order.order_id',$orer_id)->first();
        $receiver=Order::join('tbl_receiver','tbl_receiver.receiver_id','=','tbl_order.receiver_id')->where('tbl_order.order_id',$orer_id)->first();
        $order_detail=OrderDetail::join('tbl_product','tbl_product.product_id','=','tbl_order_detail.product_id')
            ->where('order_id',$orer_id)->get();


        $show=Order::join('tbl_order_detail','tbl_order.order_id','=','tbl_order_detail.order_id')
            ->join('tbl_product','tbl_product.product_id','=','tbl_order_detail.product_id')
            ->join('users','tbl_order.user_id','=','users.id')
            ->join('tbl_receiver','tbl_order.receiver_id','=','tbl_receiver.receiver_id')
            ->where('tbl_order.order_id',$orer_id)->get();
// dd($show);
        return view('admin.user.order_detail')->with(compact('user','receiver','order_detail'));

    }
    public function view_order(){
        $order=Order::orderby('order_id','asc')->get();
        return view('admin.user.order')->with(compact('order'));
    }
}
