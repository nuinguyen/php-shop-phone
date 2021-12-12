<?php $__env->startSection('admin_content'); ?>
    <form role="form" action="<?php echo e(URL::to('/save-import')); ?>" method="post" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        


        <div class="row">
            <div class="col-lg-12">
                <section class="panel">

                    <header class="panel-heading">
                        Nhap Hang
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
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nha cung cap</label>
                                <select name="import_provider" class="form-control input-sm m-bot15">
                                    <?php $__currentLoopData = $provider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option <?php echo e((isset($show_import) && $show_import[0]->provider_id == $item->provider_id)  ? "selected" : ""); ?>  value="<?php echo e($item->provider_id); ?>"><?php echo e($item->provider_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1" >San Pham</label>
                                <select name="import_product[]" class="tags_select_choose form-control input-sm m-bot15" multiple="multiple" >
                                    <?php if(isset($show_import)): ?>
                                        <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?php echo e((in_array($item->product_id, $arrIdProduct)) ? "selected" : ""); ?> value="<?php echo e($item->product_id); ?>"><?php echo e($item->product_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                        <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option  value="<?php echo e($item->product_id); ?>"><?php echo e($item->product_name); ?> </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                            <table class="table table-striped b-t b-light">
                                <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Giá</th>
                                    <th>So luong</th>
                                    <th>Thanh tien</th>
                                </tr>
                                </thead>
                                <tbody class="list_product">
                                <?php if(isset($show_import)): ?>
                                    <?php $__currentLoopData = $show_import; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($key+1); ?></td>
                                            <td><?php echo e($item->product_name); ?></td>
                                            <td><input type="text" data-type="currency" name="price[]" class="form-control price_import text-right" value="<?php echo e(($item->import_detail_price)); ?>"></td>
                                            <td><input type="number" name="amount[]" class="form-control text-right"  value="<?php echo e($item->import_detail_amount); ?>"></td>
                                            <td  class="total text-right"><?php echo e(($item->import_detail_amount*$item->import_detail_price)); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                                </tbody>
                            </table>

                            <div class="row">

                                <div class="col-md-6"></div>
                                <div class="col-md-4">
                                    <p>Số lượng:</p>
                                    <p>Tổng tiền:</p>
                                    <!-- <p>Chi phí <small>(phí vận chuyển...)</small>:</p> -->
                                    <p class="p-t-15"><b>Tổng tiền thanh toán:</b></p>
                                </div>
                                <div class="col-md-2">
                                    <p class="totalAmount"><br></p>
                                    <p class="totalPrice"><br></p>
                                    <p><input type="text" class="form-control transport" name="cost" value="<?php echo e(isset($show_import)?$show_import[0]->import_cost:0); ?>"></p>
                                    <p><b class="sumAll"></b></p>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Ghi chus</label>
                                        <textarea style="resize: none" rows="8" class="form-control" name="import_note" id="exampleInputPassword1" placeholder="Nội dung sản phẩm">
                                            <?php echo e(isset($show_import)?$show_import[0]->import_note:""); ?>

                                        </textarea>
                                    </div>
                                </div>
                            </div>
                            <?php if(isset($show_import)): ?>
                                <a href="<?php echo e(URL::to('/all-import')); ?>"><button type="button"  name="import_status"   class="btn btn-info add_import">Thoat</button></a>
                            <?php else: ?>
                                <button type="submit"  name="import_status"  value="0" class="btn btn-info add_import">Thêm DS hoa don</button>
                            <?php endif; ?>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </form>
    <script>
        $(document).ready(function(){
            $('.tags_select_choose').select2({
                tags: true,
                tokenSeparators: [',', ' ']
            });
        }) ;
    </script>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laravel\xampp\htdocs\shopsupper\resources\views/admin/import/import.blade.php ENDPATH**/ ?>