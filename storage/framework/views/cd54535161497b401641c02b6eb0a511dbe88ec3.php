<!DOCTYPE html>
<head>
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- bootstrap-css -->
    <link rel="stylesheet" href="<?php echo e(asset('public/backend/css/bootstrap.min.css')); ?>" >
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <!-- //bootstrap-css -->
    <!-- Custom CSS -->
    <link href="<?php echo e(asset('public/backend/css/style.css')); ?>" rel='stylesheet' type='text/css' />
    <link href="<?php echo e(asset('public/backend/css/style-responsive.css')); ?>" rel="stylesheet"/>
    <link href="<?php echo e(asset('public/backend/css/jquery.dataTables.min.css')); ?>" rel="stylesheet"/>
    <!-- font CSS -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="<?php echo e(asset('public/backend/css/font.css')); ?>" type="text/css"/>
    <link href="<?php echo e(asset('public/backend/css/font-awesome.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('public/backend/css/morris.css')); ?>" type="text/css"/>

    <!-- calendar -->
    <link rel="stylesheet" href="<?php echo e(asset('public/backend/css/monthly.css')); ?>">
    <!-- //calendar -->
    <!-- //font-awesome icons -->
    <script src="<?php echo e(asset('public/backend/js/jquery2.0.3.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/backend/js/raphael-min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/backend/js/morris.js')); ?>"></script>


    
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
                        <li><a href="<?php echo e(URL::to('/logout')); ?>"><i class="fa fa-key"></i> Log Out</a></li>
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
                            <li><a href="<?php echo e(URL::to('/add-category')); ?>">Them Danh Muc</a></li>
                            <li><a href="<?php echo e(URL::to('/all-category')); ?>">Liet ke Danh muc</a></li>
                            <li><a href="<?php echo e(URL::to('/classify')); ?>">Them phan loai</a></li>
                            <li><a href="<?php echo e(URL::to('/product')); ?>">Them San pham</a></li>
                            <li><a href="<?php echo e(URL::to('/all-product')); ?>">Liet Ke san pham</a></li>

                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-book"></i>
                            <span>Quan Ly Doi Tac</span>
                        </a>
                        <ul class="sub">
                            <li><a href="<?php echo e(URL::to('/producer')); ?>">Nha San Xuat</a></li>
                            <li><a href="<?php echo e(URL::to('/provider')); ?>">Nha Cung Cap</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-book"></i>
                            <span>Quan Ly Khach hang</span>
                        </a>
                        <ul class="sub">
                            <li><a href="<?php echo e(URL::to('/producer')); ?>">thong tin khach hang</a></li>
                            <li><a href="<?php echo e(URL::to('/view-order')); ?>">Don hang khach hang</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-book"></i>
                            <span>Van CHuyen</span>
                        </a>
                        <ul class="sub">
                            <li><a href="<?php echo e(URL::to('/ship')); ?>">Quan ly van chuyen</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-book"></i>
                            <span>Ma Giam gia</span>
                        </a>
                        <ul class="sub">
                            <li><a href="<?php echo e(URL::to('/sale')); ?>">Quan ly ma giam gia</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-book"></i>
                            <span>Quang cao</span>
                        </a>
                        <ul class="sub">
                            <li><a href="<?php echo e(URL::to('/banner')); ?>">Banner</a></li>
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

            <?php echo $__env->yieldContent('admin_content'); ?>



        </section>
        <!-- footer -->
        <div class="footer">
            <div class="wthree-copyright">
                <p>© 2017 Visitors. All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
            </div>
        </div>
        <!-- / footer -->
    </section>
    <!--main content end-->
</section>
<script src="<?php echo e(asset('public/backend/js/bootstrap.js')); ?>"></script>
<script src="<?php echo e(asset('public/backend/js/jquery.dcjqaccordion.2.7.js')); ?>"></script>
<script src="<?php echo e(asset('public/backend/js/scripts.js')); ?>"></script>
<script src="<?php echo e(asset('public/backend/js/jquery.slimscroll.js')); ?>"></script>
<script src="<?php echo e(asset('public/backend/js/jquery.nicescroll.js')); ?>"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="<?php echo e(asset('public/backend/js/flot-chart/excanvas.min.js')); ?>"></script><![endif]-->
<script src="<?php echo e(asset('public/backend/js/jquery.scrollTo.js')); ?>"></script>
<!-- morris JavaScript -->


<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Select2 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>


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
                url : '<?php echo e(url('/status-order')); ?>',
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
                url : '<?php echo e(url('/select-feeship')); ?>',
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
                url : '<?php echo e(url('/update-ship')); ?>',
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
                url : '<?php echo e(url('/insert-ship')); ?>',
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
                url : '<?php echo e(url('/select-ship')); ?>',
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
            url:"<?php echo e(url('/select-gallery')); ?>",
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
            error+='<p>Bạn chọn tối đa chỉ được 5 ảnh</p>';
        }else if(files.length==''){
            error+='<p>Bạn không được bỏ trống ảnh</p>';
        }else if(files.size > 2000000){
            error+='<p>File ảnh không được lớn hơn 2MB</p>';
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
            url:"<?php echo e(url('/update-gallery-name')); ?>",
            method:"POST",
            data:{gal_id:gal_id,gal_text:gal_text,_token:_token},
            success:function(data){
                load_gallery();
                $('#error_gallery').html('<span class="text-danger">Cập nhật tên hình ảnh thành công</span>');
            }
        });
    });

    $(document).on('click','.delete-gallery',function(){
        var gal_id = $(this).data('gal_id');

        var _token = $('input[name="_token"]').val();
        if(confirm('Bạn muốn xóa hình ảnh này không?')){
            $.ajax({
                url:"<?php echo e(url('/delete-gallery')); ?>",
                method:"POST",
                data:{gal_id:gal_id,_token:_token},
                success:function(data){
                    load_gallery();
                    $('#error_gallery').html('<span class="text-danger">Xóa hình ảnh thành công</span>');
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
            url:"<?php echo e(url('/update-gallery')); ?>",
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
                $('#error_gallery').html('<span class="text-danger">Cập nhật hình ảnh thành công</span>');
            }
        });

    });




</script>


<script type="text/javascript">

    function ChangeToSlug()
    {
        var slug;

        //Lấy text từ thẻ input title
        slug = document.getElementById("slug").value;
        slug = slug.toLowerCase();
        //Đổi ký tự có dấu thành không dấu
        slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
        slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
        slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
        slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
        slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
        slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
        slug = slug.replace(/đ/gi, 'd');
        //Xóa các ký tự đặt biệt
        slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
        //Đổi khoảng trắng thành ký tự gạch ngang
        slug = slug.replace(/ /gi, "-");
        //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
        //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
        slug = slug.replace(/\-\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-/gi, '-');
        slug = slug.replace(/\-\-/gi, '-');
        //Xóa các ký tự gạch ngang ở đầu và cuối
        slug = '@' + slug + '@';
        slug = slug.replace(/\@\-|\-\@|\@/gi, '');
        //In slug ra textbox có id “slug”
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
<script type="text/javascript" src="<?php echo e(asset('public/backend/js/monthly.js')); ?>"></script>
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
<?php /**PATH E:\laravel\xampp\htdocs\shopsupper\resources\views/admin_layout.blade.php ENDPATH**/ ?>