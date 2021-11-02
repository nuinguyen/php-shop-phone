
@extends('layout')
@section('content')

    <div class="product-details"><!--product-details-->
        <div class="col-sm-5">
            {{--                <div class="view-product">--}}
            {{--                    <img src="{{URL::to('public/uploads/product/'.$product[0]->product_image)}}" alt="" />--}}
            {{--                    <h3>ZOOM</h3>--}}
            {{--                </div>--}}
            <div id="similar-product" class="carousel slide" data-ride="carousel">
                <style type="text/css">
                    .lSSlideOuter .lSPager.lSGallery img {
                        display: block;
                        height: 100px;
                        max-width: 100%;
                    }
                    .lSSlideOuter img{
                        height: 300px;
                    }
                    li.active {
                        border: 2px solid #FE980F;
                    }
                    .add-to-cart{
                        color: white;
                    }
                    .product-information .add-cart{
                        width: 130px;
                        margin-bottom: 20px;
                        position: relative;
                        border: 2px solid #b36b00;
                    }
                </style>
                <ul id="imageGallery">
                    @foreach($albums as $key => $album)
                        <li data-thumb="{{asset('public/uploads/gallery/'.$album->albums_image)}}" data-src="{{asset('public/uploads/gallery/'.$album->albums_image)}}">
                            <img width="100%" alt="{{$album->albums_name}}"  src="{{asset('public/uploads/gallery/'.$album->albums_image)}}" />
                        </li>
                    @endforeach

                </ul>

            </div>
        </div>
        <div class="col-sm-7">
            <div class="product-information"><!--/product-information-->
                <img src="images/product-details/new.jpg" class="newarrival" alt="" />
                <h2>{{$product[0]->product_name}}</h2>
                <p>Web ID: {{$product[0]->product_id}}</p>
                <img src="images/product-details/rating.png" alt="" />

                <span><span>{{number_format($product[0]->product_price,0,',','.').' '.'VNĐ'}}</span></span>

                <div class="form-group">
                    @foreach($product as $key => $pro)
                        <button  name="tick" class="tick"  value="{{$pro->classify_id}}">{{$pro->classify_type.'-'.$pro->classify_value}}</button>
                    @endforeach
                </div>
                <div class="form-group">
                    <span>
                        <label>So luong:</label>
                        <input name="amount" class="amount" type="number" min="1" value="1" />
                        <input name="productid_hidden" type="hidden"  value="{{$product[0]->product_id}}" />
                    </span>
                </div>
                <form action="{{url('/cart')}}">
                    @csrf
                    <button  class="btn btn-primary btn-sm add-cart " data-id_product="{{$product[0]->product_id}}" name="add-to-cart">Mua ngay</button>
                </form>
                    @csrf
                <button  class="btn btn-primary btn-sm add-cart" data-id_product="{{$product[0]->product_id}}" name="add-cart"><i class="fa fa-shopping-cart"></i> Them Gio Hnag</button>

                <p><b>Tinh trang:</b> Con hang</p>
                <p><b>Dieu kien:</b> Moi 100</p>
                <p><b>Danh muc:</b>{{$product[0]->category_name}} </p>
                <a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
            </div><!--/product-information-->
        </div>
    </div><!--/product-details-->
    <div class="category-tab shop-details-tab"><!--category-tab-->
        <div class="col-sm-12">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#details" data-toggle="tab">Mo Ta san pham</a></li>
                <li><a href="#companyprofile" data-toggle="tab">Chi tiet san pham</a></li>
                <li ><a href="#reviews" data-toggle="tab">Danh gia (5)</a></li>
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane fade active in" id="details" >
                <p>{!!$product[0]->product_summary!!}</p>

            </div>

            <div class="tab-pane fade" id="companyprofile" >
                <p>{!!$product[0]->product_desc!!}</p>


            </div>
            <div class="tab-pane fade active in" id="reviews" >
                <div class="col-sm-12">
                    <ul>
                        <li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
                        <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                        <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
                    </ul>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                    <p><b>Write Your Review</b></p>

                    <form action="#">
										<span>
											<input type="text" placeholder="Your Name"/>
											<input type="email" placeholder="Email Address"/>
										</span>
                        <textarea name="" ></textarea>
                        <b>Rating: </b> <img src="images/product-details/rating.png" alt="" />
                        <button type="button" class="btn btn-default pull-right">
                            Submit
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div><!--/category-tab-->

    <div class="recommended_items"><!--recommended_items-->
        <h2 class="title text-center">Sản phẩm liên quan</h2>

        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="item active">
                    @foreach($related as $key => $same)
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <a href="{{URL::to('chi-tiet-san-pham/'.$same->product_id)}}">
                                            <img src="{{URL::to('public/uploads/product/'.$same->product_image)}}" alt="" />
                                            <h4>{{$same->product_name}}</h4>
                                            <h2>{{number_format($same->product_price,0,',','.').' '.'VNĐ'}}</h2>
                                            <a href="{{URL::to('chi-tiet-san-pham/'.$same->product_id)}}" style="background:orange; color: white" class="btn btn-default buy"><i class="fa fa-shopping-cart"></i> Mua Ngay</a>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>

        </div>
    </div><!--/recommended_items-->
    <script>
        var classify_name;
        let but=document.querySelectorAll(".tick");
        for(let j=0;j<but.length;j++){
            but[j].addEventListener("click",function(){
                but[j].style.color="red";
                but[j].style.border="1px solid red";
                // but[j].value=1;
                for(let i=0;i<but.length;i++){
                    if(i != j){
                        but[i].style.color="black";
                        but[i].style.border="1px solid black";
                    }
                }
                // alert(but[j].value);
                classify_name=but[j].value;
            })
            but[j].addEventListener("dblclick",function(){
                but[j].style.color="black";
                but[j].style.border="1px solid black";

            })

        }
    </script>
@endsection

