<?php $__env->startSection('admin_content'); ?>
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Liệt kê sản phẩm
            </div>
            <div class="row w3-res-tb">
                <div class="col-sm-4 m-b-xs">
                    <select class="input-sm form-control w-sm inline v-middle">
                        <option value="1">Thang 1</option>
                        <option value="2">Thang 2</option>
                        <option value="3">Thang 3</option>
                        <option value="4">Thang 4</option>
                    </select>
                </div>
                <div class="col-sm-4 m-b-xs">
                    <select class="input-sm form-control w-sm inline v-middle">
                        <option value="19">2019</option>
                        <option value="20">2020</option>
                        <option value="21">2021</option>
                        <option value="22">2022</option>
                    </select>
                </div>
                <div class="col-sm-2">
                </div>
                <div class="col-sm-2">
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

                        <th>STT</th>
                        <th>Anh</th>
                        <th>Tên sản phẩm</th>
                        <th>So luong nhap</th>
                        <th>Giá Nhap</th>
                        <th>Nhà cung cấp</th>
                        <th>Ngày nhập</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $importdetail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($item->product_id); ?></td>
                            
                            <td><?php echo e($item->product_name); ?></td>
                            <td><?php echo e($item->product_name); ?></td>
                            <td><?php echo e($item->import_detail_amount); ?></td>
                            <td><?php echo e($item->import_detail_price); ?></td>
                            <td><?php echo e($item->product_name); ?></td>
                            <td><?php echo e($item->import_date); ?></td>
                            
                            
                            

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

<?php echo $__env->make('admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laravel\xampp\htdocs\shopsupper\resources\views/admin/report/report_import.blade.php ENDPATH**/ ?>