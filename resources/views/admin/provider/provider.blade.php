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
                        <form role="form" action="{{(isset($edit_provider)) ? URL::to('/update-provider', $edit_provider->provider_id) : URL::to('/save-provider')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{(isset($edit_provider)) ? method_field('post') : ""}}
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Tên</label>
                                <div class="col-sm-9">
                                    <input type="text"  class="form-control"  onkeyup="ChangeToSlug();" name="provider_name"  value="{{(isset($edit_provider)) ? $edit_provider->provider_name : ""}}"  id="slug" placeholder="danh mục" >
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Code</label>
                                <div class="col-sm-9">
                                    <input required type="text" class="form-control" name="provider_code" value="{{(isset($edit_provider)) ? $edit_provider->provider_code : ""}}" placeholder="type">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input required type="text" class="form-control" name="provider_email" value="{{(isset($edit_provider)) ? $edit_provider->provider_email : ""}}" placeholder="value">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Phone</label>
                                <div class="col-sm-9">
                                    <input required type="text" class="form-control" name="provider_phone" value="{{(isset($edit_provider)) ? $edit_provider->provider_phone : ""}}" placeholder="value">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Address</label>
                                <div class="col-sm-9">
                                    <input required type="text" class="form-control" name="provider_address" value="{{(isset($edit_provider)) ? $edit_provider->provider_address : ""}}" placeholder="value">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Hình ảnh</label>
                                <div class="col-sm-9">
                                    <input type="file" name="provider_logo"  class="form-control" id="exampleInputEmail1">

                                    @if(isset($edit_provider))
                                        <img src="{{URL::to('public/uploads/provider/'.$edit_provider->provider_logo)}}" height="100" width="100">;
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
                            <button type="submit" name="add_category_product" class="btn btn-info center-block">{{(isset($edit_provider)) ? "Cập nhật" : "Lưu"}}</button>
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
                        @foreach($all_provider as $key => $provider_all)
                            <tr id="{{$provider_all->provider_id}} ">
                                <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                                <td>{{ $i++ }}</td>
                                <td>{{ $provider_all->provider_name ." (".$provider_all->provider_code.")" }}</td>
                                <td><img src="public/uploads/provider/{{ $provider_all->provider_logo }}" height="100" width="100"></td>
                                <td>{{ $provider_all->provider_email }}</td>
                                <td>{{ $provider_all->provider_phone }}</td>
                                <td>{{ $provider_all->provider_address }}</td>
                                <td>
                                    <a href="{{URL::to('/edit-provider/'.$provider_all->provider_id)}}" class="active styling-edit" ui-toggle-class="">
                                        <i class="fa fa-pencil-square-o text-success text-active"></i></a>
                                    <a onclick="return confirm('Bạn có chắc là muốn xóa danh mục này ko?')" href="{{URL::to('/delete-provider/'.$provider_all->provider_id)}}" class="active styling-edit" ui-toggle-class="">
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
