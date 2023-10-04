

<?php $__env->startSection('title', 'Monitoring'); ?>

<?php $__env->startSection('content1'); ?>

<div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">


    <!-- Start Top Leader Table -->
    <!-- *************************************************************** -->
    <div class="page-wrapper">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-4">
                            <h4 class="card-title">Table Monitoring 1</h4>
                        </div>
                        <div class="table-responsive">
                            <?php if(count($index) > 0): ?>
                            <table class="table table-hover small">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th class="text-center">Modul</th>
                                        <th class="text-center">Tipe</th>
                                        <th class="text-center">Kode</th>
                                        <th class="text-center">Start Periode</th>
                                        <th class="text-center">End Periode</th>
                                        <th class="text-center">Update Date</th>
                                        <th class="text-center">Is Proceed</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $index; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($data->id); ?></td>
                                        <td class="text-center"><?php echo e($data->modul); ?></td>
                                        <td class="text-center"><?php echo e($data->tipe); ?></td>
                                        <td class="text-center"><?php echo e($data->kode); ?></td>
                                        <td class="text-center"><?php echo e($data->startperiode); ?></td>
                                        <td class="text-center"><?php echo e($data->endperiode); ?></td>
                                        <td class="text-center"><?php echo e($data->updatedate); ?></td>
                                        <td class="text-center">
                                            <?php if($data->isproceed): ?>
                                                true
                                            <?php else: ?>
                                                false
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <?php else: ?>
                            <div class="text-center">
                                <p>Data tidak ditemukan</p>
                            </div>
                        <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- *************************************************************** -->
        <!-- End Top Leader Table -->
    

</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\file pkl\sig_projek\SIG-Project\resources\views/user/table.blade.php ENDPATH**/ ?>