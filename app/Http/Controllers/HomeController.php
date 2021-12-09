<?php

namespace App\Http\Controllers;

use App\Banner;
use App\News;
use Illuminate\Http\Request;
use App\Category;
use App\Product;

class HomeController extends Controller
{
    public function search(Request $request){
        //slide

        $keywords = $request->content_search;

        $cate_product = Category::where('category_status','1')->orderby('category_id','desc')->get();

        $search_product = Product::where('product_status','1')->where('product_name','like','%'.$keywords.'%')->get();

        return view('pages.product.search')->with('category',$cate_product)->with('search_product',$search_product);

    }
    public function index(){
        $all_banner = Banner::orderBy('banner_id','DESC')->get();
        $category=Category::where('category_status','1')->orderby('category_id','asc')->get();
        $product=Product::where('product_status','1')->orderby('product_id','desc')->get();
        $news=News::where('news_status','1')->orderby('news_id','desc')->get();
        return view('pages.home')->with(compact('category','product','all_banner','news'));
    }
}
