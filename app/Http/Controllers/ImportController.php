<?php

namespace App\Http\Controllers;

use App\Import;
use App\ImportDetail;
use App\Product;
use App\Provider;
use App\Warehouse;
use Illuminate\Http\Request;
use DB;
use Auth;

class ImportController extends Controller
{
    public function import(){
        $provider = Provider::get();
        $product = Product::get();
        return view('admin.import.import')->with(compact('provider','product'));
    }
    public function all_import(){
        $import = DB::select('select tbl_import.*,tbl_provider.provider_name,
        (select count(*) from tbl_import_detail WHERE tbl_import.import_id=tbl_import_detail.import_detail_id ) as count_all,
        (select tbl_import.import_cost+sum(import_detail_amount*import_detail_price) from tbl_import_detail WHERE tbl_import.import_id=tbl_import_detail.import_detail_id ) as total_all
        from tbl_import,tbl_provider WHERE tbl_provider.provider_id=tbl_import.provider_id order by tbl_import.import_id DESC ');
        return view('admin.import.all_import')->with(compact('import'));
    }
    public function save_import(Request $request)
    {
        $statement = DB::select("SHOW TABLE STATUS LIKE 'tbl_import'");
        $nextId = $statement[0]->Auto_increment;

//       dd($request->import_status);
        $import = new Import();
        $import->provider_id = $request->import_provider;
        $import->user_id = Auth::id();
        $import->import_note = $request->import_note;
        $import->import_date = date('Y-m-d H:i:s', time());
        $import->import_cost = $request->cost;
        $import->import_status = $request->import_status;
        $import->save();

        $listAmount = $request->amount;
        $listPrice = $request->price;
        $listProduct = $request->import_product;
        //dd($request->import_product);

        foreach ($listAmount as $key => $value) {
            $import_detail = new ImportDetail();
            $import_detail->import_detail_id = $nextId;
            $import_detail->product_id = $listProduct[$key];
            $import_detail->import_detail_amount = $listAmount[$key];
            $import_detail->import_detail_price = $listPrice[$key];
            $import_detail->save();
        }
        return redirect('/import');
        Session::put('message','Thêm Nhap hang');
    }
    public function add_import($import_id){
        $import = Import::find($import_id);
        $import->import_status=1;
        $import->import_date=date('Y-m-d H:i:s', time());
        $import->save();
        $import_detail=ImportDetail::where('import_detail_id',$import_id)->get();
        foreach ($import_detail as $key => $value){
            $warehouse=Warehouse::where('product_id',$import_detail[$key]->product_id)->first();
            $warehouse->warehouse_sum_import=$warehouse->warehouse_sum_import+$import_detail[$key]->import_detail_amount;
            $warehouse->warehouse_sum_inventory=$warehouse->warehouse_sum_inventory+$import_detail[$key]->import_detail_amount;
            $warehouse->save();

        }
        return redirect('/all-import');
    }
    public function delete_import($import_id){
        $import = Import::find($import_id);
        $import_detail = ImportDetail::find($import_id);
        $import->delete();
        $import_detail->delete();
        return redirect('/all-import');
    }
    public function show_import($import_id){

        $show_import = Import::join('tbl_import_detail','tbl_import.import_id','=','tbl_import_detail.import_detail_id')
            ->join('tbl_product','tbl_product.product_id','=','tbl_import_detail.product_id')
            ->join('tbl_provider','tbl_provider.provider_id','=','tbl_import.provider_id')
            ->where('tbl_import.import_id',$import_id)->get();

        $arrIdProduct = [];
        foreach ($show_import as $key => $value) {
            $arrIdProduct[] = $value->product_id;
        }
        $provider = Provider::get();
        $product = Product::get();
        return view('admin.import.import')->with(compact('show_import','provider','product','arrIdProduct'));
    }
}
