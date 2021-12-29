<?php

namespace App\Http\Controllers;

use App\Product;
use App\Import;

use App\Warehouse;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function report_sell(){
       /* $warehouse=Product::orderBy('tbl_product.product_id','asc')
            ->join('tbl_warehouse','tbl_product.product_id','=','tbl_warehouse.product_id')
            ->groupBy('tbl_warehouse.product_id','product_name')->selectRaw('sum(warehouse_sum_import) as sum_import,
             sum(warehouse_sum_export) as sum_export,sum(warehouse_sum_inventory) as sum_inventory, product_name ,tbl_warehouse.product_id')
            ->get();*/
        $warehouse=Product::join('tbl_warehouse','tbl_product.product_id','=','tbl_warehouse.product_id')
            ->groupBy('tbl_warehouse.product_id','product_name','product_price')->selectRaw('sum(warehouse_sum_import - warehouse_sum_inventory) as sum,
             product_name ,tbl_warehouse.product_id, product_price')
            ->having('sum','>',0)
            ->get();
        return view('admin.report.report_sell')->with(compact('warehouse'));
    }

    public function report_import(){

        $importdetail=Import::join('tbl_import_detail','tbl_import_detail.import_detail_id','=','tbl_import.import_id')
            ->join('tbl_product','tbl_product.product_id','=','tbl_import_detail.product_id')->where('import_status',1)
            ->get();
        return view('admin.report.report_import')->with(compact('importdetail'));
    }
}
