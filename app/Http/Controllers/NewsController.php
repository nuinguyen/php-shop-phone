<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class NewsController extends Controller
{

    public function news(){
        $news=News::orderby('news_id',"ASC")->get();
        return view('admin.news.news')->with(compact('news'));
    }

    public function save_news(Request $request){
        $data = $request->all();
        $news = new News();
        $news->news_name = $data['news_name'];
        $news->news_slug = $data['news_slug'];
        $news->news_desc = $data['news_desc'];
        $news->news_status = $data['news_status'];
        $news->save();

        Session::put('message','Thêm danh mục bài viết thành công');
        return redirect('/news');
    }
    public function edit_news($news_id){
        $news=News::orderby('news_id',"ASC")->get();
        $edit_news = News::find($news_id);

        return view('admin.news.news')->with(compact('edit_news'))->with(compact('news'));
    }

    public function update_news(Request $request, $news_id){
        $data = $request->all();
        $news = News::find($news_id);
        $news->news_name = $data['news_name'];
        $news->news_slug = $data['news_slug'];
        $news->news_desc = $data['news_desc'];
        $news->news_status = $data['news_status'];
        $news->save();
        Session::put('message','Cập nhật danh mục bài viết thành công');
        return redirect('/news');
    }
    public function delete_producer($producer_id){
        $delete_producer = Producer::find($producer_id);
        $delete_producer->delete();
        Session::put('message','Xóa danh mục bài viết thành công');
        return redirect('/producer');
    }
}
