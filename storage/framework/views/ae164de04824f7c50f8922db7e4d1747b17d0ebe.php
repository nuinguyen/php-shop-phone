<?php $__env->startSection('content'); ?>
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
            <?php echo csrf_field(); ?>
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
                
                
                
                
                
                
                
                
                
                
                
                
                
                

                
                
                
                
                

                
                
                
                
                
            </div>
        </div>

            <div class="shop-menuu col-sm-12">
                <p style="text-align: center; ">THONG TIN DON HANG </p>
            </div>
        </div>
        </form>
    </div><!--features_items-->
    <!--/recommended_items-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laravel\xampp\htdocs\shopsupper\resources\views/pages/user/show_myorder.blade.php ENDPATH**/ ?>