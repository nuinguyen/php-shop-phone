<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;
use DB;
use App\Sale;

class SaleController extends Controller
{

    public function check_sale(Request $request){

    }
    public function delete_sale($sale_id){
        $delete_sale = Sale::find($sale_id);
        $delete_sale->delete();
        Session::put('message','Xóa danh mục bài viết thành công');
        return redirect('/sale');
    }
    public function insert_sale(Request $request){
        $data=$request->all();
        $sale=new Sale();
        $sale->sale_name=$data['sale_name'];
        $sale->sale_code=$data['sale_code'];
        $sale->sale_condition=$data['sale_condition'];
        $sale->sale_number=$data['sale_number'];
        $sale->sale_amount=$data['sale_amount'];
        $sale->sale_status=$data['sale_status'];
        $sale->start_time=$data['start_time'];
        $sale->end_time=$data['end_time'];
        $sale->save();

        Session::put('message','Them thanh cong');
        return Redirect::to('/sale');
    }
    public function sale(){
        $sale=Sale::orderby('sale_id','ASC')->get();
        return view('admin.sale.sale')->with(compact('sale'));
    }
}
