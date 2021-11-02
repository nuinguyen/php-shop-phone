<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Provider;
use Illuminate\Support\Facades\Redirect;


class ProviderController extends Controller
{
    public function provider(){
        $all_provider=Provider::orderby('provider_id',"ASC")->get();
        return view('admin.provider.provider')->with(compact('all_provider'));
    }



    public function save_provider(Request $request){
        $data = $request->all();
        $provider = new Provider();
        $provider->provider_name = $data['provider_name'];
        $provider->provider_code = $data['provider_code'];
        $provider->provider_email = $data['provider_email'];
        $provider->provider_phone = $data['provider_phone'];
        $provider->provider_address = $data['provider_address'];

        $get_image = $request->file('provider_logo');

        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$data['provider_logo']->getClientOriginalExtension();
            $get_image->move('public/uploads/provider',$new_image);
            $data['provider_logo'] = $new_image;
        }
        $provider->provider_logo = $data['provider_logo'];
        $provider->save();
        Session::put('message','Thêm danh mục bài viết thành công');
        return redirect('/provider');
    }
    public function edit_provider($provider_id){
        $all_provider=Provider::orderby('provider_id',"ASC")->get();
        $edit_provider = Provider::find($provider_id);

        return view('admin.provider.provider')->with(compact('edit_provider'))->with(compact('all_provider'));
    }

    public function update_provider(Request $request, $provider_id){
        $data = $request->all();
        $provider = Provider::find($provider_id);
        $provider->provider_name = $data['provider_name'];
        $provider->provider_code = $data['provider_code'];
        $provider->provider_email = $data['provider_email'];
        $provider->provider_phone = $data['provider_phone'];
        $provider->provider_address = $data['provider_address'];
        $get_image = $request->file('provider_logo');

        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$data['provider_logo']->getClientOriginalExtension();
            $get_image->move('public/uploads/provider',$new_image);
            $data['provider_logo'] = $new_image;
        }
        $provider->provider_logo = $data['provider_logo'];

        $provider->save();
        Session::put('message','Cập nhật danh mục bài viết thành công');
        return redirect('/provider');
    }
    public function delete_provider($provider_id){
        $delete_provider = Provider::find($provider_id);
        $delete_provider->delete();
        Session::put('message','Xóa danh mục bài viết thành công');
        return redirect('/provider');
    }
}
