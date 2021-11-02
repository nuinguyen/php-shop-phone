
@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm mã giảm giá
                </header>
                <?php
                $message = Session::get('message');
                if($message){
                    echo '<span class="text-alert">'.$message.'</span>';
                    Session::put('message',null);
                }
                ?>
                <style type="text/css">
                    table.tab {
                        margin-left: 30%;
                    }
                </style>
                <div class="panel-body">

                    <div class="position-center">
                        <form role="form" action="{{URL::to('/insert-sale')}}" method="post">
                            @csrf
                            <div class="form-group row">
                                <label for="exampleInputEmail1" class="col-sm-3 text-right">Tên mã giảm giá</label>
                                <div class="col-sm-9">
                                    <input type="text" name="sale_name" class="form-control" id="exampleInputEmail1" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Mã giảm giá</label>
                                <div class="col-sm-9">
                                    <input type="text" name="sale_code" class="form-control" id="exampleInputEmail1" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputPassword1" class="col-sm-3 text-right">Tính năng mã</label>
                                <div class="col-sm-9">
                                    <select name="sale_condition" class="form-control input-sm m-bot15">
                                        <option value="1">Giảm theo phần trăm</option>
                                        <option value="2">Giảm theo tiền</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputPassword1" class="col-sm-3 text-right" >Nhập số % hoặc tiền giảm</label>
                                <div class="col-sm-9">
                                    <input type="text" name="sale_number" class="form-control" id="exampleInputEmail1" >
                                </div>
                            </div>
                            <table class="tab">
                                <tr>
                                    <td>
                                        <div class="form-group ">
                                            <label for="exampleInputPassword1">Số lượng mã</label>
                                            <input type="text" name="sale_amount" class="form-control" id="exampleInputEmail1" >
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group ">
                                            <label for="exampleInputPassword1" >Trang thai</label>

                                            <select name="sale_status" class="form-control input-sm m-bot15">
                                                <option value="0">chua su dung</option>
                                                <option value="1">dang</option>
                                                <option value="2">het han</option>
                                            </select>

                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <label for="fname" class=" control-label col-form-label">Từ ngày (*)</label>
                                            <input required type="date" class="form-control datetime" name="start_time"  value="">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <label for="fname" class=" control-label col-form-label">Đến ngày (*)</label>
                                            <input required type="date" class="form-control datetime" name="end_time"  value="">
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            <center>
                                <button type="submit" name="add_sale" class="btn btn-info">Thêm mã</button>
                            </center>
                        </form>
                    </div>
                    <div class="panel-body">

                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thread>
                                    <tr>
                                        <th>Tên Ma Giam Gia</th>
                                        <th>Code</th>
                                        <th>Giam</th>
                                        <th>Dieu Kien</th>
                                        <th>So Luong</th>
                                        <th>Trang Thai</th>
                                        <th>Ngay Bat Dau</th>
                                        <th>Ngay Het Han</th>
                                        <th></th>
                                    </tr>
                                </thread>
                                <tbody>

                                @foreach($sale as $key => $sa)

                                    <tr>
                                        <td>{{$sa->sale_name}}</td>
                                        <td>{{$sa->sale_code}}</td>
                                        <td>{{$sa->sale_number}}</td>
                                        <td>
                                            @if($sa->sale_condition==1)
                                                Giam %
                                            @else
                                                Giam Tien
                                            @endif
                                        </td>
                                        <td>{{$sa->sale_amount}}</td>
                                        <td>
                                            @if($sa->sale_status==0)
                                                Chua Giam Gia
                                            @elseif($sa->sale_status==1)
                                                Dang Giam
                                            @else
                                                Het han
                                            @endif
                                        </td>
                                        <td>{{$sa->start_time}}</td>
                                        <td>{{$sa->end_time}}</td>
                                        <td>
                                            <a onclick="return confirm('Bạn có chắc là muốn xóa danh mục này ko?')" href="{{URL::to('/delete-sale/'.$sa->sale_id)}}" class="active styling-edit" ui-toggle-class="">
                                                <i class="fa fa-times text-danger text"></i>
                                            </a>
                                        </td>

                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>

        </div>
@endsection
