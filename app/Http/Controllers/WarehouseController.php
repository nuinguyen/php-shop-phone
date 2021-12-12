<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    public function warehouse(){

        $warehouse=Product::join('tbl_import_detail','tbl_product.product_id','=','tbl_import_detail.product_id')
        ->join('tbl_export_detail','tbl_product.product_id','=','tbl_export_detail.product_id')->get();
        return view('admin.warehouse.warehouse')->with(compact('warehouse'));
    }
}
