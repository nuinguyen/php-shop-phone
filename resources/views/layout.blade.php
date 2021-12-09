<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | Shopper</title>
    <link href="{{asset('public/frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/responsive.css')}}" rel="stylesheet">

    <link href="{{asset('public/frontend/css/lightgallery.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/lightslider.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/prettify.css')}}" rel="stylesheet">

    <link href="{{asset('public/frontend/css/sweetalert.css')}}" rel="stylesheet">

<   <script src="js/html5shiv.js"></script>-->
<!--    <script src="js/respond.min.js"></script>-->
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('public/frontend/images/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('public/frontend/images/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('public/frontend/images/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{asset('public/frontend/images/ico/apple-touch-icon-57-precomposed.png')}}">
    <style>
        body{
            background: white;
        }
    </style>
</head><!--/head-->

<body>
<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->

    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="index.html"><img src="{{asset('public/frontend/images/home/logo.png')}}" alt="" /></a>
                    </div>
                    <div class="btn-group pull-right">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                USA
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="#">Canada</a></li>
                                <li><a href="#">UK</a></li>
                            </ul>
                        </div>

                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                DOLLAR
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="#">Canadian Dollar</a></li>
                                <li><a href="#">Pound</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-user"></i> Account</a></li>
                            <li><a href="#"><i class="fa fa-star"></i> Wishlist</a></li>
                            <li><a href="checkout.html"><i class="fa fa-crosshairs"></i> Checkout</a></li>
{{--                            <li><a href="{{URL::to('/show-cart')}}"><i class="fa fa-shopping-cart"></i>--}}
{{--                                    Cart--}}
{{--                                    <span class="badges">1</span>--}}
{{--                                </a></li>--}}

                            <?php
                            $customer_name = Session::get('customer_name');
                            if($customer_name !=null){
                            ?>
                            <li class="cart-hover"><a href="{{url('cart')}}"><i class="fa fa-shopping-cart"></i>
                                    Giỏ hàng

                                    <span class="show-cart"></span>

                                    <div class="clearfix"></div>

                                    <span class="giohang-hover">
                                        </span>
                                </a>

                            </li>
                            <?php
                            }else{
                            ?>
                            <li><a href="{{URL::to('/admin')}}"><i class="fa fa-lock"></i> Giỏ hàng</a></li>
                            <?php
                            }
                            ?>

                            <?php
                            $customer_name = Session::get('customer_name');
                            if($customer_name !=null){
                            ?>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                    {{$customer_name}}
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="{{URL::to('/my-order')}}">Don hang</a></li>
                                    <li><a href="{{URL::to('/profile')}}">Thong tin</a></li>
                                    <li><a href="{{URL::to('/dang-xuat')}}">Dang xuat</a></li>

                                </ul>
                            </div>

                            <?php
                            }else{
                            ?>
                            <li><a href="{{URL::to('/admin')}}"><i class="fa fa-lock"></i> Đăng nhập</a></li>
                            <?php
                            }
                            ?>
                        </ul>
                    </div>


                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="{{URL::to('/trang-chu')}}" class="active">Home</a></li>

                            <li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    @foreach($category as $key => $cate)
                                        <li><a href="{{URL::to('/danh-muc/'.$cate->category_id)}}">{{$cate->category_name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#">Tin tuc<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    @foreach($news as $key => $all_news)
                                        <li><a href="{{URL::to('/tin-tuc/'.$all_news->news_id)}}">{{$all_news->news_name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li><a href="404.html">404</a></li>
                            <li><a href="contact-us.html">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
{{--                    <div class="search_box pull-right">--}}
                    <form action="{{URL::to('/search')}}" method="post">
                        @csrf
                        <input type="text" name="content_search" class="content_search" placeholder="Search"/>
                        <input type="submit" name="search" class="search" value="Tim Kiem">
                    </form>
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->

<section id="slider"><!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#slider-carousel" data-slide-to="1"></li>
                        <li data-target="#slider-carousel" data-slide-to="2"></li>
                    </ol>

                    <div class="carousel-inner">

                        @foreach($all_banner as $key => $banner)
                            @php
                                $key+1;
                            @endphp
                            <div class="item {{$key==1 ? 'active' : '' }}">

                                <div class="col-sm-12">
                                    <img alt="{{$banner->banner_desc}}" src="{{asset('public/uploads/banner/'.$banner->banner_image)}}" height="300" width="90%" >
                                    {{--                                    class="img img-responsive"--}}
                                </div>
                            </div>
                        @endforeach


                    </div>

                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section><!--/slider-->

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>DANH MUC</h2>
                    <div class="panel-group category-products" id="accordian"><!--category-productsr-->

                        @foreach($category as $key => $cate)
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="{{URL::to('/danh-muc/'.$cate->category_id)}}">{{$cate->category_name}}</a></h4>
                            </div>
                        </div>
                        @endforeach

                    </div><!--/category-products-->

                    <div class="brands_products"><!--brands_products-->
                        <h2>Brands</h2>
                        <div class="brands-name">
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#"> <span class="pull-right">(50)</span>Acne</a></li>
                                <li><a href="#"> <span class="pull-right">(56)</span>Grüne Erde</a></li>
                                <li><a href="#"> <span class="pull-right">(27)</span>Albiro</a></li>
                                <li><a href="#"> <span class="pull-right">(32)</span>Ronhill</a></li>
                                <li><a href="#"> <span class="pull-right">(5)</span>Oddmolly</a></li>
                                <li><a href="#"> <span class="pull-right">(9)</span>Boudestijn</a></li>
                                <li><a href="#"> <span class="pull-right">(4)</span>Rösch creative culture</a></li>
                            </ul>
                        </div>
                    </div><!--/brands_products-->

                    <div class="price-range"><!--price-range-->
                        <h2>Price Range</h2>
                        <div class="well text-center">
                            <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
                            <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
                        </div>
                    </div><!--/price-range-->

                    <div class="shipping text-center"><!--shipping-->
                        <img src="{{asset('public/frontend/images/home/shipping.jpg')}}" alt="" />
                    </div><!--/shipping-->

                </div>
            </div>

            <div class="col-sm-9 padding-right">


@yield('content')




            </div>
        </div>
    </div>
</section>

<footer id="footer"><!--Footer-->
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="companyinfo">
                        <h2><span>e</span>-shopper</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor</p>
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <a href="#">
                                <div class="iframe-img">
                                    <img src="images/home/iframe1.png" alt="" />
                                </div>
                                <div class="overlay-icon">
                                    <i class="fa fa-play-circle-o"></i>
                                </div>
                            </a>
                            <p>Circle of Hands</p>
                            <h2>24 DEC 2014</h2>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <a href="#">
                                <div class="iframe-img">
                                    <img src="images/home/iframe2.png" alt="" />
                                </div>
                                <div class="overlay-icon">
                                    <i class="fa fa-play-circle-o"></i>
                                </div>
                            </a>
                            <p>Circle of Hands</p>
                            <h2>24 DEC 2014</h2>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <a href="#">
                                <div class="iframe-img">
                                    <img src="images/home/iframe3.png" alt="" />
                                </div>
                                <div class="overlay-icon">
                                    <i class="fa fa-play-circle-o"></i>
                                </div>
                            </a>
                            <p>Circle of Hands</p>
                            <h2>24 DEC 2014</h2>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <a href="#">
                                <div class="iframe-img">
                                    <img src="images/home/iframe4.png" alt="" />
                                </div>
                                <div class="overlay-icon">
                                    <i class="fa fa-play-circle-o"></i>
                                </div>
                            </a>
                            <p>Circle of Hands</p>
                            <h2>24 DEC 2014</h2>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="address">
                        <img src="images/home/map.png" alt="" />
                        <p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-widget">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Service</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Online Help</a></li>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Order Status</a></li>
                            <li><a href="#">Change Location</a></li>
                            <li><a href="#">FAQ’s</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Quock Shop</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">T-Shirt</a></li>
                            <li><a href="#">Mens</a></li>
                            <li><a href="#">Womens</a></li>
                            <li><a href="#">Gift Cards</a></li>
                            <li><a href="#">Shoes</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Policies</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Terms of Use</a></li>
                            <li><a href="#">Privecy Policy</a></li>
                            <li><a href="#">Refund Policy</a></li>
                            <li><a href="#">Billing System</a></li>
                            <li><a href="#">Ticket System</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>About Shopper</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Company Information</a></li>
                            <li><a href="#">Careers</a></li>
                            <li><a href="#">Store Location</a></li>
                            <li><a href="#">Affillate Program</a></li>
                            <li><a href="#">Copyright</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3 col-sm-offset-1">
                    <div class="single-widget">
                        <h2>About Shopper</h2>
                        <form action="#" class="searchform">
                            <input type="text" placeholder="Your email address" />
                            <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
                            <p>Get the most recent updates from <br />our site and be updated your self...</p>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p>
                <p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
            </div>
        </div>
    </div>

</footer><!--/Footer-->



<script src="{{asset('public/frontend/js/jquery.js')}}"></script>
<script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('public/frontend/js/jquery.scrollUp.min.js')}}"></script>
<script src="{{asset('public/frontend/js/price-range.js')}}"></script>
<script src="{{asset('public/frontend/js/jquery.prettyPhoto.js')}}"></script>
<script src="{{asset('public/frontend/js/main.js')}}"></script>
//js cuar glarry

//cofig
<script src="{{asset('public/frontend/js/sweetalert.min.js')}}"></script>

<script src="https://code.jquery.com/jquery-3.5.0.js"></script>


<script type="text/javascript">

    {{--function XemNhanh(id){--}}
    {{--    var product_id = id;--}}
    {{--    var _token = $('input[name="_token"]').val();--}}
    {{--    $.ajax({--}}
    {{--        url:"{{url('/quickview')}}",--}}
    {{--        method:"POST",--}}
    {{--        dataType:"JSON",--}}
    {{--        data:{product_id:product_id, _token:_token},--}}
    {{--        success:function(data){--}}
    {{--            $('#product_quickview_title').html(data.product_name);--}}
    {{--            $('#product_quickview_id').html(data.product_id);--}}
    {{--            $('#product_quickview_price').html(data.product_price);--}}
    {{--            $('#product_quickview_image').html(data.product_image);--}}
    {{--            $('#product_quickview_gallery').html(data.product_gallery);--}}
    {{--            $('#product_quickview_desc').html(data.product_desc);--}}
    {{--            $('#product_quickview_content').html(data.product_content);--}}
    {{--            $('#product_quickview_value').html(data.product_quickview_value);--}}
    {{--            $('#product_quickview_button').html(data.product_button);--}}
    {{--        }--}}
    {{--    });--}}
    {{--}--}}

</script>

<script type="text/javascript">

    $('.xemnhanh').click(function(){
        var product_id = $(this).data('id_product');
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url:"{{url('/quickview')}}",
            method:"POST",
            dataType:"JSON",
            data:{product_id:product_id, _token:_token},
            success:function(data){
                $('#product_quickview_title').html(data.product_name);
                $('#product_quickview_id').html(data.product_id);
                $('#product_quickview_price').html(data.product_price);
                $('#product_quickview_image').html(data.product_image);
                $('#product_quickview_classify').html(data.product_classify);
                $('#product_quickview_desc').html(data.product_desc);
                // $('#product_quickview_content').html(data.product_content);
                $('#product_quickview_value').html(data.product_quickview_value);
                $('#product_quickview_button').html(data.product_button)

                unactive=$('#product_quickview_classify button[name="tick[]"]');
                function untick() {
                    if (unactive.length > 0) {
                        $.each(unactive, function (index) {
                            itemValue = unactive.eq(index).css({"color": "black", "border": "1px solid black"});
                        });
                    }
                }
                $('.tick').on('click', function() {
                    untick();
                    $('.tick').removeClass('active');
                    $(this).addClass('active');
                    $('#product_quickview_classify').children('.active').css({"color":"red","border":"1px solid red"});
                });


                $('.add-to-cart-quickview').on('click',function (){
                    active = $('#product_quickview_classify').children('.active');
                   if( active.length >0){
                    var id = $(this).data('id_product');
                    var amount = $('.cart_product_amount').val();
                    var _token = $('input[name="_token"]').val();
                    classify_name = $('#product_quickview_classify').children('.active').attr('value');
                    $.ajax({
                        url: '{{url('/save-cart')}}',
                        method: 'POST',
                        data:{id:id,classify_name:classify_name,amount:amount,_token:_token},
                        success:function(data){
                            alert("Them thanh cong");
                            location.reload(data);
                        }
                    });
                    }else{
                        alert('Vui lòng thêm phân loại!');
                    }
                });
                }
        });
    });

</script>

<script type="text/javascript">
    {{--$(document).ready(function(){--}}

    {{--    $('.search').click(function(){--}}
    {{--        var content_search = $('.content_search').val();--}}
    {{--        var _token = $('input[name="_token"]').val();--}}
    {{--        // alert(content_search);--}}
    {{--        // alert("district");--}}
    {{--        // alert(village);--}}
    {{--        // alert(fee_ship);--}}
    {{--        $.ajax({--}}
    {{--            url : '{{url('/search')}}',--}}
    {{--            method: 'POST',--}}
    {{--            data:{content_search:content_search,  _token:_token},--}}
    {{--            success:function(){--}}
    {{--                location.reload();--}}
    {{--            }--}}
    {{--        });--}}

    {{--    });--}}
    {{--});--}}
</script>




<script type="text/javascript">
    $(document).ready(function(){
        load_gallery();
        function load_gallery() {
            sum = 0;
                listChecked = $('.cross input[name="product[]"]:checked');
                if (listChecked.length > 0) {
                    $.each(listChecked, function (index) {
                        itemValue = listChecked.eq(index).parent().parent();
                        sum += parseInt(itemValue.children('.cart_price').children('.to_price').attr('value')) * parseInt(itemValue.children('.cart_amount').children('#amount').attr('value'));
                    });
                    $('#total').html('Tổng tiền hàng : ' + (sum +'').replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.") + ' VNĐ' );
                    $('#order').html('<input type="button" value="DAT HANG" name="send_order" class="btn btn-success buy-order-cart">');
                } else {
                    sum = 0;
                    $('#total').html('Tổng tiền hàng : ' + (sum +'').replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.") + ' VNĐ' );
                    $('#order').html(' <h4 style="color: red" >Vui lòng chọn sản phẩm để đặt hàng</h4>');

                }
        }
        $('.product').click(function () {
            load_gallery();
        });
        $('.all_product').change(function () {
           if(this.checked){
               $('.cart_product_id input').each(function (){
                   $(this).attr("checked",true);
               });
           }else{
               $('.cart_product_id input').each(function (){
                   $(this).attr("checked",false);
               });
           }
            load_gallery();

        });

            $('.cart_quantity_down').click(function () {
                var id = $(this).data('id_product');
                var cart_quantity_input = $('.cart_quantity_input_' + id).val();
                var cart_product_id = $('.cart_product_id_' + id).val();
                var _token = $('input[name="_token"]').val();
                thiss = $(this);
                var amount = parseInt(thiss.parents("tr.cross").find('#amount').val());
                amount = amount - 1;
                thiss.parents("tr.cross").find('#amount').attr('value',amount);
                var cart = parseInt(cart_quantity_input) - 1;
                $.ajax({
                    url: '{{url('/update-quantity')}}',
                    method: 'POST',
                    data: {cart: cart, cart_product_id: cart_product_id, _token: _token},
                    success: function (data) {
                    }
                });
                load_gallery();
            });
            $('.cart_quantity_up').click(function () {
                var id = $(this).data('id_product');
                var cart_quantity_input = $('.cart_quantity_input_' + id).val();
                var cart_product_id = $('.cart_product_id_' + id).val();
                var _token = $('input[name="_token"]').val();
                var cart = parseInt(cart_quantity_input) + 1;
                thiss = $(this);
                var amount = parseInt(thiss.parents("tr.cross").find('#amount').val());
                amount = amount + 1;
                thiss.parents("tr.cross").find('#amount').attr('value',amount);
                $.ajax({
                    url: '{{url('/update-quantity')}}',
                    method: 'POST',
                    data: {cart: cart, cart_product_id: cart_product_id, _token: _token},
                    success: function (data) {
                    }
                });
                load_gallery();
            });

    });
</script>

<script type="text/javascript">
    $(document).ready(function(){

        $('.buy-order-cart').click(function(){
            // var content_search = $('.content_search').val();
            var _token = $('input[name="_token"]').val();
            alert('hello');
            // alert("district");
            // alert(village);
            // alert(fee_ship);
            $.ajax({
                url : '{{url('/search')}}',
                method: 'POST',
                data:{content_search:content_search,  _token:_token},
                success:function(){
                    location.reload();
                }
            });
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function(){
        load_gallery();

        function load_gallery(){
            $('.ship').click(function(){
                var ord_id = $(this).attr('id');
                var _token = $('input[name="_token"]').val();
                // alert(ord_id);
                $.ajax({
                url:"{{url('/order-my')}}",
                method:"POST",
                data:{ord_id:ord_id,_token:_token},
                success:function(data){
                    $('#load_delivery').html(data);
                }
            });
            });
        }
        {{--$('.ship').click(function(){--}}
        {{--    var ord_id = $(this).attr('id');--}}
        {{--    var _token = $('input[name="_token"]').val();--}}
        {{--    alert(ord_id);--}}

        {{--    $.ajax({--}}
        {{--        url : '{{url('/order-my')}}',--}}
        {{--        method: 'POST',--}}
        {{--        data:{ord_id:ord_id, _token:_token},--}}
        {{--        success:function(){--}}
        {{--            $('#load_delivery').html(data);                }--}}
        {{--    });--}}

    });
</script>

<script>
    $(document).ready(function(){
        $('.add-to-cart').click(function(){
            var id = $(this).data('id_product');
            var amount = $('.amount').val();
            var _token = $('input[name="_token"]').val();
            // alert(amount);
            // alert(classify_name);
            $.ajax({
                url: '{{url('/save-to-cart')}}',
                method: 'POST',
                data:{id:id,classify_name:classify_name,amount:amount,_token:_token},
                success:function(data){
                    location.reload(data);
                }
            });
        });
    });

</script>

<script>
    $(document).ready(function(){
        $('.buy-product-cart').click(function(){
            var id = $(this).data('id_product');
            var amount = $('.amount').val();
            var _token = $('input[name="_token"]').val();
            // alert(amount);
            if(classify_name){
                $.ajax({
                    url: '{{url('/save-cart')}}',
                    method: 'POST',
                    data:{id:id,classify_name:classify_name,amount:amount,_token:_token},
                    success:function(data){
                        alert("Đã thêm vào giỏ hàng");
                        //location.reload(data);
                        window.location="http://localhost/shopsupper/cart";
                    }
                });
            }else{
                alert("Vui long chon phan loai san pham");
            }
        });
    });

</script>
<script>
    $(document).ready(function(){
        $('.add-product-cart').click(function(){
            var id = $(this).data('id_product');
            var amount = $('.amount').val();
            var _token = $('input[name="_token"]').val();
            // alert(amount);
            if(classify_name){
                $.ajax({
                    url: '{{url('/save-cart')}}',
                    method: 'POST',
                    data:{id:id,classify_name:classify_name,amount:amount,_token:_token},
                    success:function(data){
                        alert("Đã thêm vào giỏ hàng");
                        location.reload(data);
                    }
                });
            }else{
                alert("Vui long chon phan loai san pham");
            }
        });
    });

</script>
<script type="text/javascript">


    // hover_cart();

    {{--function hover_cart(){--}}
    {{--    $.ajax({--}}
    {{--        url:'{{url('/hover-cart')}}',--}}
    {{--        method:"GET",--}}
    {{--        success:function(data){--}}
    {{--            $('.giohang-hover').html(data);--}}

    {{--        }--}}

    {{--    });--}}
    {{--}--}}

    //show cart quantity
    show_cart();


    function show_cart(){
        $.ajax({
            url:'{{url('/show-cart')}}',
            method:"GET",
            success:function(data){
                $('.show-cart').html(data);

            }

        });
    }

    {{--function Deletecart(id){--}}
    {{--    var id = id;--}}
    {{--    // alert(id);--}}
    {{--    $.ajax({--}}
    {{--        url:'{{url('/remove-item')}}',--}}
    {{--        method:"GET",--}}
    {{--        data:{id:id},--}}
    {{--        success:function(data){--}}
    {{--            alert('Xóa sản phẩm trong giỏ hàng thành công');--}}

    {{--            document.getElementsByClassName("home_cart_"+id)[0].style.display = "inline";--}}
    {{--            document.getElementsByClassName("rm_home_cart_"+id)[0].style.display = "none";--}}

    {{--            hover_cart();--}}
    {{--            show_cart();--}}
    {{--            cart_session();--}}

    {{--        }--}}

    {{--    });--}}
    // }
    {{--$(document).ready(function(){--}}


    {{--    $('.add-to-cart').click(function(){--}}

    {{--        var id = $(this).data('id_product');--}}
    {{--        // alert(id);--}}
    {{--        var cart_product_id = $('.cart_product_id_' + id).val();--}}
    {{--        var cart_product_name = $('.cart_product_name_' + id).val();--}}
    {{--        var cart_product_image = $('.cart_product_image_' + id).val();--}}
    {{--        var cart_product_amount = $('.cart_product_amount_' + id).val();--}}
    {{--        var cart_product_price = $('.cart_product_price_' + id).val();--}}
    {{--        var _token = $('input[name="_token"]').val();--}}
    {{--        // alert(cart_product_name);--}}
    {{--        // if(parseInt(cart_product_qty)>parseInt(cart_product_quantity)){--}}
    {{--        //     alert('Làm ơn đặt nhỏ hơn ' + cart_product_quantity);--}}
    {{--        // }else{--}}

    {{--            $.ajax({--}}
    {{--                url: '{{url('/add-cart-ajax')}}',--}}
    {{--                method: 'POST',--}}
    {{--                data:{cart_product_id:cart_product_id,cart_product_name:cart_product_name,cart_product_image:cart_product_image,cart_product_price:cart_product_price,cart_product_amount:cart_product_amount,_token:_token},--}}
    {{--                success:function(){--}}

    {{--                    swal({--}}
    {{--                            title: "Đã thêm sản phẩm vào giỏ hàng",--}}
    {{--                            text: "Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",--}}
    {{--                            showCancelButton: true,--}}
    {{--                            cancelButtonText: "Xem tiếp",--}}
    {{--                            confirmButtonClass: "btn-success",--}}
    {{--                            confirmButtonText: "Đi đến giỏ hàng",--}}
    {{--                            closeOnConfirm: false--}}
    {{--                        },--}}
    {{--                        function() {--}}
    {{--                            window.location.href = "{{url('/cart')}}";--}}
    {{--                        });--}}

    {{--                    show_cart();--}}
    {{--                    // hover_cart();--}}
    {{--                    // cart_session();--}}
    {{--                }--}}

    {{--            });--}}
    {{--        //}--}}
    {{--    });--}}

    {{--});--}}
</script>

<script type="text/javascript">
    $(document).ready(function(){
    load_gallery();

        function load_gallery() {
            $('.check_coupon').click(function () {
                var sale_code = $('.sale_code').val();
                var _token = $('input[name="_token"]').val();
                // alert(sale_code);
                // alert(district);
                $.ajax({
                    url: '{{url('/calculate-sale')}}',
                    method: 'POST',
                    data: {sale_code: sale_code, _token: _token},
                    success: function (data) {
                        // location.reload();
                        $('#sale_fee').html(data);

                    }
                });

            });
        }
    });
</script>

{{--<script type="text/javascript">--}}
{{--    $(document).ready(function(){--}}
{{--        load_gallery();--}}
{{--        function load_gallery() {--}}
{{--            $('.receiver').click(function () {--}}
{{--                var _token = $('input[name="_token"]').val();--}}

{{--                    $.ajax({--}}
{{--                        url: '{{url('/ship-receiver')}}',--}}
{{--                        method: 'POST',--}}
{{--                        data: { _token: _token},--}}
{{--                        success: function (data) {--}}
{{--                            $('#ship_receiver').html(data);--}}
{{--                        }--}}
{{--                    });--}}
{{--            });--}}
{{--        }--}}
{{--    });--}}
{{--</script>--}}

<script type="text/javascript">
    $(document).ready(function(){
        load_gallery();

        function load_gallery() {
            $('.feeship').change(function () {
                var matp = $('.city').val();
                var maqh = $('.district').val();
                var xaid = $('.village').val();
                var order_total = $('.order_total').val();
                var _token = $('input[name="_token"]').val();

                if (matp == '' && maqh == '' && xaid == '') {
                    alert('Làm ơn chọn để tính phí vận chuyển');
                } else {
                    $.ajax({
                        url: '{{url('/calculate-fee')}}',
                        method: 'POST',
                        data: {matp: matp, maqh: maqh, xaid: xaid,order_total:order_total, _token: _token},
                        success: function (data) {
                            $('#ship_fee').html(data);
                        }
                    });
                }
            });
        }
    });
</script>

<script>
    $(document).ready(function(){
        $('.choose').change(function(){
            var action = $(this).attr('id');
            var ma_id = $(this).val();
            var _token = $('input[name="_token"]').val();
            var result = '';

            //   alert(_token);

            if(action=='city'){
                result = 'district';
            }else{
                result = 'village';
            }
            $.ajax({
                url : '{{url('/select-address')}}',
                method: 'POST',
                data:{action:action,ma_id:ma_id,_token:_token},
                success:function(data){
                    $('#'+result).html(data);
                }
            });
        });
    });

</script>

<script>
    $(document).ready(function(){
        $('.choose').change(function(){
            var action = $(this).attr('id');
            var ma_id = $(this).val();
            var _token = $('input[name="_token"]').val();
            var result = '';
            // alert(action);
            //  alert(matp);
            //   alert(_token);

            if(action=='city'){
            result = 'district';
        }else{
            result = 'village';
        }
        $.ajax({
            url : '{{url('/select-ship-home')}}',
            method: 'POST',
            data:{action:action,ma_id:ma_id,_token:_token},
            success:function(data){
                $('#'+result).html(data);
            }
        });
    });
    });

</script>

{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/js/lightslider.min.js"></script>--}}
<script src="{{asset('public/frontend/js/lightgallery-all.min.js')}}"></script>
<script src="{{asset('public/frontend/js/lightslider.js')}}"></script>
<script src="{{asset('public/frontend/js/prettify.js')}}"></script>
<script>
    $(document).ready(function() {
        $('#imageGallery').lightSlider({

            gallery:true,
            item:1,
            loop:true,
            thumbItem:3,
            slideMargin:0,
            enableDrag: false,
            currentPagerPosition:'left',
            onSliderLoad: function(el) {
                el.lightGallery({
                    selector: '#imageGallery .lslide'
                });
            }

        });
    });
</script>



</body>
</html>
