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
                    Thêm Bai viet
                </header>

                <div class="panel-body">

                    <div class="position">
                        <form role="form" action="<?php echo e((isset($edit_news)) ? URL::to('/update-news', $edit_news->news_id) : URL::to('/save-news')); ?>" method="post">
                            <?php echo e(csrf_field()); ?>

                            <?php echo e((isset($edit_news)) ? method_field('post') : ""); ?>

                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Tên Danh muc</label>
                                <div class="col-sm-9">
                                <input type="text"  class="form-control"  onkeyup="ChangeToSlug();" name="news_name"  value="<?php echo e((isset($edit_news)) ? $edit_news->news_name : ""); ?>"  id="slug" placeholder="danh mục" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Slug</label>
                                <div class="col-sm-9">
                                <input type="text" name="news_slug" class="form-control" value="<?php echo e((isset($edit_news)) ? $edit_news->news_slug : ""); ?>" id="convert_slug" placeholder="Tên danh mục">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Desc</label>
                                <div class="col-sm-9">
                                    <input required type="text" class="form-control" name="news_desc" value="<?php echo e((isset($edit_news)) ? $edit_news->news_desc : ""); ?>" placeholder="value">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Trang thai</label>
                                <div class="col-sm-9">
                                    <select name="news_status" class="form-control input-sm m-bot15">
                                        <option value="1">Hien</option>
                                        <option value="0">An</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" name="add_category_product" class="btn btn-info center-block"><?php echo e((isset($edit_news)) ? "Cập nhật" : "Lưu"); ?></button>
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
                            <th>Tên</th>
                            <th>Desc</th>
                            <th>Trang thai</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i=1;
                        ?>
                        <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $all_news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr id="<?php echo e($all_news->news_id); ?> ">
                                <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                                <td><?php echo e($i++); ?></td>
                                <td><?php echo e($all_news->news_name); ?></td>
                                <td><?php echo e($all_news->news_desc); ?></td>
                                <td>
                                    <?php if($all_news->news_status==1): ?>
                                        Hiển thị
                                    <?php else: ?>
                                        Ẩn
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a href="<?php echo e(URL::to('/edit-news/'.$all_news->news_id)); ?>" class="active styling-edit" ui-toggle-class="">
                                        <i class="fa fa-pencil-square-o text-success text-active"></i></a>
                                    <a onclick="return confirm('Bạn có chắc là muốn xóa danh mục này ko?')" href="<?php echo e(URL::to('/delete-news/'.$all_news->news_id)); ?>" class="active styling-edit" ui-toggle-class="">
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

<?php echo $__env->make('admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laravel\xampp\htdocs\shopsupper\resources\views/admin/news/news.blade.php ENDPATH**/ ?>