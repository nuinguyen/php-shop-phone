<?php $__env->startSection('content'); ?>

    <div class="product-details"><!--product-details-->
        <div class="col-sm-5">
            
            
            
            
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
                    <?php $__currentLoopData = $albums; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $album): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li data-thumb="<?php echo e(asset('public/uploads/gallery/'.$album->albums_image)); ?>" data-src="<?php echo e(asset('public/uploads/gallery/'.$album->albums_image)); ?>">
                            <img width="100%" alt="<?php echo e($album->albums_name); ?>"  src="<?php echo e(asset('public/uploads/gallery/'.$album->albums_image)); ?>" />
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </ul>

            </div>
        </div>
        <div class="col-sm-7">
            <div class="product-information"><!--/product-information-->
                <img src="images/product-details/new.jpg" class="newarrival" alt="" />
                <h2><?php echo e($product[0]->product_name); ?></h2>
                <p>Web ID: <?php echo e($product[0]->product_id); ?></p>
                <img src="images/product-details/rating.png" alt="" />

                <span><span><?php echo e(number_format($product[0]->product_price,0,',','.').' '.'VNĐ'); ?></span></span>

                <div class="form-group">
                    <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <button  name="tick" class="tick"  value="<?php echo e($pro->classify_id); ?>"><?php echo e($pro->classify_type.'-'.$pro->classify_value); ?></button>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="form-group">
                    <span>
                        <label>So luong:</label>
                        <input name="amount" class="amount" type="number" min="1" value="1" />
                        <input name="productid_hidden" type="hidden"  value="<?php echo e($product[0]->product_id); ?>" />
                    </span>
                </div>
                <form action="<?php echo e(url('/cart')); ?>">
                    <?php echo csrf_field(); ?>
                    <button  class="btn btn-primary btn-sm add-cart " data-id_product="<?php echo e($product[0]->product_id); ?>" name="add-to-cart">Mua ngay</button>
                </form>
                    <?php echo csrf_field(); ?>
                <button  class="btn btn-primary btn-sm add-cart" data-id_product="<?php echo e($product[0]->product_id); ?>" name="add-cart"><i class="fa fa-shopping-cart"></i> Them Gio Hnag</button>

                <p><b>Tinh trang:</b> Con hang</p>
                <p><b>Dieu kien:</b> Moi 100</p>
                <p><b>Danh muc:</b><?php echo e($product[0]->category_name); ?> </p>
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
                <p><?php echo $product[0]->product_summary; ?></p>

            </div>

            <div class="tab-pane fade" id="companyprofile" >
                <p><?php echo $product[0]->product_desc; ?></p>


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
                    <?php $__currentLoopData = $related; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $same): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <a href="<?php echo e(URL::to('chi-tiet-san-pham/'.$same->product_id)); ?>">
                                            <img src="<?php echo e(URL::to('public/uploads/product/'.$same->product_image)); ?>" alt="" />
                                            <h4><?php echo e($same->product_name); ?></h4>
                                            <h2><?php echo e(number_format($same->product_price,0,',','.').' '.'VNĐ'); ?></h2>
                                            <a href="<?php echo e(URL::to('chi-tiet-san-pham/'.$same->product_id)); ?>" style="background:orange; color: white" class="btn btn-default buy"><i class="fa fa-shopping-cart"></i> Mua Ngay</a>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laravel\xampp\htdocs\shopsupper\resources\views/pages/product/show_details.blade.php ENDPATH**/ ?>