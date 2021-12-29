<?php $__env->startSection('content'); ?>

    <section id="cart_items">
        <style>

            .xac_nhan{
                margin-bottom: 20px;
                margin-top: 20px;
            }
        </style>
        <form action="<?php echo e(url('/chot-don')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="containerr">
                <div class="breadcrumbs">
                    <ol class="breadcrumb">
                        <li><a href="<?php echo e(URL::to('/')); ?>">Trang chủ</a></li>
                        <li class="active">Thanh toán giỏ hàng</li>
                    </ol>
                    <div class="register-req">
                        <p>Chú ý kiểm tra thông tin mua hàng </p>
                    </div><!--/register-req-->
                </div>
                <div class="shopper-informations">
                    <div class="row">
                        <div class="col-sm-12 clearfix">
                            <div class="bill-to">
                                <p>Thông tin</p>
                                    <div class="col-lg-12">
                                        <p style="color: #1a252f"><?php echo e(Auth::user()->name.'   '.Auth::user()->phone.'    ( '.Auth::user()->address.' )'); ?>

                                            <a href="<?php echo e(URL::to('/profile')); ?>"> +(Mặc định)</a>
                                        </p>
                                    </div>
                                <div class="btn-light">
                                    <input type="button" class="receiver_them" id="receiver_them" VALUE="Gửi">
                                    <input type="button" class="receiver_huy" id="receiver_huy" VALUE="Hủy">
                                    <p></p>
                                </div>
                                <div class="row" id="ship_receiver">
                                    <div class="col-sm-12 clearfix">
                                    <div class="row">
                                       <div class="form-group"><!--login form-->
                                       <div class="col-sm-2">
                                           <input type="text" name="receiver_name" class="receiver_name" placeholder="Họ và tên">
                                       </div>
                                       <div class="col-lg-2">
                                           <input type="text" name="receiver_phone" class="receiver_phone" placeholder="Số điện thoại">
                                       </div>
                                       </div>
                                   </div>
                                    <p></p>
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <select name="city" id="city" class="form-control input-sm m-bot15 choose city">
                                                    <option value="">--Tỉnh thành phố--</option>
                                                    <?php $__currentLoopData = $city; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $ci): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($ci->city_id); ?>"><?php echo e($ci->city_name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <select name="district" id="district" class="form-control input-sm m-bot15 district choose">
                                                    <option value="">--quận huyện--</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <select name="village" id="village" class="form-control input-sm m-bot15 village feeship">
                                                    <option value="">--xã phường--</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <input type="text" name="receiver_team" class="receiver_team" placeholder="Địa điểm cụ thể">
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <textarea name="receiver_note" class="receiver_note" placeholder="Ghi chú đơn hàng của bạn" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 clearfix">
                            <?php if(session()->has('message')): ?>
                                <div class="alert alert-success">
                                    <?php echo e(session()->get('message')); ?>

                                </div>
                            <?php elseif(session()->has('error')): ?>
                                <div class="alert alert-danger">
                                    <?php echo e(session()->get('error')); ?>

                                </div>
                            <?php endif; ?>
                            <input type="hidden" name="cart_id" class="key" value="<?php echo e($show[0]->cart_id); ?>">
                            <div class="table-responsive cart_info">
                                <table class="table table-striped b-t b-light">
                                    <thead>
                                    <tr class="cart_menu">
                                        <td class="description">STT</td>
                                        <td class="description">Sản phẩm</td>
                                        <td class="description"></td>
                                        <td class="price">Giá sản phẩm</td>
                                        <td class="quantity">Số lượng</td>
                                        <td class="quantity">Thành tiền</td>
                                        <td></td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $total = 0;
                                    ?>
                                    <?php $__currentLoopData = $show; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $subtotal = $value->product_price*$value->cart_detail_amount;
                                            $total+=$subtotal;
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo e($key+1); ?>

                                                <input type="hidden" name="key[]" class="key" value="<?php echo e($value->product_id); ?>">

                                            </td>
                                            <td class="cart_description">
                                                <p><img src="<?php echo e(URL::to('public/uploads/product/'.$value->product_image)); ?>" width="90" alt="" /></p>
                                            </td>
                                            <td>
                                                <p>
                                                    <?php echo e($value->product_name); ?> <br>
                                                    <button name="order_detail_classify" value="<?php echo e($value->classify_id); ?>"><?php echo e($value->classify_type.'-'.$value->classify_value); ?></button>
                                                </p>
                                            </td>
                                            <td class="cart_price">
                                                <p><?php echo e(number_format($value->product_price,0,',','.').' '.'VNĐ'); ?></p>
                                            </td>
                                            <td class="cart_quantity">
                                                <div class="cart_quantity_button">
                                                    <input class="cart_quantity_input" type="text" name="order_detail_amount" value="<?php echo e($value->cart_detail_amount); ?>" autocomplete="off" size="2">
                                                </div>
                                            </td>
                                            <td class="cart_price">
                                                <p><?php echo e(number_format($subtotal,0,',','.').' '.'VNĐ'); ?></p>
                                                <input type="hidden" name="product_id" class="product_id" value="<?php echo e($value->product_id); ?>">

                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>

                            <div class="bill-to">
                                <div class="row">
                                    <div class="col-lg-6">
                                        
                                        
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Chọn hình thức thanh toán</label>
                                                <select name="order_method"  class="form-control input-sm m-bot15 order_method">
                                                    <option value="0">Qua chuyển khoản</option>
                                                    <option value="1">Tiền mặt</option>
                                                </select>
                                            </div>
                                    </div>
                                    <div class="col-lg-6"></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-7">
                                    </div>
                                    <div class="col-lg-5">
                                        <p>
                                            <?php
                                                echo 'Tổnng tiền hàng là: '.number_format($total,0,',','.').' '.'VNĐ';
                                            ?>
                                            <input type="hidden" name="order_total" class="order_total" value="<?php echo e($total); ?>">
                                        </p>
                                        <p>
                                        <div id="ship_fee">
                                            <p> Phí vận chuyển là: <?php echo e(number_format($ship_feeship,0,',','.').' '.'VNĐ'); ?> </p>
                                            <p style="color: red"> Tổng Thanh toán là: <?php echo e(number_format(($tong=$total+$ship_feeship),0,',','.').' '.'VNĐ'); ?> </p>
                                            <input type="hidden" name="order_ship" class="order_ship" value="<?php echo e($ship_feeship); ?>">
                                            <input type="hidden" name="order_total" class="order_total" value="<?php echo e($tong); ?>">
                                        </div>
                                        </p>
                                    </div>
                                </div>
                                <div class="row xac_nhan">
                                    <div class="col-lg-7">
                                       <h4> Nhấn "Đặt hàng" đồng nghĩa với việc bạn đồng ý tuân theo Điều khoản<u style="color: orange"> <i >Shopee</i></u></h4>
                                    </div>
                                    <div class="col-lg-5 ">
                                        <input type="submit" value="Xác nhận đơn hàng" name="send_order" class="btn btn-success">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section> <!--/#cart_items-->
    <script>
        document.querySelector("#ship_receiver").style.display="none";
        document.querySelector("#receiver_huy").style.display="none";
        document.querySelector("#receiver_them").addEventListener("click",function() {
            document.querySelector("#receiver_them").style.display="none";
            document.querySelector("#ship_receiver").style.display="block";
            document.querySelector("#receiver_huy").style.display="block";
        })
        document.querySelector("#receiver_huy").addEventListener("click",function() {
            document.querySelector("#receiver_them").style.display="block";
            document.querySelector("#ship_receiver").style.display="none";
            document.querySelector("#receiver_huy").style.display="none";
        })
    </script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laravel\xampp\htdocs\shopsupper\resources\views/pages/checkout/show_checkout.blade.php ENDPATH**/ ?>