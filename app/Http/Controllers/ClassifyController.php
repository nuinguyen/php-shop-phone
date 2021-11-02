<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Classify;
use Illuminate\Support\Facades\Redirect;

class ClassifyController extends Controller
{
    public function classify(){
        $all_classify=Classify::orderby('classify_id',"ASC")->get();
        return view('admin.classify.classify')->with(compact('all_classify'));
    }



    public function save_classify(Request $request){
        $data = $request->all();
        $classify = new Classify();
        $classify->classify_type = $data['classify_type'];
        $classify->classify_value = $data['classify_value'];
        $classify->save();
        Session::put('message','Thêm danh mục bài viết thành công');
        return redirect('/classify');
    }
    public function edit_classify($classify_id){
        $all_classify=Classify::orderby('classify_id',"ASC")->get();
        $edit_classify = Classify::find($classify_id);

        return view('admin.classify.classify')->with(compact('edit_classify'))->with(compact('all_classify'));
    }

    public function update_classify(Request $request, $classify_id){
        $data = $request->all();
        $classify = Classify::find($classify_id);
        $classify->classify_type = $data['classify_type'];
        $classify->classify_value = $data['classify_value'];
        $classify->save();
        Session::put('message','Cập nhật danh mục bài viết thành công');
        return redirect('/classify');
    }
    public function delete_classify($classify_id){
        $delete_classify = Classify::find($classify_id);
        $delete_classify->delete();
        Session::put('message','Xóa danh mục bài viết thành công');
        return redirect()->back();
    }
}
