<?php $__env->startSection('content'); ?>
    <main class="login-form">
        <div class="container">
            <div class="row justify-content-center">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>So thich</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo e($messi->id); ?></td>
                            <td><?php echo e($messi->name); ?></td>
                            <td><?php echo e($messi->email); ?></td>
                            <td><?php echo e($messi->fav); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\crud_user\resources\views/crud_user/read.blade.php ENDPATH**/ ?>