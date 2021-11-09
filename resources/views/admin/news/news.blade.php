@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <?php
        $message = Session::get('message');
        if($message){
            echo '<span class="text-alert">'.$message.'</span>';
            Session::put('message',null);
        }
        ?>
        <div class="col-lg-5">
            <section class="panel">
                <header class="panel-heading">
                    Thêm Bai viet
                </header>

                <div class="panel-body">

                    <div class="position">
                        <form role="form" action="{{(isset($edit_news)) ? URL::to('/update-news', $edit_news->news_id) : URL::to('/save-news')}}" method="post">
                            {{ csrf_field() }}
                            {{(isset($edit_news)) ? method_field('post') : ""}}
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Tên Danh muc</label>
                                <div class="col-sm-9">
                                <input type="text"  class="form-control"  onkeyup="ChangeToSlug();" name="news_name"  value="{{(isset($edit_news)) ? $edit_news->news_name : ""}}"  id="slug" placeholder="danh mục" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Slug</label>
                                <div class="col-sm-9">
                                <input type="text" name="news_slug" class="form-control" value="{{(isset($edit_news)) ? $edit_news->news_slug : ""}}" id="convert_slug" placeholder="Tên danh mục">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Desc</label>
                                <div class="col-sm-9">
                                    <input required type="text" class="form-control" name="news_desc" value="{{(isset($edit_news)) ? $edit_news->news_desc : ""}}" placeholder="value">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Trang thai</label>
                                <div class="col-sm-9">
                                    <select name="news_status" class="form-control input-sm m-bot15">
                                        <option value="1">Hien</option>
                                        <option value="0">An</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" name="add_category_product" class="btn btn-info center-block">{{(isset($edit_news)) ? "Cập nhật" : "Lưu"}}</button>
                        </form>
                    </div>

                </div>

            </section>
        </div>
        <div class="col-lg-7">
            <section class="panel">

                <div class="panel-heading">
                    Liệt kê danh mục sản phẩm
                </div>
                <div class="table-responsive">
                    <table class="table table-striped b-t b-light">
                        <thead>
                        <tr>
                            <th style="width:20px;">
                                <label class="i-checks m-b-none">
                                    <input type="checkbox"><i></i>
                                </label>
                            </th>
                            <th>STT</th>
                            <th>Tên</th>
                            <th>Desc</th>
                            <th>Trang thai</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i=1;
                        ?>
                        @foreach($news as $key => $all_news)
                            <tr id="{{$all_news->news_id}} ">
                                <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                                <td>{{ $i++ }}</td>
                                <td>{{ $all_news->news_name}}</td>
                                <td>{{ $all_news->news_desc }}</td>
                                <td>
                                    @if($all_news->news_status==1)
                                        Hiển thị
                                    @else
                                        Ẩn
                                    @endif
                                </td>
                                <td>
                                    <a href="{{URL::to('/edit-news/'.$all_news->news_id)}}" class="active styling-edit" ui-toggle-class="">
                                        <i class="fa fa-pencil-square-o text-success text-active"></i></a>
                                    <a onclick="return confirm('Bạn có chắc là muốn xóa danh mục này ko?')" href="{{URL::to('/delete-news/'.$all_news->news_id)}}" class="active styling-edit" ui-toggle-class="">
                                        <i class="fa fa-times text-danger text"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>
@endsection
