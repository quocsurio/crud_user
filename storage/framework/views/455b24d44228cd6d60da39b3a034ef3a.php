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
                            <th>So Thich</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th><?php echo e($user->id); ?></th>
                                <th><?php echo e($user->name); ?></th>
                                <th><?php echo e($user->email); ?></th>
                                <th><?php echo e($user->fav); ?></th>
                                <th>
                                    <a href="<?php echo e(route('user.readUser', ['id' => $user->id])); ?>">View</a> |
                                    <a href="<?php echo e(route('user.updateUser', ['id' => $user->id])); ?>">Edit</a> |
                                    <a href="<?php echo e(route('user.deleteUser', ['id' => $user->id])); ?>">Delete</a>
                                </th>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\crud_user\resources\views/crud_user/list.blade.php ENDPATH**/ ?>