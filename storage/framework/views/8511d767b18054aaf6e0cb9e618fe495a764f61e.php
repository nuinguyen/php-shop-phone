<?php $__env->startSection('admin_content'); ?>
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Liệt kê sản phẩm
            </div>
            <div class="row w3-res-tb">
                <div class="col-sm-5 m-b-xs">
                    <select class="input-sm form-control w-sm inline v-middle">
                        <option value="0">Bulk action</option>
                        <option value="1">Delete selected</option>
                        <option value="2">Bulk edit</option>
                        <option value="3">Export</option>
                    </select>
                    <button class="btn btn-sm btn-default">Apply</button>
                </div>
                <div class="col-sm-4">
                </div>
                <div class="col-sm-3">
                    <div class="input-group">
                        <input type="text" class="input-sm form-control" placeholder="Search">
                        <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
                    </div>
                </div>
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
                        <th style="width:20px;">
                            <label class="i-checks m-b-none">
                                <input type="checkbox"><i></i>
                            </label>
                        </th>
                        <th>STT</th>
                        <th>Anh</th>
                        <th>Tên sản phẩm</th>
                        <th>Tóm tắt</th>
                        <th>Danh muc</th>
                        <th>Trạng thái</th>
                        <th></th>
                        <th style="width:30px;"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $news_detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $all_news_detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                            <td><?php echo e($key+1); ?></td>
                            <td><img src="public/uploads/news/<?php echo e($all_news_detail->news_detail_image); ?>" height="100" width="100"></td>
                            <td><?php echo e($all_news_detail->news_detail_name); ?></td>
                            <td><?php echo e($all_news_detail->news_detail_summary); ?></td>
                            <td><?php echo e($all_news_detail->news_name); ?></td>
                            <td>
                                <?php if($all_news_detail->news_detail_status==1): ?>
                                    Hiển thị
                                <?php else: ?>
                                    Ẩn
                                <?php endif; ?>
                            </td>

                            <td>
                                <a href="<?php echo e(URL::to('/edit-news-detail/'.$all_news_detail->news_detail_id)); ?>" class="active styling-edit" ui-toggle-class="">
                                    <i class="fa fa-pencil-square-o text-success text-active"></i></a>
                                <a onclick="return confirm('Bạn có chắc là muốn xóa sản phẩm này ko?')" href="<?php echo e(URL::to('/delete-news-detail/'.$all_news_detail->news_detail_id)); ?>" class="active styling-edit" ui-toggle-class="">
                                    <i class="fa fa-times text-danger text"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            <footer class="panel-footer">
                <div class="row">

                    <div class="col-sm-5 text-center">
                        <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
                    </div>
                    <div class="col-sm-7 text-right text-center-xs">
                        <ul class="pagination pagination-sm m-t-none m-b-none">
                            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
                            <li><a href="">1</a></li>
                            <li><a href="">2</a></li>
                            <li><a href="">3</a></li>
                            <li><a href="">4</a></li>
                            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
                        </ul>
                    </div>
                </div>
            </footer>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laravel\xampp\htdocs\shopsupper\resources\views/admin/news/all_news_detail.blade.php ENDPATH**/ ?>