<?php $__env->startSection('content'); ?>

    <div class="features_items">
        <?php $__currentLoopData = $category_name; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <h2 class="title text-center">San pham <?php echo e($name->category_name); ?></h2>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($key<6): ?>
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <a href="<?php echo e(URL::to('chi-tiet-san-pham/'.$pro->product_id)); ?>">
                                <img src="<?php echo e(URL::to('public/uploads/product/'.$pro->product_image)); ?>" alt="" />
                                <h4><?php echo e($pro->product_name); ?></h4>
                                </a>
                                <h2><?php echo e(number_format($pro->product_price,0,',','.').' '.'VNĐ'); ?></h2>
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
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laravel\xampp\htdocs\shopsupper\resources\views/pages/category/show_category.blade.php ENDPATH**/ ?>