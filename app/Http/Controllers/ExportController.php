<?php

namespace App\Http\Controllers;

use App\Export;
use App\ExportDetail;
use App\Imports\ExportProduct;
use App\Product;
use DB;
use Auth;
use App\Warehouse;

use Illuminate\Http\Request;

class ExportController extends Controller
{
    public function export(){
        $product = Product::get();
        return view('admin.export.export')->with(compact('product'));
    }
    public function all_export(){
        $export = DB::select('select tbl_export.*,
       (select count(*) from tbl_export_detail WHERE tbl_export.export_id=tbl_export_detail.export_detail_id ) as count_all,
       (select tbl_export.export_cost+sum(export_detail_amount*export_detail_price) from tbl_export_detail WHERE tbl_export.export_id=tbl_export_detail.export_detail_id ) as total_all
        from tbl_export order by tbl_export.export_id DESC');

        //dd($statement);
        return view('admin.export.all_export')->with(compact('export'));
    }
    public function save_export(Request $request)
    {
        $statement = DB::select("SHOW TABLE STATUS LIKE 'tbl_export'");
        $nextId = $statement[0]->Auto_increment;

       //dd($request->all_amount_product);

        $export = new Export();
        $export->user_id = Auth::id();
        $export->export_note = $request->import_note;
        $export->export_date = date('Y-m-d H:i:s', time());
        $export->export_cost = $request->cost;
        $export->export_status = $request->export_status;
        $export->save();

        $listAmount = $request->amount;
        $listPrice = $request->price;
        $listProduct = $request->import_product;
        //dd($request->import_product);

        foreach ($listAmount as $key => $value) {
            $export_detail = new ExportDetail();
            $export_detail->export_detail_id = $nextId;
            $export_detail->product_id = $listProduct[$key];
            $export_detail->export_detail_amount = $listAmount[$key];
            $export_detail->export_detail_price = $listPrice[$key];
            $export_detail->save();
        }
        return redirect('/export');
        Session::put('message','Thêm Nhap hang');
    }

    public function add_export($export_id){
        $export = Export::find($export_id);
        $export->export_status=1;
        $export->export_date=date('Y-m-d H:i:s', time());
        $export->save();
        $export_detail=ExportDetail::where('export_detail_id',$export_id)->get();
        foreach ($export_detail as $key => $value){
            $warehouse=Warehouse::where('product_id',$export_detail[$key]->product_id)->first();
            $warehouse->warehouse_sum_export=$warehouse->warehouse_sum_export+$export_detail[$key]->export_detail_amount;
            $warehouse->warehouse_sum_inventory=$warehouse->warehouse_sum_inventory-$export_detail[$key]->export_detail_amount;
            $warehouse->save();

        }
        return redirect('/all-export');
    }
    public function delete_export($export_id){
        $export = Import::find($export_id);
        $export_detail = ExportDetail::find($export_id);
        $export->delete();
        $export_detail->delete();
        return redirect('/all-export');
    }
    public function show_export($export_id){

        $show_export = Export::join('tbl_export_detail','tbl_export.export_id','=','tbl_export_detail.export_detail_id')
            ->join('tbl_product','tbl_product.product_id','=','tbl_export_detail.product_id')
            ->where('tbl_export.export_id',$export_id)->get();

        $arrIdProduct = [];
        foreach ($show_export as $key => $value) {
            $arrIdProduct[] = $value->product_id;
        }
        $product = Product::get();
        return view('admin.export.export')->with(compact('show_export','product','arrIdProduct'));
    }
}
