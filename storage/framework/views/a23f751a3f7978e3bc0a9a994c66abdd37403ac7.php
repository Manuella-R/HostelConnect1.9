
<?php $__env->startSection('profile'); ?>
<div class="container">
    <h1>Add Notification</h1>
    <form action="<?php echo e(route('notifications.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label for="message">Message</label>
            <textarea name="message" id="message" class="form-control" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Add Notification</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('profile.profile-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\HostelConnect2.5\resources\views\notifications\create.blade.php ENDPATH**/ ?>