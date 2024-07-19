
<?php $__env->startSection('profile'); ?>
<div class="container">
    <h1>Edit Notification</h1>
    <form action="<?php echo e(route('notifications.update', $notification->Notification_id	)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="form-group">
            <label for="message">Message</label>
            <textarea name="message" id="message" class="form-control" rows="5" required><?php echo e($notification->message); ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update Notification</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('profile.profile-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\HostelConnect2.5\resources\views\notifications\edit.blade.php ENDPATH**/ ?>