<?php $__env->startSection('admin_content'); ?>



        <div class="row">
            <div class="col-lg-12">
                <section class="panel">

                    <header class="panel-heading">
                        Danh sach nhap Hang
                    </header>
                    <?php
                    $message = Session::get('message');
                    if($message){
                        echo '<span class="text-alert">'.$message.'</span>';
                        Session::put('message',null);
                    }
                    ?>
                    <div class="panel-body">



                            <table class="table table-striped b-t b-light">
                                <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Nhaf cung cap</th>
                                    <th>Nhap kho</th>
                                    <th>Ngay nhap</th>
                                    <th>So san pham</th>
                                    <th>Tong tien Nhap</th>
                                    <th>Tac vu</th>
                                </tr>
                                </thead>
                                <tbody class="">

                                <?php $__currentLoopData = $import; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($key+1); ?></td>
                                        <td><?php echo e($item->provider_name); ?></td>
                                        <td>
                                            <?php if($item->import_status==1): ?>
                                                <label class='badge badge-success'>Đã nhập kho</label>
                                            <?php else: ?>
                                                <label class='badge badge-secondary'>Chờ nhập hàng</label>
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo e($item->import_date); ?></td>
                                        <td><?php echo e($item->count_all); ?></td>
                                        <td><?php echo e($item->total_all); ?></td>
                                        <td>
                                            <?php if($item->import_status==1): ?>
                                                <a href="<?php echo e(URL::to('/show-import/'.$item->import_id)); ?>"><button class="btn btn-info btn-sm"><i class="fas fa-eye"></i> Xem</button></a>
                                            <?php else: ?>

                                                <a href="<?php echo e(URL::to('/add-import/'.$item->import_id)); ?>"><button class="btn btn-success btn-sm"> Nhập kho</button></a>
                                                <a href=""><button class="btn btn-warning btn-sm">Sửa</button></a>
                                                <form role="form" action="<?php echo e(URL::to('/delete-import/'.$item->import_id)); ?>" method="post" >
                                                    <?php echo csrf_field(); ?>
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Xóa</button>
                                                </form>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </tbody>
                            </table>


                            <button type="submit"  name="import_status" value="0" class="btn btn-info add_import">Thêm DS hoa don</button>
                        </div>



                </section>
            </div>

        </div>


    <script>
        $(document).ready(function(){
            $('.tags_select_choose').select2({
                tags: true,
                tokenSeparators: [',', ' ']
            });
        }) ;
    </script>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laravel\xampp\htdocs\shopsupper\resources\views/admin/import/all_import.blade.php ENDPATH**/ ?>