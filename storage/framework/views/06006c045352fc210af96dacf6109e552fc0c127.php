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
                        <form role="form" action="<?php echo e((isset($edit_producer)) ? URL::to('/update-producer', $edit_producer->producer_id) : URL::to('/save-producer')); ?>" method="post" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

                            <?php echo e((isset($edit_producer)) ? method_field('post') : ""); ?>

                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Tên</label>
                                <div class="col-sm-9">
                                <input type="text"  class="form-control"  onkeyup="ChangeToSlug();" name="producer_name"  value="<?php echo e((isset($edit_producer)) ? $edit_producer->producer_name : ""); ?>"  id="slug" placeholder="danh mục" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Slug</label>
                                <div class="col-sm-9">
                                <input type="text" name="producer_slug" class="form-control" value="<?php echo e((isset($edit_producer)) ? $edit_producer->producer_slug : ""); ?>" id="convert_slug" placeholder="Tên danh mục">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Code</label>
                                <div class="col-sm-9">
                                    <input required type="text" class="form-control" name="producer_code" value="<?php echo e((isset($edit_producer)) ? $edit_producer->producer_code : ""); ?>" placeholder="type">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input required type="text" class="form-control" name="producer_email" value="<?php echo e((isset($edit_producer)) ? $edit_producer->producer_email : ""); ?>" placeholder="value">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Phone</label>
                                <div class="col-sm-9">
                                    <input required type="text" class="form-control" name="producer_phone" value="<?php echo e((isset($edit_producer)) ? $edit_producer->producer_phone : ""); ?>" placeholder="value">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Address</label>
                                <div class="col-sm-9">
                                    <input required type="text" class="form-control" name="producer_address" value="<?php echo e((isset($edit_producer)) ? $edit_producer->producer_address : ""); ?>" placeholder="value">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Hình ảnh</label>
                                <div class="col-sm-9">
                                <input type="file" name="producer_logo"  class="form-control" id="exampleInputEmail1">

                                    <?php if(isset($edit_producer)): ?>
                                          <img src="<?php echo e(URL::to('public/uploads/producer/'.$edit_producer->producer_logo)); ?>" height="100" width="100">;
                                   <?php endif; ?>


                                </div>
                            </div>
                            
                            
                            

                            
                            
                            
                            
                            
                            
                            <button type="submit" name="add_category_product" class="btn btn-info center-block"><?php echo e((isset($edit_producer)) ? "Cập nhật" : "Lưu"); ?></button>
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
                        <?php $__currentLoopData = $all_producer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $producer_all): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr id="<?php echo e($producer_all->producer_id); ?> ">
                                <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                                <td><?php echo e($i++); ?></td>
                                <td><?php echo e($producer_all->producer_name ." (".$producer_all->producer_code.")"); ?></td>
                                <td><img src="public/uploads/producer/<?php echo e($producer_all->producer_logo); ?>" height="100" width="100"></td>
                                <td><?php echo e($producer_all->producer_slug); ?></td>
                                <td><?php echo e($producer_all->producer_email); ?></td>
                                <td><?php echo e($producer_all->producer_phone); ?></td>
                                <td><?php echo e($producer_all->producer_address); ?></td>
                                <td>
                                    <a href="<?php echo e(URL::to('/edit-producer/'.$producer_all->producer_id)); ?>" class="active styling-edit" ui-toggle-class="">
                                        <i class="fa fa-pencil-square-o text-success text-active"></i></a>
                                    <a onclick="return confirm('Bạn có chắc là muốn xóa danh mục này ko?')" href="<?php echo e(URL::to('/delete-producer/'.$producer_all->producer_id)); ?>" class="active styling-edit" ui-toggle-class="">
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

<?php echo $__env->make('admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laravel\xampp\htdocs\shopsupper\resources\views/admin/producer/producer.blade.php ENDPATH**/ ?>