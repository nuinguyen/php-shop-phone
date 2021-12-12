<?php

namespace App\Http\Controllers;

use App\Banner;
use App\News;
use Illuminate\Http\Request;
use Session;
use App\Category;
use App\Product;
use Illuminate\Support\Facades\Redirect;


class CategoryController extends Controller
{
    public function add_category(){
        return view('admin.category.add_category');
    }
    public function all_category(){

        $all_category=Category::orderby('category_id',"desc")->get();
        return view('admin.category.all_category')->with(compact('all_category'));

    }

    public function save_category(Request $request){
        $data = $request->all();
        $category = new Category();
        $category->category_name = $data['category_name'];
        $category->category_slug = $data['category_slug'];
        $category->category_desc = $data['category_desc'];
        $category->category_status = $data['category_status'];
        $category->save();
        Session::put('message','Thêm danh mục bài viết thành công');
        return redirect()->back();
    }
    public function edit_category($category_id){
        $edit_category = Category::find($category_id);
        return view('admin.category.edit_category')->with(compact('edit_category'));
    }

    public function update_category(Request $request, $category_id){
        $data = $request->all();
        $category = Category::find($category_id);
        $category->category_name = $data['category_name'];
        $category->category_slug = $data['category_slug'];
        $category->category_desc = $data['category_desc'];
        $category->category_status = $data['category_status'];
        $category->save();
        Session::put('message','Cập nhật danh mục bài viết thành công');
        return redirect()->back();
    }
    public function delete_category($category_id){
        $delete_category = Category::find($category_id);
        $delete_category->delete();
        Session::put('message','Xóa danh mục bài viết thành công');
        return redirect()->back();
    }
    // admi page

    public function show_category($category_id){

        // CATEGORY
        $category=Category::where('category_status','1')->orderby('category_id','asc')->get();
        $category_name=Category::where('category_id',$category_id)->get();
        //BANNER
        $all_banner = Banner::orderBy('banner_id','DESC')->get();


        $news=News::orderby('news_id',"ASC")->get();

        $product=Product::where('product_status','1')->where('category_id',$category_id)->get();
        return view('pages.category.show_category')->with(compact('category','product','category_name','all_banner','news'));
    }
}
