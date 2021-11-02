<?php

namespace App\Http\Controllers;

use App\Banner;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BannerController extends Controller
{

    public function banner(){
        $all_banner = Banner::orderBy('banner_id','DESC')->get();
        return view('admin.banner.banner')->with(compact('all_banner'));
    }


    public function add_banner(Request $request){

        $data = $request->all();
        $get_image = request('banner_image');

        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/banner', $new_image);

            $banner = new Banner();
            $banner->banner_name = $data['banner_name'];
            $banner->banner_image = $new_image;
            $banner->banner_status = $data['banner_status'];
            $banner->banner_desc = $data['banner_desc'];
            $banner->save();
            Session::put('message','Thêm slider thành công');
            return Redirect::to('/banner');
        }else{
            Session::put('message','Làm ơn thêm hình ảnh');
            return Redirect::to('/banner');
        }
    }
    public function delete_banner($banner_id){
        $delete_banner = Banner::find($banner_id);
        $delete_banner->delete();
        Session::put('message','Xóa danh mục bài viết thành công');
        return redirect('/banner');
    }
}
