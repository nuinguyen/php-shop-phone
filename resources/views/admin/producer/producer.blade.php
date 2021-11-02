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
                    Thêm Phan loai sản phẩm
                </header>

                <div class="panel-body">

                    <div class="position">
                        <form role="form" action="{{(isset($edit_producer)) ? URL::to('/update-producer', $edit_producer->producer_id) : URL::to('/save-producer')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{(isset($edit_producer)) ? method_field('post') : ""}}
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Tên</label>
                                <div class="col-sm-9">
                                <input type="text"  class="form-control"  onkeyup="ChangeToSlug();" name="producer_name"  value="{{(isset($edit_producer)) ? $edit_producer->producer_name : ""}}"  id="slug" placeholder="danh mục" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Slug</label>
                                <div class="col-sm-9">
                                <input type="text" name="producer_slug" class="form-control" value="{{(isset($edit_producer)) ? $edit_producer->producer_slug : ""}}" id="convert_slug" placeholder="Tên danh mục">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Code</label>
                                <div class="col-sm-9">
                                    <input required type="text" class="form-control" name="producer_code" value="{{(isset($edit_producer)) ? $edit_producer->producer_code : ""}}" placeholder="type">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input required type="text" class="form-control" name="producer_email" value="{{(isset($edit_producer)) ? $edit_producer->producer_email : ""}}" placeholder="value">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Phone</label>
                                <div class="col-sm-9">
                                    <input required type="text" class="form-control" name="producer_phone" value="{{(isset($edit_producer)) ? $edit_producer->producer_phone : ""}}" placeholder="value">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Address</label>
                                <div class="col-sm-9">
                                    <input required type="text" class="form-control" name="producer_address" value="{{(isset($edit_producer)) ? $edit_producer->producer_address : ""}}" placeholder="value">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Hình ảnh</label>
                                <div class="col-sm-9">
                                <input type="file" name="producer_logo"  class="form-control" id="exampleInputEmail1">

                                    @if(isset($edit_producer))
                                          <img src="{{URL::to('public/uploads/producer/'.$edit_producer->producer_logo)}}" height="100" width="100">;
                                   @endif


                                </div>
                            </div>
                            {{--                            <div class="form-group row">--}}
                            {{--                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Trang thai</label>--}}
                            {{--                                <div class="col-sm-9">--}}

                            {{--                                    <select name="classify_status" class="form-control input-sm m-bot15">--}}
                            {{--                                        <option value="1">Hien</option>--}}
                            {{--                                        <option value="0">An</option>--}}
                            {{--                                    </select>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                            <button type="submit" name="add_category_product" class="btn btn-info center-block">{{(isset($edit_producer)) ? "Cập nhật" : "Lưu"}}</button>
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
                            <th>Loai</th>
                            <th>Gia tri</th>
                            <th>Tac Vu</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i=1;
                        ?>
                        @foreach($all_producer as $key => $producer_all)
                            <tr id="{{$producer_all->producer_id}} ">
                                <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                                <td>{{ $i++ }}</td>
                                <td>{{ $producer_all->producer_name ." (".$producer_all->producer_code.")" }}</td>
                                <td><img src="public/uploads/producer/{{ $producer_all->producer_logo }}" height="100" width="100"></td>
                                <td>{{ $producer_all->producer_slug }}</td>
                                <td>{{ $producer_all->producer_email }}</td>
                                <td>{{ $producer_all->producer_phone }}</td>
                                <td>{{ $producer_all->producer_address }}</td>
                                <td>
                                    <a href="{{URL::to('/edit-producer/'.$producer_all->producer_id)}}" class="active styling-edit" ui-toggle-class="">
                                        <i class="fa fa-pencil-square-o text-success text-active"></i></a>
                                    <a onclick="return confirm('Bạn có chắc là muốn xóa danh mục này ko?')" href="{{URL::to('/delete-producer/'.$producer_all->producer_id)}}" class="active styling-edit" ui-toggle-class="">
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
