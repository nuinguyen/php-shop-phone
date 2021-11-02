@extends('layout')
@section('content')
    <div class="features_items"><!--features_items-->
        <style>
            .shop-menuuu ul li a{
                color: #0a90eb;
            }
            .shop-menuuu ul li {
                margin-bottom: 50px;
            }
            .shop-menuuu ul li .fa{
                margin-left: 20px;
            }
            .shop-menuu p {
                color: red;
            }
        </style>
        <h2 class="title text-center">THONG TIN VAN CHUYEN</h2>
        <form >
            @csrf
        <div class="col-sm-12">
            <div class="shop-menuuu col-lg-pull-12">
                <ul class="nav nav-tabs">
                    <li class="e"><a href="#details" id="1" name="ship" class="ship"  data-toggle="tab">DANG XU LY</a></li>
                    <li class="e"><a href="#companyprofile" name="ship" id="2"  class="ship" data-toggle="tab">DANG GIAO</a></li>
                    <li class="e" ><a href="#reviews" name="ship" id="3" class="ship" data-toggle="tab">GiAO THANH CONG</a></li>
                    <li > <i class="fa fa-3x fa-hand-o-left"></i></li>
                </ul>
            </div>
        <div class="col-sm-12">
            <div id="load_delivery">
                <img src="public/images/shipper.jpg" height="100%" width="100%">
                {{--            <table class="table table-striped b-t b-light">--}}
                {{--                <thead>--}}
                {{--                <tr>--}}
                {{--                    <th>STT</th>--}}
                {{--                    <th>Hinh Anh</th>--}}
                {{--                    <th>Tên sản phẩm</th>--}}
                {{--                    <th>Số lượng</th>--}}
                {{--                    <th>Giá sản phẩm</th>--}}
                {{--                    <th>Thanh tien</th>--}}
                {{--                </tr>--}}
                {{--                </thead>--}}
                {{--                <tbody>--}}
                {{--                @foreach($order_detail as $key => $detail)--}}
                {{--                    <tr>--}}

                {{--                        <td>{{$key+1}}</td>--}}
                {{--                        <td><img src="public/uploads/product/{{$detail->product_image }}" height="100" width="100"></td>--}}
                {{--                        <td>{{$detail->product_name}}</td>--}}
                {{--                        <td>{{$detail->order_detail_amount}}</td>--}}
                {{--                        <td>{{number_format($detail->product_price ,0,',','.')}}VND</td>--}}

                {{--                        <td>{{number_format(($detail->product_price)*($detail->order_detail_amount) ,0,',','.')}}đ</td>--}}
                {{--                    </tr>--}}
                {{--                @endforeach--}}
                {{--                </tbody>--}}
                {{--            </table>--}}
            </div>
        </div>

            <div class="shop-menuu col-sm-12">
                <p style="text-align: center; ">THONG TIN DON HANG </p>
            </div>
        </div>
        </form>
    </div><!--features_items-->
    <!--/recommended_items-->
@endsection
