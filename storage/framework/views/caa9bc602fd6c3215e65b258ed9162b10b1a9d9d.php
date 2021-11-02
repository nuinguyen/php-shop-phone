<?php $__env->startSection('content'); ?>
    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">Thông Tin</h2>

        <form method="post" action="<?php echo e(URL::to('/save-profile')); ?>">
            <?php echo csrf_field(); ?>
            <div class="col-lg-6">
                <label for="exampleInputPassword1">Ho Va Ten</label>
                <input type="text" class="form-control" name="name" value="<?php echo e(Auth::user()->name); ?>" placeholder="Ho Ten">
                <label for="exampleInputPassword1">Ngay Sinh</label>
                <input type="date" class="form-control" name="birth"  value="<?php echo e(Auth::user()->birth); ?>" placeholder="Ngay sinh">
                <label for="exampleInputPassword1">Gioi Tinh</label>
                <div>
                    <input type="radio" name="gender" id="Nam" <?php echo e(Auth::user()->gender == "Nam" ? 'checked' : ''); ?> value="Nam"><label for="Nam">Nam</label>
                    <input type="radio" name="gender" id="Nu " <?php echo e(Auth::user()->gender == "Nu" ? 'checked' : ''); ?> value="Nu"><label for="Nu">Nu</label>
                </div>
                <label for="exampleInputPassword1">Số điện thoại</label>
                <input type="text" name="phone" class="form-control"   value="<?php echo e(Auth::user()->phone); ?>" placeholder="SDT">

            </div>
            <div class="col-lg-6">

                <div class="form-group">
                    <label for="exampleInputPassword1">Chọn thành phố</label>
                    <select name="city" id="city" class="form-control input-sm m-bot15 choose city">
                        <option value="">--Chọn tỉnh thành phố--</option>
                        <?php $__currentLoopData = $city; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $ci): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            
                            <option value="<?php echo e($ci->city_id); ?> "<?php echo e(Auth::user()->address != null ? ($address_city == $ci->city_name ? 'selected' : '') : ''); ?> ><?php echo e($ci->city_name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Chọn quận huyện</label>
                    <select name="district" id="district" class="form-control input-sm m-bot15 district choose">
                        <option value="">--Chọn quận huyện--</option>
                        <?php $__currentLoopData = $district; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $ci): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($ci->district_id); ?>" <?php echo e(Auth::user()->address != null ? ($address_district == $ci->district_name ? 'selected' : '') : ''); ?> ><?php echo e($ci->district_name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Chọn xã phường</label>
                    <select name="village" id="village" class="form-control input-sm m-bot15 village">
                        <option value="">--Chọn xã phường--</option>
                        <?php $__currentLoopData = $village; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $ci): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($ci->village_id); ?>" <?php echo e(Auth::user()->address != null ? ($address_village == $ci->village_name ? 'selected' : '') : ''); ?> ><?php echo e($ci->village_name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <label for="exampleInputPassword1">Thôn xóm đội</label>
                <input type="text" name="team" class="form-control" value="<?php echo e($address_team); ?>" placeholder="Thon xom">

            </div>
            <button type="submit" name="add_profile" class="btn btn-info">Lưu</button>

        </form>
    </div><!--features_items-->
    <!--/recommended_items-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laravel\xampp\htdocs\shopsupper\resources\views/pages/user/show_profile.blade.php ENDPATH**/ ?>