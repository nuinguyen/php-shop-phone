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
                    Thêm Banner
                </header>

                <div class="panel-body">

                    <div class="position-center">
                        <form role="form" action="{{URL::to('/add-banner')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên slide</label>
                                <input type="text" name="banner_name" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Hình ảnh</label>
                                <input type="file" name="banner_image" class="form-control" id="exampleInputEmail1" placeholder="Slide">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả slider</label>
                                <textarea style="resize: none" rows="8" class="form-control" name="banner_desc" id="exampleInputPassword1" placeholder="Mô tả danh mục"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Hiển thị</label>
                                <select name="banner_status" class="form-control input-sm m-bot15">
                                    <option value="1">Hien</option>
                                    <option value="0">An</option>

                                </select>
                            </div>

                            <button type="submit" name="add_banner" class="btn btn-info">Thêm slider</button>
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
                            <th>Tên slide</th>
                            <th>Hình ảnh</th>
                            <th>Tình trạng</th>
                            <th style="width:30px;"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($all_banner as $key => $banner)
                            <tr>
                                <td>{{ $banner->banner_name }}</td>
                                <td><img src="public/uploads/banner/{{ $banner->banner_image }}" height="120" width="500"></td>
                                <td>
                                    @if($banner->banner_status==1)
                                        hien
                                    @else
                                        An
                                    @endif
                                </td>

                                <td>
                                    <a onclick="return confirm('Bạn có chắc là muốn xóa slide này ko?')" href="{{URL::to('/delete-slide/'.$banner->banner_id)}}" class="active styling-edit" ui-toggle-class="">
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
