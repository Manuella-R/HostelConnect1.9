
<?php $__env->startSection('profile'); ?>
<div class="container">
    <h1>Notifications</h1>
    <a href="<?php echo e(route('notifications.create')); ?>" class="btn btn-primary mb-3">Add Notification</a>

    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <div class="list-group">
        <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="list-group-item">
                <p><?php echo e($notification->message); ?></p>
                <a href="<?php echo e(route('notifications.edit', $notification->Notification_id)); ?>" class="btn btn-secondary">Edit</a>
                <form action="<?php echo e(route('notifications.destroy', $notification->Notification_id	)); ?>" method="POST" style="display: inline;">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('profile.profile-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\HostelConnect2.5\resources\views\notifications\index.blade.php ENDPATH**/ ?>