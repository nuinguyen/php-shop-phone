<?php $__env->startSection('admin_content'); ?>
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm vận chuyển
                </header>
                <?php
                $message = Session::get('message');
                if($message){
                    echo '<span class="text-alert">'.$message.'</span>';
                    Session::put('message',null);
                }
                ?>
                <div class="panel-body">

                    <div class="position-center">
                        <form>
                            <?php echo csrf_field(); ?>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Chọn thành phố</label>
                                <select name="city" id="city" class="form-control input-sm m-bot15 choose city">

                                    <option value="">--Chọn tỉnh thành phố--</option>
                                    <?php $__currentLoopData = $city; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $ci): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($ci->city_id); ?>"><?php echo e($ci->city_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Chọn quận huyện</label>
                                <select name="district" id="district" class="form-control input-sm m-bot15 district choose">
                                    <option value="">--Chọn quận huyện--</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Chọn xã phường</label>
                                <select name="village" id="village" class="form-control input-sm m-bot15 village">
                                    <option value="">--Chọn xã phường--</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Phí vận chuyển</label>
                                <input type="text" name="fee_ship" class="form-control fee_ship" id="exampleInputEmail1" placeholder="Tên danh mục">
                            </div>

                            <button type="button" name="add_ship" class="btn btn-info add_ship">Thêm phí vận chuyển</button>
                        </form>
                    </div>

                    <div id="load_delivery">

                    </div>

                </div>
            </section>

        </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laravel\xampp\htdocs\shopsupper\resources\views/admin/ship/ship.blade.php ENDPATH**/ ?>