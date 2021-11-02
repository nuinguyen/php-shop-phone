@extends('layout')
@section('content')

<div class="features_items">
    <style type="text/css">
        input.btn.btn-default.add-to-cart
        {
            position: relative;
            width: 49%;
            background: orange;
            color: white;

        }
        .productinfo h4{
            margin-top: 20px;
        }

</style>
        <h2 class="title text-center">San pham moi nha</h2>
    @foreach($product as $key => $pro)
        @if($key<6)
    <div class="col-sm-4">
        <div class="product-image-wrapper">
            <div class="single-products">
                <div class="productinfo text-center">
{{--                        <input type="hidden" value="{{$pro->product_id}}" class="cart_product_id_{{$pro->product_id}}">--}}
{{--                        <input type="hidden" value="{{$pro->product_name}}" class="cart_product_name_{{$pro->product_id}}">--}}
{{--                        <input type="hidden" value="{{$pro->product_image}}" class="cart_product_image_{{$pro->product_id}}">--}}
{{--                        <input type="hidden" value="{{$pro->product_price}}" class="cart_product_price_{{$pro->product_id}}">--}}
{{--                        <input type="hidden" value="1" class="cart_product_amount_{{$pro->product_id}}">--}}

                        <a href="{{URL::to('chi-tiet-san-pham/'.$pro->product_id)}}">
                    <img src="{{URL::to('public/uploads/product/'.$pro->product_image)}}" alt="" />
                        <h4 >{{$pro->product_name}}</h4>
                    </a>
                    <h2>{{number_format($pro->product_price,0,',','.').' '.'VNĐ'}}</h2>
                    <form>
                        @csrf
                        <input type="button"  value="Thêm giỏ hàng"  class="btn btn-default add-to-cart xemnhanh"  data-toggle="modal" data-target="#xemnhanh" data-id_product="{{$pro->product_id}}">
                        <input type="button" value="Yeeu thich" class="btn btn-default add-to-cart" data-id_product="{{$pro->product_id}}" >
                    </form>
                </div>
            </div>
            <div class="choose">

            </div>
        </div>
    </div>
        @endif
    @endforeach
</div>
@foreach($category as $key => $cate)
    <div class="features_items">
    <h2 class="title text-center">{{$cate->category_name}}</h2>
        @foreach($product as $key => $pro)
            @if($pro->category_id==$cate->category_id)
{{--                @if($key<6)--}}
        <div class="col-sm-4">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">

                            <a href="{{URL::to('chi-tiet-san-pham/'.$pro->product_id)}}">
                        <img src="{{URL::to('public/uploads/product/'.$pro->product_image)}}" alt="" />
                        <h4>{{$pro->product_name}}</h4>
                        </a>
                        <h2>{{number_format($pro->product_price,0,',','.').' '.'VNĐ'}}</h2>
                        <form>
                            @csrf
                            <input type="button"  value="Thêm giỏ hàng"  class="btn btn-default add-to-cart xemnhanh"  data-toggle="modal" data-target="#xemnhanh" data-id_product="{{$pro->product_id}}">
                            <input type="button" value="Yeeu thich" class="btn btn-default add-to-cart" data-id_product="{{$pro->product_id}}" >
                        </form>
                    </div>

                </div>

            </div>
        </div>
{{--                @endif--}}
            @endif
        @endforeach
    </div>
@endforeach
<!-- Modal xem nhanh-->
<div class="modal fade" id="xemnhanh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg"  role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title product_quickview_title" id="">

                    <span id="product_quickview_title"></span>

                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <style type="text/css">
                    span#product_quickview_content img {
                        width: 100%;
                    }
                    h5.modal-title.product_quickview_title{
                        text-align: center;
                        font-size: xx-large;
                    }
                    span#product_quickview_title{
                        color: orange;
                    }

                    @media screen and (min-width: 768px) {
                        .modal-dialog {
                            width: 700px; /* New width for default modal */
                        }
                        .modal-sm {
                            width: 350px; /* New width for small modal */
                        }
                    }

                    @media screen and (min-width: 992px) {
                        .modal-lg {
                            width: 1200px; /* New width for large modal */
                        }
                    }
                </style>

                <div class="row">
                    <div class="col-md-5">
                        <span id="product_quickview_image"></span>
                    </div>

                        <div id="product_quickview_value"></div>
                        <div class="col-md-7">
                            <h2 style="color: orange" ><span id="product_quickview_title"></span></h2>
                            <p>Mã ID: <span id="product_quickview_id"></span></p>
                            <p style="font-size: 20px; color: brown;font-weight: bold;">Giá sản phẩm : <span id="product_quickview_price"></span></p>

                            <p><span id="product_quickview_classify"></span></p>
                            <form>
                            @csrf
                            <label>Số lượng:</label>

                            <input name="qty" type="number" min="1" class="cart_product_amount"  value="1" />
                            </form>

                            </span>
                            <h4 style="font-size: 20px; color: brown;font-weight: bold;">Mô tả sản phẩm</h4>
                            <hr>
                            <p><span id="product_quickview_desc"></span></p>
                            <p><span id="product_quickview_content"></span></p>

                            <div id="product_quickview_button"></div>
                            <div id="beforesend_quickview"></div>
                        </div>

                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-default redirect-cart">Đi tới giỏ hàng</button>
            </div>
        </div>
    </div>
</div>
{{--  <ul class="pagination pagination-sm m-t-none m-b-none">
  {!!$all_product->links()!!}
 </ul> --}}


@endsection
