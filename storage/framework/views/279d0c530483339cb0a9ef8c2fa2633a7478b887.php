
<?php $__env->startSection('profile'); ?>
<div class="container">
    <h1>Notifications</h1>

    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <a href="<?php echo e(route('notifications.create')); ?>" class="btn btn-primary mb-3">Create Notification</a>

    <?php if($hasNotifications): ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Message</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($notification->notification); ?></td>
                        <td><?php echo e($notification->created_at->format('Y-m-d H:i:s')); ?></td>
                        <td>
                            <a href="<?php echo e(route('notifications.edit', $notification->Notification_id)); ?>" class="btn btn-warning">Edit</a>
                            <form action="<?php echo e(route('notifications.destroy', $notification->Notification_id)); ?>" method="POST" style="display:inline;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No notifications available.</p>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('profile.profile-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\HostelConnect2.5\resources\views/notifications/index.blade.php ENDPATH**/ ?>