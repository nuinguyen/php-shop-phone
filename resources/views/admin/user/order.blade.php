@extends('admin_layout')
@section('admin_content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Liệt kê đơn hàng
            </div>
            <div class="row w3-res-tb">



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

                        <th>Thứ tự</th>
                        <th>Ngay mua</th>
                        <th>Tong tien</th>
                        <th>Phi ship</th>
                        <th>Ma sale</th>
                        <th>Phuong thuc thanh toan</th>
                        <th>Trang thai</th>

                        <th style="width:30px;"></th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($order as $key => $ord)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{ $ord->created_at }}</td>
                            <td>{{ $ord->order_total }}</td>
                            <td>{{ $ord->order_ship }}</td>
                            <td>{{ $ord->order_sale }}</td>
                            <td>@if($ord->order_method==0)
                                    Thanh toan the
                                @else
                                    Tien mat
                                @endif
                            </td>
                            <td>
                                <form>
                                    @csrf
                                    <input type="hidden" name="order_id" class="order_id" value="{{$ord->order_id}}">
                                @if($ord->order_status==0)
                                    <select name="order_status" id="{{$ord->order_id}}" class="form-control order_status">
                                        <option id="{{$ord->order_id}}" selected value="0">Dang xử lý</option>
                                        <option id="{{$ord->order_id}}"  value="1">Dang giao</option>
                                        <option id="{{$ord->order_id}}"  value="2">Giao thanh cong</option>
                                    </select>
                                    @elseif($ord->order_status==1)
                                        <select name="order_status" id="{{$ord->order_id}}" class="form-control order_status">
                                            <option id="{{$ord->order_id}}" value="0">Dang xử lý</option>
                                            <option id="{{$ord->order_id}}" selected  value="1">Dang giao</option>
                                            <option id="{{$ord->order_id}}"  value="2">Giao thanh cong</option>
                                        </select>
                                    @else
                                        <select name="order_status" id="{{$ord->order_id}}" class="form-control order_status">
                                            <option id="{{$ord->order_id}}" value="0">Dang xử lý</option>
                                            <option id="{{$ord->order_id}}"  value="1">Dang giao</option>
                                            <option id="{{$ord->order_id}}" selected  value="2">Giao thanh cong</option>
                                        </select>
                                    @endif

                                </form>

                            </td>


                            <td>
                                <a href="{{URL::to('/order-detail/'.$ord->order_id)}}" class="active styling-edit" ui-toggle-class="">
                                    <i class="fa fa-eye text-success text-active"></i></a>

                                <a onclick="return confirm('Bạn có chắc là muốn xóa danh mục này ko?')" href="{{URL::to('/delete-order/'.$ord->order_id)}}" class="active styling-edit" ui-toggle-class="">
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
@endsection
