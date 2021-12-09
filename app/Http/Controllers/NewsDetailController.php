<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Category;
use App\News;
use App\NewsDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class NewsDetailController extends Controller
{
    public function show_news($news_id){
        $category=Category::where('category_status','1')->orderby('category_id','asc')->get();
        $news=News::where('news_status','1')->orderby('news_id','asc')->get();
        $all_banner = Banner::orderBy('banner_id','DESC')->get();

        $news_detail=NewsDetail::orderby('news_id')->where('news_id',$news_id)->get();
        return view('pages.news.show_news')->with(compact('news_detail','category','all_banner','news'));
    }
    public function show_news_detail($news_detail_id){
        $category=Category::where('category_status','1')->orderby('category_id','asc')->get();
        $news=News::where('news_status','1')->orderby('news_id','asc')->get();
        $all_banner = Banner::orderBy('banner_id','DESC')->get();
        $news_detail=NewsDetail::orderby('news_id')->where('news_detail_id',$news_detail_id)->get();
        return view('pages.news.show_news_detail')->with(compact('news_detail','category','all_banner','news'));
    }
    public function news_detail(){
        $news=News::orderby('news_id',"ASC")->get();
        return view('admin.news.news_detail')->with(compact('news'));
    }
    public function all_news_detail(){
        $news_detail=NewsDetail::orderby('news_detail_id',"ASC")
            ->join('tbl_news','tbl_news.news_id','=','tbl_news_detail.news_id')
            ->get();
        return view('admin.news.all_news_detail')->with(compact('news_detail'));
    }

    public function save_news_detail(Request $request){
        $data = $request->all();
        $news_detail = new NewsDetail();
        $news_detail->news_detail_name = $data['news_detail_name'];
        $news_detail->news_detail_slug = $data['news_detail_slug'];
        $news_detail->news_detail_status = $data['news_detail_status'];
        $news_detail->news_detail_summary = $data['news_detail_summary'];
        $news_detail->news_detail_desc = $data['news_detail_desc'];
        $news_detail->news_id = $data['news_id'];
        $get_image = $request->file('news_detail_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$data['news_detail_image']->getClientOriginalExtension();
            $get_image->move('public/uploads/news',$new_image);
            $data['news_detail_image'] = $new_image;
        }
        $news_detail->news_detail_image = $data['news_detail_image'];
        $news_detail->save();
        Session::put('message','Thêm danh mục bài viết thành công');
        return redirect('/news_detail');
    }


    public function edit_producer($producer_id){
        $all_producer=Producer::orderby('producer_id',"ASC")->get();
        $edit_producer = Producer::find($producer_id);

        return view('admin.producer.producer')->with(compact('edit_producer'))->with(compact('all_producer'));
    }

    public function update_producer(Request $request, $producer_id){
        $data = $request->all();
        $news_detail = NewsDetail::find($producer_id);
        $news_detail->producer_name = $data['producer_name'];
        $news_detail->producer_slug = $data['producer_slug'];
        $news_detail->producer_code = $data['producer_code'];
        $news_detail->producer_email = $data['producer_email'];
        $news_detail->producer_phone = $data['producer_phone'];
        $news_detail->producer_address = $data['producer_address'];
        $get_image = $request->file('producer_logo');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$data['producer_logo']->getClientOriginalExtension();
            $get_image->move('public/uploads/producer',$new_image);
            $data['producer_logo'] = $new_image;
        }
        $news_detail->producer_logo = $data['producer_logo'];
        $news_detail->save();
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
