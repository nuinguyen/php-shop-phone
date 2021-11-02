<?php $__env->startSection('content'); ?>

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
    <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($key<6): ?>
    <div class="col-sm-4">
        <div class="product-image-wrapper">
            <div class="single-products">
                <div class="productinfo text-center">






                        <a href="<?php echo e(URL::to('chi-tiet-san-pham/'.$pro->product_id)); ?>">
                    <img src="<?php echo e(URL::to('public/uploads/product/'.$pro->product_image)); ?>" alt="" />
                        <h4 ><?php echo e($pro->product_name); ?></h4>
                    </a>
                    <h2><?php echo e(number_format($pro->product_price,0,',','.').' '.'VNĐ'); ?></h2>
                    <form>
                        <?php echo csrf_field(); ?>
                        <input type="button"  value="Thêm giỏ hàng"  class="btn btn-default add-to-cart xemnhanh"  data-toggle="modal" data-target="#xemnhanh" data-id_product="<?php echo e($pro->product_id); ?>">
                        <input type="button" value="Yeeu thich" class="btn btn-default add-to-cart" data-id_product="<?php echo e($pro->product_id); ?>" >
                    </form>
                </div>
            </div>
            <div class="choose">

            </div>
        </div>
    </div>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="features_items">
    <h2 class="title text-center"><?php echo e($cate->category_name); ?></h2>
        <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($pro->category_id==$cate->category_id): ?>

        <div class="col-sm-4">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">

                            <a href="<?php echo e(URL::to('chi-tiet-san-pham/'.$pro->product_id)); ?>">
                        <img src="<?php echo e(URL::to('public/uploads/product/'.$pro->product_image)); ?>" alt="" />
                        <h4><?php echo e($pro->product_name); ?></h4>
                        </a>
                        <h2><?php echo e(number_format($pro->product_price,0,',','.').' '.'VNĐ'); ?></h2>
                        <form>
                            <?php echo csrf_field(); ?>
                            <input type="button"  value="Thêm giỏ hàng"  class="btn btn-default add-to-cart xemnhanh"  data-toggle="modal" data-target="#xemnhanh" data-id_product="<?php echo e($pro->product_id); ?>">
                            <input type="button" value="Yeeu thich" class="btn btn-default add-to-cart" data-id_product="<?php echo e($pro->product_id); ?>" >
                        </form>
                    </div>

                </div>

            </div>
        </div>

            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

                    @media  screen and (min-width: 768px) {
                        .modal-dialog {
                            width: 700px; /* New width for default modal */
                        }
                        .modal-sm {
                            width: 350px; /* New width for small modal */
                        }
                    }

                    @media  screen and (min-width: 992px) {
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
                            <?php echo csrf_field(); ?>
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



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laravel\xampp\htdocs\shopsupper\resources\views/pages/home.blade.php ENDPATH**/ ?>