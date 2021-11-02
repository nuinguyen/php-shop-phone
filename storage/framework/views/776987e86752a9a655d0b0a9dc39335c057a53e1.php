<?php $__env->startSection('admin_content'); ?>
    <div class="row">
        <?php
        $message = Session::get('message');
        if($message){
            echo '<span class="text-alert">'.$message.'</span>';
            Session::put('message',null);
        }
        ?>
        <div class="col-lg-5">
            <section class="panel">
                <header class="panel-heading">
                    Thêm Phan loai sản phẩm
                </header>

                <div class="panel-body">

                    <div class="position">
                        <form role="form" action="<?php echo e((isset($edit_provider)) ? URL::to('/update-provider', $edit_provider->provider_id) : URL::to('/save-provider')); ?>" method="post" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

                            <?php echo e((isset($edit_provider)) ? method_field('post') : ""); ?>

                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Tên</label>
                                <div class="col-sm-9">
                                    <input type="text"  class="form-control"  onkeyup="ChangeToSlug();" name="provider_name"  value="<?php echo e((isset($edit_provider)) ? $edit_provider->provider_name : ""); ?>"  id="slug" placeholder="danh mục" >
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Code</label>
                                <div class="col-sm-9">
                                    <input required type="text" class="form-control" name="provider_code" value="<?php echo e((isset($edit_provider)) ? $edit_provider->provider_code : ""); ?>" placeholder="type">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input required type="text" class="form-control" name="provider_email" value="<?php echo e((isset($edit_provider)) ? $edit_provider->provider_email : ""); ?>" placeholder="value">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Phone</label>
                                <div class="col-sm-9">
                                    <input required type="text" class="form-control" name="provider_phone" value="<?php echo e((isset($edit_provider)) ? $edit_provider->provider_phone : ""); ?>" placeholder="value">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Address</label>
                                <div class="col-sm-9">
                                    <input required type="text" class="form-control" name="provider_address" value="<?php echo e((isset($edit_provider)) ? $edit_provider->provider_address : ""); ?>" placeholder="value">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Hình ảnh</label>
                                <div class="col-sm-9">
                                    <input type="file" name="provider_logo"  class="form-control" id="exampleInputEmail1">

                                    <?php if(isset($edit_provider)): ?>
                                        <img src="<?php echo e(URL::to('public/uploads/provider/'.$edit_provider->provider_logo)); ?>" height="100" width="100">;
                                    <?php endif; ?>


                                </div>
                            </div>
                            
                            
                            

                            
                            
                            
                            
                            
                            
                            <button type="submit" name="add_category_product" class="btn btn-info center-block"><?php echo e((isset($edit_provider)) ? "Cập nhật" : "Lưu"); ?></button>
                        </form>
                    </div>

                </div>

            </section>
        </div>
        <div class="col-lg-7">
            <section class="panel">

                <div class="panel-heading">
                    Liệt kê danh mục sản phẩm
                </div>
                <div class="table-responsive">
                    <table class="table table-striped b-t b-light">
                        <thead>
                        <tr>
                            <th style="width:20px;">
                                <label class="i-checks m-b-none">
                                    <input type="checkbox"><i></i>
                                </label>
                            </th>
                            <th>STT</th>
                            <th>Loai</th>
                            <th>Gia tri</th>
                            <th>Tac Vu</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i=1;
                        ?>
                        <?php $__currentLoopData = $all_provider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $provider_all): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr id="<?php echo e($provider_all->provider_id); ?> ">
                                <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                                <td><?php echo e($i++); ?></td>
                                <td><?php echo e($provider_all->provider_name ." (".$provider_all->provider_code.")"); ?></td>
                                <td><img src="public/uploads/provider/<?php echo e($provider_all->provider_logo); ?>" height="100" width="100"></td>
                                <td><?php echo e($provider_all->provider_email); ?></td>
                                <td><?php echo e($provider_all->provider_phone); ?></td>
                                <td><?php echo e($provider_all->provider_address); ?></td>
                                <td>
                                    <a href="<?php echo e(URL::to('/edit-provider/'.$provider_all->provider_id)); ?>" class="active styling-edit" ui-toggle-class="">
                                        <i class="fa fa-pencil-square-o text-success text-active"></i></a>
                                    <a onclick="return confirm('Bạn có chắc là muốn xóa danh mục này ko?')" href="<?php echo e(URL::to('/delete-provider/'.$provider_all->provider_id)); ?>" class="active styling-edit" ui-toggle-class="">
                                        <i class="fa fa-times text-danger text"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laravel\xampp\htdocs\shopsupper\resources\views/admin/provider/provider.blade.php ENDPATH**/ ?>