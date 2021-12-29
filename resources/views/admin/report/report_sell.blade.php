@extends('admin_layout')
@section('admin_content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Liệt kê sản phẩm
            </div>
            <div class="row w3-res-tb">
                <div class="col-sm-4 m-b-xs">
                    <select class="input-sm form-control w-sm inline v-middle">
                        <option value="1">Thang 1</option>
                        <option value="2">Thang 2</option>
                        <option value="3">Thang 3</option>
                        <option value="4">Thang 4</option>
                    </select>
                </div>
                <div class="col-sm-4 m-b-xs">
                    <select class="input-sm form-control w-sm inline v-middle">
                        <option value="19">2019</option>
                        <option value="20">2020</option>
                        <option value="21">2021</option>
                        <option value="22">2022</option>
                    </select>
                </div>
                <div class="col-sm-2">
                </div>
                <div class="col-sm-2">
                    <div class="input-group">
                        <input type="text" class="input-sm form-control" placeholder="Search">
                        <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
                        </span>
                    </div>
                </div>
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
                        <th>Anh</th>
                        <th>Tên sản phẩm</th>
                        <th>So luong ban</th>
                        <th>Tong tien</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($warehouse as $key => $item)
                        <tr>
                            <td>{{$item->product_id}}</td>
                            {{--                            <td><img src="public/uploads/product/{{ $pro->product_image }}" height="100" width="100"></td>--}}
                            <td>{{ $item->product_name }}</td>
                            <td>{{ $item->product_name }}</td>
                            <td>{{ $item->sum}}</td>
                            <td>{{ $item->sum*$item->product_price}}</td>
{{--                            <td>{{ $item->sum*$item->product_price }}</td>--}}
{{--                            <td>{{ $item->sum_import }}</td>--}}
{{--                            <td>{{ $item->sum_export }}</td>--}}

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <footer class="panel-footer">
                <div class="row">

                    <div class="col-sm-5 text-center">
                        <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
                    </div>
                    <div class="col-sm-7 text-right text-center-xs">
                        <ul class="pagination pagination-sm m-t-none m-b-none">
                            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
                            <li><a href="">1</a></li>
                            <li><a href="">2</a></li>
                            <li><a href="">3</a></li>
                            <li><a href="">4</a></li>
                            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
                        </ul>
                    </div>
                </div>
            </footer>
        </div>
    </div>
@endsection
