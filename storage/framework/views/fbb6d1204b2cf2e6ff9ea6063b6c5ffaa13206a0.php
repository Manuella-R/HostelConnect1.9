

<?php $__env->startSection('profile'); ?>
<div class="container">
    <h1>Your Notifications</h1>
    <?php if($hasNotifications): ?>
        <ul class="list-group">
            <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="list-group-item">
                    <strong><?php echo e($notification->hostel->name); ?></strong>: <?php echo e($notification->notification); ?>

                    <br>
                    <small>Created At: <?php echo e($notification->created_at->format('Y-m-d H:i:s')); ?></small>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    <?php else: ?>
        <p>No notifications available.</p>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('profile.profile-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\HostelConnect2.5\resources\views/notifications/view.blade.php ENDPATH**/ ?>