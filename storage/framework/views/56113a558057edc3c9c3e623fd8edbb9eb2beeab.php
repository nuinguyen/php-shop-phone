<?php $__env->startSection('admin_content'); ?>
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Liệt kê đơn hàng
            </div>
            <div class="row w3-res-tb">



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

                        <th>Thứ tự</th>
                        <th>Ngay mua</th>
                        <th>Tong tien</th>
                        <th>Phi ship</th>
                        <th>Ma sale</th>
                        <th>Phuong thuc thanh toan</th>
                        <th>Trang thai</th>

                        <th style="width:30px;"></th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php $__currentLoopData = $order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $ord): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($key+1); ?></td>
                            <td><?php echo e($ord->created_at); ?></td>
                            <td><?php echo e($ord->order_total); ?></td>
                            <td><?php echo e($ord->order_ship); ?></td>
                            <td><?php echo e($ord->order_sale); ?></td>
                            <td><?php if($ord->order_method==0): ?>
                                    Thanh toan the
                                <?php else: ?>
                                    Tien mat
                                <?php endif; ?>
                            </td>
                            <td>
                                <form>
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="order_id" class="order_id" value="<?php echo e($ord->order_id); ?>">
                                <?php if($ord->order_status==0): ?>
                                    <select name="order_status" id="<?php echo e($ord->order_id); ?>" class="form-control order_status">
                                        <option id="<?php echo e($ord->order_id); ?>" selected value="0">Dang xử lý</option>
                                        <option id="<?php echo e($ord->order_id); ?>"  value="1">Dang giao</option>
                                        <option id="<?php echo e($ord->order_id); ?>"  value="2">Giao thanh cong</option>
                                    </select>
                                    <?php elseif($ord->order_status==1): ?>
                                        <select name="order_status" id="<?php echo e($ord->order_id); ?>" class="form-control order_status">
                                            <option id="<?php echo e($ord->order_id); ?>" value="0">Dang xử lý</option>
                                            <option id="<?php echo e($ord->order_id); ?>" selected  value="1">Dang giao</option>
                                            <option id="<?php echo e($ord->order_id); ?>"  value="2">Giao thanh cong</option>
                                        </select>
                                    <?php else: ?>
                                        <select name="order_status" id="<?php echo e($ord->order_id); ?>" class="form-control order_status">
                                            <option id="<?php echo e($ord->order_id); ?>" value="0">Dang xử lý</option>
                                            <option id="<?php echo e($ord->order_id); ?>"  value="1">Dang giao</option>
                                            <option id="<?php echo e($ord->order_id); ?>" selected  value="2">Giao thanh cong</option>
                                        </select>
                                    <?php endif; ?>

                                </form>

                            </td>


                            <td>
                                <a href="<?php echo e(URL::to('/order-detail/'.$ord->order_id)); ?>" class="active styling-edit" ui-toggle-class="">
                                    <i class="fa fa-eye text-success text-active"></i></a>

                                <a onclick="return confirm('Bạn có chắc là muốn xóa danh mục này ko?')" href="<?php echo e(URL::to('/delete-order/'.$ord->order_id)); ?>" class="active styling-edit" ui-toggle-class="">
                                    <i class="fa fa-times text-danger text"></i>
                                </a>

                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laravel\xampp\htdocs\shopsupper\resources\views/admin/user/order.blade.php ENDPATH**/ ?>