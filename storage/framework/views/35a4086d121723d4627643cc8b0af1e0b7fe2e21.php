


<?php $__env->startSection('profile'); ?>
    <form action="<?php echo e(route('searchUser')); ?>" method="GET">
        <div class="form-group">
            <label for="email">Search User by Email:</label>
            <input type="text" name="email" id="email" class="form-control" placeholder="Enter email">
        </div>
        <button type="submit" class="btn btn-primary">Search</button>
    </form>

    <?php if(isset($user)): ?>
        <h2>Search Results:</h2>
        <ul class="list-group">
            <li class="list-group-item">
                <?php echo e($user->email); ?>

                <form action="<?php echo e(route('addResident', ['user_id' => $user->id])); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="btn btn-primary">Add Resident</button>
                </form>
            </li>
        </ul>
    <?php endif; ?>

    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('profile.profile-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\HostelConnect2.5\resources\views\profile\search_user.blade.php ENDPATH**/ ?>