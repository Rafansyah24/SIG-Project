

<?php $__env->startSection('title', 'table'); ?>

<?php $__env->startSection('content1'); ?>

<div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">


    <!-- Start Top Leader Table -->
    <!-- *************************************************************** -->
    <div class="page-wrapper">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-4">
                            <h4 class="card-title">Add User</h4>
                        </div>
                        <form action="<?php echo e(url('users/add/save')); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" id="exampleFormControlInput1" placeholder="Insert Name" required>
                            </div>
                            <label for="exampleFormControlInput1" class="form-label">Select Role</label>
                            <select class="form-select mb-3" aria-label="Default select example" name="level" required>
                                <option selected>Select Role</option>
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Email Address</label>
                                <input type="email" class="form-control" name="email" id="exampleFormControlInput1" placeholder="Insert Email" required>
                            </div>
                            <div class="mb-4">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" id="exampleInputPassword1" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Add User</button><button type="button" class="btn btn-light" style="margin-left: 7px;"><a href="<?php echo e(route('users/list/page')); ?>" style="text-decoration: none;">Back</a></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- *************************************************************** -->
    <!-- End Top Leader Table -->


</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app-admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\file pkl\sig_projek\SIG-Project\resources\views/usermanagement/usercreate.blade.php ENDPATH**/ ?>