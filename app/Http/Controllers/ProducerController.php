<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Producer;
use Illuminate\Support\Facades\Redirect;

class ProducerController extends Controller
{
    public function producer(){
        $all_producer=Producer::orderby('producer_id',"ASC")->get();
        return view('admin.producer.producer')->with(compact('all_producer'));
    }



    public function save_producer(Request $request){
        $data = $request->all();
        $producer = new Producer();
        $producer->producer_name = $data['producer_name'];
        $producer->producer_slug = $data['producer_slug'];
        $producer->producer_code = $data['producer_code'];
        $producer->producer_email = $data['producer_email'];
        $producer->producer_phone = $data['producer_phone'];
        $producer->producer_address = $data['producer_address'];

        $get_image = $request->file('producer_logo');

        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$data['producer_logo']->getClientOriginalExtension();
            $get_image->move('public/uploads/producer',$new_image);
            $data['producer_logo'] = $new_image;
        }
        $producer->producer_logo = $data['producer_logo'];
        $producer->save();
        Session::put('message','Thêm danh mục bài viết thành công');
        return redirect('/producer');
    }
    public function edit_producer($producer_id){
        $all_producer=Producer::orderby('producer_id',"ASC")->get();
        $edit_producer = Producer::find($producer_id);

        return view('admin.producer.producer')->with(compact('edit_producer'))->with(compact('all_producer'));
    }

    public function update_producer(Request $request, $producer_id){
        $data = $request->all();
        $producer = Producer::find($producer_id);
        $producer->producer_name = $data['producer_name'];
        $producer->producer_slug = $data['producer_slug'];
        $producer->producer_code = $data['producer_code'];
        $producer->producer_email = $data['producer_email'];
        $producer->producer_phone = $data['producer_phone'];
        $producer->producer_address = $data['producer_address'];
        $get_image = $request->file('producer_logo');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$data['producer_logo']->getClientOriginalExtension();
            $get_image->move('public/uploads/producer',$new_image);
            $data['producer_logo'] = $new_image;
        }
        $producer->producer_logo = $data['producer_logo'];
        $producer->save();
        Session::put('message','Cập nhật danh mục bài viết thành công');
        return redirect('/producer');
    }
    public function delete_producer($producer_id){
        $delete_producer = Producer::find($producer_id);
        $delete_producer->delete();
        Session::put('message','Xóa danh mục bài viết thành công');
        return redirect('/producer');
    }
}
