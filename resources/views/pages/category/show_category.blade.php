@extends('layout')
@section('content')

    <div class="features_items">
        @foreach($category_name as $key => $name)
        <h2 class="title text-center">San pham {{$name->category_name}}</h2>
        @endforeach
        @foreach($product as $key => $pro)
            @if($key<6)
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <a href="{{URL::to('chi-tiet-san-pham/'.$pro->product_id)}}">
                                <img src="{{URL::to('public/uploads/product/'.$pro->product_image)}}" alt="" />
                                <h4>{{$pro->product_name}}</h4>
                                </a>
                                <h2>{{number_format($pro->product_price,0,',','.').' '.'VNĐ'}}</h2>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>

                        </div>
                        <div class="choose">
                            <ul class="nav nav-pills nav-justified">
                                <li><a href="#"><i class="fa fa-plus-square"></i>Yeu Thich</a></li>
                                <li><a href="#"><i class="fa fa-plus-square"></i>So sanh</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>


@endsection
