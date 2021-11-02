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
                        <form role="form" action="{{(isset($edit_classify)) ? URL::to('/update-classify', $edit_classify->classify_id) : URL::to('/save-classify')}}" method="post">
                            {{ csrf_field() }}
                            {{(isset($edit_classify)) ? method_field('post') : ""}}
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Loại (Size,..) *</label>
                                <div class="col-sm-9">
                                    <input required type="text" class="form-control" name="classify_type" placeholder="type" value="{{(isset($edit_classify)) ? $edit_classify->classify_type : ""}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Gia tri (XLM)</label>
                                <div class="col-sm-9">
                                    <input required type="text" class="form-control" name="classify_value" placeholder="value" value="{{(isset($edit_classify)) ? $edit_classify->classify_value: ""}}">
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
                            <button type="submit" name="add_category_product" class="btn btn-info center-block">{{(isset($edit_classify)) ? "Cập nhật" : "Lưu"}}</button>
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
                        @foreach($all_classify as $key => $classify_all)
                            <tr id="{{$classify_all->classify_id}}">
                                <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                                <td>{{ $i++ }}</td>
                                <td>{{ $classify_all->classify_type }}</td>
                                <td>{{ $classify_all->classify_value }}</td>
                                <td>
                                    <a href="{{URL::to('/edit-classify/'.$classify_all->classify_id)}}" class="active styling-edit" ui-toggle-class="">
                                        <i class="fa fa-pencil-square-o text-success text-active"></i></a>
                                    <a onclick="return confirm('Bạn có chắc là muốn xóa danh mục này ko?')" href="{{URL::to('/delete-classify/'.$classify_all->classify_id)}}" class="active styling-edit" ui-toggle-class="">
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
