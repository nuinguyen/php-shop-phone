<?php $__env->startSection('content'); ?>
    <div class="features_items">


        <div class="product-image-wrapper" style="border: none;">

            <?php $__currentLoopData = $news_detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $all_news_detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="single-products" style="margin:10px 0;padding: 2px">
                    <div class="text-center">

                        <img style="float:left;width:30%;padding: 5px;height: 150px" src="<?php echo e(asset('public/uploads/news/'.$all_news_detail->news_detail_image)); ?>" alt="<?php echo e($all_news_detail->news_detail_id); ?>" />

                        <h4 style="color:#000;padding: 5px;"><?php echo e($all_news_detail->news_detail_name); ?></h4>
                        <p ><?php echo $all_news_detail->news_detail_summary; ?></p>


                    </div>
                    <div class="text-right">
                        <a  href="<?php echo e(url('/chi-tiet-tin-tuc/'.$all_news_detail->news_detail_id)); ?>" class="btn btn-default btn-sm">Xem bài viết</a>
                    </div>
                </div>
                <div class="clearfix"></div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>

    </div><!--features_items-->
    <ul class="pagination pagination-sm m-t-none m-b-none">



    </ul>
    <!--/recommended_items-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laravel\xampp\htdocs\shopsupper\resources\views/pages/news/show_news.blade.php ENDPATH**/ ?>