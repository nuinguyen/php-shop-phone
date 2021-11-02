<?php $__env->startSection('admin_content'); ?>
    <div class="table-agile-info">

        <div class="panel panel-default">
            <div class="panel-heading">
                Thông tin đăng nhập
            </div>

            <div class="table-responsive">
                <?php
                $message = Session::get('message');
                if($message){
                    echo '<span class="text-alert">'.$message.'</span>';
                    Session::put('message',null);
                }
                ?>
                <table class="table table-striped b-t b-light">
                    <thead>
                    <tr>

                        <th>Tên khách hàng</th>
                        <th>Số điện thoại</th>
                        <th>Email</th>

                        <th style="width:30px;"></th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr>
                        <td><?php echo e($user->name); ?></td>
                        <td><?php echo e($user->phone); ?></td>
                        <td><?php echo e($user->email); ?></td>
                    </tr>

                    </tbody>
                </table>

            </div>

        </div>
    </div>
    <br>
    <div class="table-agile-info">

        <div class="panel panel-default">
            <div class="panel-heading">
                Thông tin vận chuyển hàng
            </div>


            <div class="table-responsive">
                <?php
                $message = Session::get('message');
                if($message){
                    echo '<span class="text-alert">'.$message.'</span>';
                    Session::put('message',null);
                }
                ?>
                <table class="table table-striped b-t b-light">
                    <thead>
                    <tr>

                        <th>Tên người vận chuyển</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Ghi chú</th>

                        <th style="width:30px;"></th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr>

                        <td><?php echo e($receiver->receiver_name); ?></td>
                        <td><?php echo e($receiver->receiver_address); ?></td>
                        <td><?php echo e($receiver->receiver_phone); ?></td>
                        <td><?php echo e($receiver->receiver_note); ?></td>

                    </tr>

                    </tbody>
                </table>

            </div>

        </div>
    </div>
    <br><br>

    <div class="table-agile-info">

        <div class="panel panel-default">
            <div class="panel-heading">
                Liệt kê chi tiết đơn hàng
            </div>

            <div class="table-responsive">
                <?php
                $message = Session::get('message');
                if($message){
                    echo '<span class="text-alert">'.$message.'</span>';
                    Session::put('message',null);
                }
                ?>

                <table class="table table-striped b-t b-light">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Hinh Anh</th>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Giá sản phẩm</th>
                        <th>Thanh tien</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $order_detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>

                            <td><?php echo e($key+1); ?></td>
                            <td><img src="public/uploads/product/<?php echo e($detail->product_image); ?>" height="100" width="100"></td>
                            <td><?php echo e($detail->product_name); ?></td>
                            <td><?php echo e($detail->order_detail_amount); ?></td>
                            <td><?php echo e(number_format($detail->product_price ,0,',','.')); ?>VND</td>

                            <td><?php echo e(number_format(($detail->product_price)*($detail->order_detail_amount) ,0,',','.')); ?>đ</td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>









































                    </tbody>
                </table>

            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laravel\xampp\htdocs\shopsupper\resources\views/admin/user/order_detail.blade.php ENDPATH**/ ?>