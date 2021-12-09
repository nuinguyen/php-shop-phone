<?php $__env->startSection('content'); ?>
    <style type="text/css">
        .baiviet ul li {
            padding: 2px;
            font-size: 16px;
        }
        .baiviet ul li a {
            color: #000;
        }
        .baiviet ul li a:hover {
            color: #FE980F;
        }
        .baiviet ul li {
            list-style-type: decimal-leading-zero;
        }
        .mucluc h1 {
            font-size: 20px;
            color: brown;
        }
    </style>
    <div class="features_items">


        <div class="product-image-wrapper" style="border: none;">
            <?php $__currentLoopData = $news_detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $all_news_detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="single-products" style="margin:10px 0;padding: 2px">
                    <?php echo $all_news_detail->news_detail_desc; ?>


                </div>
                <div class="clearfix"></div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

    </div><!--features_items-->
    <h2 style="margin:0;font-size: 22px" class="title text-center">Bài viết liên quan</h2>
    <style type="text/css">
        ul.post_relate li {
            list-style-type: disc;
            font-size: 16px;
            padding: 6px;
        }
        ul.post_relate li a {
            color: #000;
        }
        ul.post_relate li a:hover {
            color: #FE980F;
        }
    </style>
    <ul class="post_relate">




    </ul>

    <!--/recommended_items-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laravel\xampp\htdocs\shopsupper\resources\views/pages/news/show_news_detail.blade.php ENDPATH**/ ?>