<?php

namespace App\Http\Controllers;

use App\Export;
use App\Import;
use App\ImportDetail;
use App\Warehouse;
use App\Product;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    public function warehouse(){

//        ->leftjoin('tbl_export_detail','tbl_product.product_id','=','tbl_export_detail.product_id')
//            ->leftjoin('tbl_import_detail','tbl_product.product_id','=','tbl_import_detail.product_id')
        $warehouse=Product::orderBy('tbl_product.product_id','asc')
            ->join('tbl_warehouse','tbl_product.product_id','=','tbl_warehouse.product_id')
            ->groupBy('tbl_warehouse.product_id','product_name')->selectRaw('sum(warehouse_sum_import) as sum_import,
             sum(warehouse_sum_export) as sum_export,sum(warehouse_sum_inventory) as sum_inventory, product_name ,tbl_warehouse.product_id')
      ->get();
        $import=Import::where('import_status',0)
            ->join('tbl_import_detail','tbl_import.import_id','=','tbl_import_detail.import_detail_id')
            ->groupBy('product_id')->selectRaw('sum(import_detail_amount) as sum_import, product_id')
            ->pluck('sum_import','product_id');
        $export=Export::where('export_status',0)
            ->join('tbl_export_detail','tbl_export.export_id','=','tbl_export_detail.export_detail_id')
            ->groupBy('product_id')->selectRaw('sum(export_detail_amount) as sum_export, product_id')
        ->pluck('sum_export','product_id');
        //dd($export);
        return view('admin.warehouse.warehouse')->with(compact('warehouse','export','import'));
    }
}
