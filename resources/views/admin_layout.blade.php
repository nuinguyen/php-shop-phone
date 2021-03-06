<!DOCTYPE html>
<head>
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- bootstrap-css -->
    <link rel="stylesheet" href="{{asset('public/backend/css/bootstrap.min.css')}}" >
    <meta name="csrf-token" content="{{csrf_token()}}">
    <!-- //bootstrap-css -->
    <!-- Custom CSS -->
    <link href="{{asset('public/backend/css/style.css')}}" rel='stylesheet' type='text/css' />
    <link href="{{asset('public/backend/css/style-responsive.css')}}" rel="stylesheet"/>
    <link href="{{asset('public/backend/css/jquery.dataTables.min.css')}}" rel="stylesheet"/>
    <!-- font CSS -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="{{asset('public/backend/css/font.css')}}" type="text/css"/>
    <link href="{{asset('public/backend/css/font-awesome.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('public/backend/css/morris.css')}}" type="text/css"/>

    <!-- calendar -->
    <link rel="stylesheet" href="{{asset('public/backend/css/monthly.css')}}">
    <!-- //calendar -->
    <!-- //font-awesome icons -->
    <script src="{{asset('public/backend/js/jquery2.0.3.min.js')}}"></script>
    <script src="{{asset('public/backend/js/raphael-min.js')}}"></script>
    <script src="{{asset('public/backend/js/morris.js')}}"></script>


    {{--    select2--}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
</head>
<body>
<section id="container">
    <!--header start-->
    <header class="header fixed-top clearfix">
        <!--logo start-->
        <div class="brand">
            <a href="index.html" class="logo">
                ADMIN
            </a>
            <div class="sidebar-toggle-box">
                <div class="fa fa-bars"></div>
            </div>
        </div>
        <!--logo end-->

        <div class="top-nav clearfix">
            <!--search & user info start-->
            <ul class="nav pull-right top-menu">
                <li>
                    <input type="text" class="form-control search" placeholder=" Search">
                </li>
                <!-- user login dropdown start-->
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <img alt="" src="images/2.png">
                        <span class="username">
                            <?php
                            $name = Auth::user()->name;
                            if($name){
                                echo $name;
                            }
                            ?>
                        </span>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu extended logout">
                        <li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
                        <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                        <li><a href="{{URL::to('/logout')}}"><i class="fa fa-key"></i> Log Out</a></li>
                    </ul>
                </li>
                <!-- user login dropdown end -->

            </ul>
            <!--search & user info end-->
        </div>
    </header>
    <!--header end-->
    <!--sidebar start-->
    <aside>
        <div id="sidebar" class="nav-collapse">
            <!-- sidebar menu start-->
            <div class="leftside-navigation">
                <ul class="sidebar-menu" id="nav-accordion">
                    <li>
                        <a class="active" href="index.html">
                            <i class="fa fa-dashboard"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-book"></i>
                            <span>Danh Muc</span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{URL::to('/add-category')}}">Them Danh Muc</a></li>
                            <li><a href="{{URL::to('/all-category')}}">Liet ke Danh muc</a></li>
                            <li><a href="{{URL::to('/classify')}}">Them phan loai</a></li>
                            <li><a href="{{URL::to('/product')}}">Them San pham</a></li>
                            <li><a href="{{URL::to('/all-product')}}">Liet Ke san pham</a></li>

                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-book"></i>
                            <span>Tin tuc</span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{URL::to('/news')}}">Liet ke tin tuc</a></li>
                            <li><a href="{{URL::to('/news-detail')}}">Them Chi tiet tin tuc</a></li>
                            <li><a href="{{URL::to('/all-news-detail')}}">Liet ke chi tiet tin tuc</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-book"></i>
                            <span>Quan Ly Doi Tac</span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{URL::to('/producer')}}">Nha San Xuat</a></li>
                            <li><a href="{{URL::to('/provider')}}">Nha Cung Cap</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-book"></i>
                            <span>Quan Ly Khach hang</span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{URL::to('/producer')}}">thong tin khach hang</a></li>
                            <li><a href="{{URL::to('/view-order')}}">Don hang khach hang</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-book"></i>
                            <span>Van CHuyen</span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{URL::to('/ship')}}">Quan ly van chuyen</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-book"></i>
                            <span>Qu???n l?? kho</span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{URL::to('/import')}}">Th??m ????n nh???p h??ng</a></li>
                            <li><a href="{{URL::to('/all-import')}}">Danh s??ch ????n nh???p h??ng</a></li>
                            <li><a href="{{URL::to('/export')}}">Th??m ????n xuat h??ng</a></li>
                            <li><a href="{{URL::to('/all-export')}}">Danh s??ch ????n xuat h??ng</a></li>
                            <li><a href="{{URL::to('/warehouse')}}">trich xuat Kho</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-book"></i>
                            <span>Bao c??o th???ng k??</span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{URL::to('/report-sell')}}">B??o c??o b??n h??ng</a></li>
                            <li><a href="{{URL::to('/report-import')}}">B??o c??o nh???p h??ng</a></li>
                            <li><a href="{{URL::to('/all-export')}}">B??o c??o t??i ch??nh</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-book"></i>
                            <span>Ma Giam gia</span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{URL::to('/sale')}}">Quan ly ma giam gia</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-book"></i>
                            <span>Quang cao</span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{URL::to('/banner')}}">Banner</a></li>
                        </ul>
                    </li>





                </ul>            </div>
            <!-- sidebar menu end-->
        </div>
    </aside>
    <!--sidebar end-->
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">

            @yield('admin_content')



        </section>
        <!-- footer -->
        <div class="footer">
            <div class="wthree-copyright">
                <p>?? 2017 Visitors. All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
            </div>
        </div>
        <!-- / footer -->
    </section>
    <!--main content end-->
</section>
<script src="{{asset('public/backend/js/bootstrap.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{asset('public/backend/js/scripts.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.nicescroll.js')}}"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="{{asset('public/backend/js/flot-chart/excanvas.min.js')}}"></script><![endif]-->
<script src="{{asset('public/backend/js/jquery.scrollTo.js')}}"></script>
<!-- morris JavaScript -->


<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Select2 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<script type="text/javascript">

    $(document).ready(function(){
            $('select[name="import_product[]"]').on('change', function(){
                arr = $("select[name='import_product[]'] option:selected");
                html = '';
                var o=1;
                for (let i = 0; i < arr.length; i++) {
                    html += '<tr>';
                    html += '<td>' + o++ + '</td>';
                    html += '<td>' + arr.eq(i).html() + '</td>';
                    html += '<td><input type="text" data-type="currency" name="price[]" class="form-control import_price text-right"></td>';
                    html += '<td><input type="number"  min="1" value="1" name="amount[]" class="form-control text-right" ></td>';
                    html += '<td class="total text-right"></td>';
                    html += '</tr>';
                }
                $('.list_product').html(html);
                // totalPrice += parseInt($('.transport').val().replace(/\,/g, ''));
                // alert(totalPrice);
                // $('.sumAll').html((totalPrice + ""));
                changeTotal();
            });
    })
    if($('.price_import' ).val()){
        price = $('.price_import' ).val();
        total = parseInt(price) * parseInt($(this).parent().next().find('input[name="amount[]"]').val());
        $(this).parent().next().next().html((total + ""));
        updateTotal();

    }

    function changeTotal() {
        $('input[name="price[]"]').on('change', function() {
             price = $(this).val().replace(/\,/g, '');
             total = parseInt(price) * parseInt($(this).parent().next().find('input[name="amount[]"]').val());
             $(this).parent().next().next().html((total + ""));
             updateTotal();

        });
        $('input[name="amount[]"]').on('change', function() {
             price = $(this).parent().prev().find('input[name="price[]"]').val().replace(/\,/g, '') || 0;
             total = parseInt(price) * parseInt($(this).val());
            $(this).parent().next().html((total + ""));
             updateTotal();

            // alert(price)
        });
    }
    $('.transport').on('change', function() {
        sumTotal = parseInt($('.transport').val().replace(/\,/g, '')) + parseInt($('.totalPrice').html().replace(/\,/g, ''));
        $('.sumAll').html((sumTotal + ""));
    });
    function updateTotal() {
        arramount = $('input[name="amount[]"');
        arrtotal = $('.total');
        sumTotal = 0;
        sumAmount = 0;
        for (let i = 0; i < arrtotal.length; i++) {
            el = arrtotal.eq(i).html().replace(/\,/g, '');
            sumTotal += parseInt(el);
            el = arramount.eq(i).val().replace(/\,/g, '') || 0;
            sumAmount += parseInt(el);
        }
        $('.totalPrice').html((sumTotal + "")+'&nbsp');
        $('.totalAmount').html(sumAmount+'&nbsp');
        sumTotal += parseInt($('.transport').val().replace(/\,/g, ''));
        $('.sumAll').html((sumTotal + "")+'&nbsp');

    }
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $('.order_status').change(function(){
            var status = $(this).val();
            var ord_id = $(this).attr('id');
            var _token = $('input[name="_token"]').val();
            // alert(ma_id);
            //  alert(ord_id);
            //   alert(_token);


            $.ajax({
                url : '{{url('/status-order')}}',
                method: 'POST',
                data:{status:status,ord_id:ord_id,_token:_token},
                success:function(data){
                    $('#'+result).html(data);
                }
            });
        });

    })


</script>

<script type="text/javascript">
    $(document).ready(function(){

        fetch_delivery();

        function fetch_delivery(){
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url : '{{url('/select-feeship')}}',
                method: 'POST',
                data:{_token:_token},
                success:function(data){
                    $('#load_delivery').html(data);
                }
            });
        }
        $(document).on('blur','.fee_feeship_edit',function(){

            var feeship_id = $(this).data('feeship_id');
            var fee_value = $(this).text();
            var _token = $('input[name="_token"]').val();
            // alert(feeship_id);
            // alert(fee_value);
            $.ajax({
                url : '{{url('/update-ship')}}',
                method: 'POST',
                data:{feeship_id:feeship_id, fee_value:fee_value, _token:_token},
                success:function(data){
                    fetch_delivery();
                }
            });

        });
        $('.add_ship').click(function(){

            var city = $('.city').val();
            var district = $('.district').val();
            var village = $('.village').val();
            var fee_ship = $('.fee_ship').val();
            var _token = $('input[name="_token"]').val();
            // alert(city);
            // alert(district);
            // alert(village);
            // alert(fee_ship);
            $.ajax({
                url : '{{url('/insert-ship')}}',
                method: 'POST',
                data:{city:city, district:district, _token:_token, village:village, fee_ship:fee_ship},
                success:function(data){
                    fetch_delivery();
                }
            });

        });
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
                url : '{{url('/select-ship')}}',
                method: 'POST',
                data:{action:action,ma_id:ma_id,_token:_token},
                success:function(data){
                    $('#'+result).html(data);
                }
            });
        });
    })


</script>


<script type="text/javascript">
    load_gallery();

    function load_gallery(){
       // var pro_id = $('.pro_id').val();
        var _token = $('input[name="_token"]').val();
        // alert(pro_id);
        $.ajax({
            url:"{{url('/select-gallery')}}",
            method:"POST",
            data:{_token:_token},
            success:function(data){
                $('#gallery_load').html(data);
            }
        });
    }

    $('#file').change(function(){
        var error = '';
        var files = $('#file')[0].files;

        if(files.length>5){
            error+='<p>B???n ch???n t???i ??a ch??? ???????c 5 ???nh</p>';
        }else if(files.length==''){
            error+='<p>B???n kh??ng ???????c b??? tr???ng ???nh</p>';
        }else if(files.size > 2000000){
            error+='<p>File ???nh kh??ng ???????c l???n h??n 2MB</p>';
        }

        if(error==''){

        }else{
            $('#file').val('');
            $('#error_gallery').html('<span class="text-danger">'+error+'</span>');
            return false;
        }

    });

    $(document).on('blur','.edit_gal_name',function(){
        var gal_id = $(this).data('gal_id');
        var gal_text = $(this).text();
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url:"{{url('/update-gallery-name')}}",
            method:"POST",
            data:{gal_id:gal_id,gal_text:gal_text,_token:_token},
            success:function(data){
                load_gallery();
                $('#error_gallery').html('<span class="text-danger">C???p nh???t t??n h??nh ???nh th??nh c??ng</span>');
            }
        });
    });

    $(document).on('click','.delete-gallery',function(){
        var gal_id = $(this).data('gal_id');

        var _token = $('input[name="_token"]').val();
        if(confirm('B???n mu???n x??a h??nh ???nh n??y kh??ng?')){
            $.ajax({
                url:"{{url('/delete-gallery')}}",
                method:"POST",
                data:{gal_id:gal_id,_token:_token},
                success:function(data){
                    load_gallery();
                    $('#error_gallery').html('<span class="text-danger">X??a h??nh ???nh th??nh c??ng</span>');
                }
            });
        }
    });

    $(document).on('change','.file_image',function(){

        var gal_id = $(this).data('gal_id');
        var image = document.getElementById("file-"+gal_id).files[0];

        var form_data = new FormData();

        form_data.append("file", document.getElementById("file-"+gal_id).files[0]);
        form_data.append("gal_id",gal_id);



        $.ajax({
            url:"{{url('/update-gallery')}}",
            method:"POST",
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:form_data,

            contentType:false,
            cache:false,
            processData:false,
            success:function(data){
                load_gallery();
                $('#error_gallery').html('<span class="text-danger">C???p nh???t h??nh ???nh th??nh c??ng</span>');
            }
        });

    });




</script>


<script type="text/javascript">

    function ChangeToSlug()
    {
        var slug;

        //L???y text t??? th??? input title
        slug = document.getElementById("slug").value;
        slug = slug.toLowerCase();
        //?????i k?? t??? c?? d???u th??nh kh??ng d???u
        slug = slug.replace(/??|??|???|???|??|??|???|???|???|???|???|??|???|???|???|???|???/gi, 'a');
        slug = slug.replace(/??|??|???|???|???|??|???|???|???|???|???/gi, 'e');
        slug = slug.replace(/i|??|??|???|??|???/gi, 'i');
        slug = slug.replace(/??|??|???|??|???|??|???|???|???|???|???|??|???|???|???|???|???/gi, 'o');
        slug = slug.replace(/??|??|???|??|???|??|???|???|???|???|???/gi, 'u');
        slug = slug.replace(/??|???|???|???|???/gi, 'y');
        slug = slug.replace(/??/gi, 'd');
        //X??a c??c k?? t??? ?????t bi???t
        slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
        //?????i kho???ng tr???ng th??nh k?? t??? g???ch ngang
        slug = slug.replace(/ /gi, "-");
        //?????i nhi???u k?? t??? g???ch ngang li??n ti???p th??nh 1 k?? t??? g???ch ngang
        //Ph??ng tr?????ng h???p ng?????i nh???p v??o qu?? nhi???u k?? t??? tr???ng
        slug = slug.replace(/\-\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-/gi, '-');
        slug = slug.replace(/\-\-/gi, '-');
        //X??a c??c k?? t??? g???ch ngang ??? ?????u v?? cu???i
        slug = '@' + slug + '@';
        slug = slug.replace(/\@\-|\-\@|\@/gi, '');
        //In slug ra textbox c?? id ???slug???
        document.getElementById('convert_slug').value = slug;
    }

</script>
<script>
    $(document).ready(function() {
        //BOX BUTTON SHOW AND CLOSE
        jQuery('.small-graph-box').hover(function() {
            jQuery(this).find('.box-button').fadeIn('fast');
        }, function() {
            jQuery(this).find('.box-button').fadeOut('fast');
        });
        jQuery('.small-graph-box .box-close').click(function() {
            jQuery(this).closest('.small-graph-box').fadeOut(200);
            return false;
        });

        //CHARTS
        function gd(year, day, month) {
            return new Date(year, month - 1, day).getTime();
        }

        graphArea2 = Morris.Area({
            element: 'hero-area',
            padding: 10,
            behaveLikeLine: true,
            gridEnabled: false,
            gridLineColor: '#dddddd',
            axes: true,
            resize: true,
            smooth:true,
            pointSize: 0,
            lineWidth: 0,
            fillOpacity:0.85,
            data: [
                {period: '2015 Q1', iphone: 2668, ipad: null, itouch: 2649},
                {period: '2015 Q2', iphone: 15780, ipad: 13799, itouch: 12051},
                {period: '2015 Q3', iphone: 12920, ipad: 10975, itouch: 9910},
                {period: '2015 Q4', iphone: 8770, ipad: 6600, itouch: 6695},
                {period: '2016 Q1', iphone: 10820, ipad: 10924, itouch: 12300},
                {period: '2016 Q2', iphone: 9680, ipad: 9010, itouch: 7891},
                {period: '2016 Q3', iphone: 4830, ipad: 3805, itouch: 1598},
                {period: '2016 Q4', iphone: 15083, ipad: 8977, itouch: 5185},
                {period: '2017 Q1', iphone: 10697, ipad: 4470, itouch: 2038},

            ],
            lineColors:['#eb6f6f','#926383','#eb6f6f'],
            xkey: 'period',
            redraw: true,
            ykeys: ['iphone', 'ipad', 'itouch'],
            labels: ['All Visitors', 'Returning Visitors', 'Unique Visitors'],
            pointSize: 2,
            hideHover: 'auto',
            resize: true
        });


    });
</script>
<!-- calendar -->
<script type="text/javascript" src="{{asset('public/backend/js/monthly.js')}}"></script>
<script type="text/javascript">
    $(window).load( function() {

        $('#mycalendar').monthly({
            mode: 'event',

        });

        $('#mycalendar2').monthly({
            mode: 'picker',
            target: '#mytarget',
            setWidth: '250px',
            startHidden: true,
            showTrigger: '#mytarget',
            stylePast: true,
            disablePast: true
        });

        switch(window.location.protocol) {
            case 'http:':
            case 'https:':
                // running on a server, should be good.
                break;
            case 'file:':
                alert('Just a heads-up, events will not work when run locally.');
        }

    });
</script>
<!-- //calendar -->
</body>
</html>
