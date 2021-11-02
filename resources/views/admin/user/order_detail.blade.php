@extends('admin_layout')
@section('admin_content')
    <div class="table-agile-info">

        <div class="panel panel-default">
            <div class="panel-heading">
                Thông tin đăng nhập
            </div>

            <div class="table-responsive">
                <?php
                $message = Session::get('message');
                if($message){
                    echo '<span class="text-alert">'.$message.'</span>';
                    Session::put('message',null);
                }
                ?>
                <table class="table table-striped b-t b-light">
                    <thead>
                    <tr>

                        <th>Tên khách hàng</th>
                        <th>Số điện thoại</th>
                        <th>Email</th>

                        <th style="width:30px;"></th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->phone}}</td>
                        <td>{{$user->email}}</td>
                    </tr>

                    </tbody>
                </table>

            </div>

        </div>
    </div>
    <br>
    <div class="table-agile-info">

        <div class="panel panel-default">
            <div class="panel-heading">
                Thông tin vận chuyển hàng
            </div>


            <div class="table-responsive">
                <?php
                $message = Session::get('message');
                if($message){
                    echo '<span class="text-alert">'.$message.'</span>';
                    Session::put('message',null);
                }
                ?>
                <table class="table table-striped b-t b-light">
                    <thead>
                    <tr>

                        <th>Tên người vận chuyển</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Ghi chú</th>

                        <th style="width:30px;"></th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr>

                        <td>{{$receiver->receiver_name}}</td>
                        <td>{{$receiver->receiver_address}}</td>
                        <td>{{$receiver->receiver_phone}}</td>
                        <td>{{$receiver->receiver_note}}</td>

                    </tr>

                    </tbody>
                </table>

            </div>

        </div>
    </div>
    <br><br>

    <div class="table-agile-info">

        <div class="panel panel-default">
            <div class="panel-heading">
                Liệt kê chi tiết đơn hàng
            </div>

            <div class="table-responsive">
                <?php
                $message = Session::get('message');
                if($message){
                    echo '<span class="text-alert">'.$message.'</span>';
                    Session::put('message',null);
                }
                ?>

                <table class="table table-striped b-t b-light">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Hinh Anh</th>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Giá sản phẩm</th>
                        <th>Thanh tien</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($order_detail as $key => $detail)
                        <tr>

                            <td>{{$key+1}}</td>
                            <td><img src="public/uploads/product/{{$detail->product_image }}" height="100" width="100"></td>
                            <td>{{$detail->product_name}}</td>
                            <td>{{$detail->order_detail_amount}}</td>
                            <td>{{number_format($detail->product_price ,0,',','.')}}VND</td>

                            <td>{{number_format(($detail->product_price)*($detail->order_detail_amount) ,0,',','.')}}đ</td>
                        </tr>
                    @endforeach

{{--                        <td colspan="6">--}}
{{--                            @foreach($order as $key => $or)--}}
{{--                                @if($or->order_status==1)--}}
{{--                                    <form>--}}
{{--                                        @csrf--}}
{{--                                        <select class="form-control order_details">--}}
{{--                                            <option value="">----Chọn hình thức đơn hàng-----</option>--}}
{{--                                            <option id="{{$or->order_id}}" selected value="1">Chưa xử lý</option>--}}
{{--                                            <option id="{{$or->order_id}}" value="2">Đã xử lý-Đã giao hàng</option>--}}
{{--                                            <option id="{{$or->order_id}}" value="3">Hủy đơn hàng-tạm giữ</option>--}}
{{--                                        </select>--}}
{{--                                    </form>--}}
{{--                                @elseif($or->order_status==2)--}}
{{--                                    <form>--}}
{{--                                        @csrf--}}
{{--                                        <select class="form-control order_details">--}}
{{--                                            <option value="">----Chọn hình thức đơn hàng-----</option>--}}
{{--                                            <option id="{{$or->order_id}}" value="1">Chưa xử lý</option>--}}
{{--                                            <option id="{{$or->order_id}}" selected value="2">Đã xử lý-Đã giao hàng</option>--}}
{{--                                            <option id="{{$or->order_id}}" value="3">Hủy đơn hàng-tạm giữ</option>--}}
{{--                                        </select>--}}
{{--                                    </form>--}}

{{--                                @else--}}
{{--                                    <form>--}}
{{--                                        @csrf--}}
{{--                                        <select class="form-control order_details">--}}
{{--                                            <option value="">----Chọn hình thức đơn hàng-----</option>--}}
{{--                                            <option id="{{$or->order_id}}" value="1">Chưa xử lý</option>--}}
{{--                                            <option id="{{$or->order_id}}"  value="2">Đã xử lý-Đã giao hàng</option>--}}
{{--                                            <option id="{{$or->order_id}}" selected value="3">Hủy đơn hàng-tạm giữ</option>--}}
{{--                                        </select>--}}
{{--                                    </form>--}}

{{--                                @endif--}}
{{--                            @endforeach--}}


{{--                        </td>--}}
{{--                    </tr>--}}
                    </tbody>
                </table>
{{--                <a target="_blank" href="{{url('/print-order/'.$details->order_code)}}">In đơn hàng</a>--}}
            </div>

        </div>
    </div>
@endsection
