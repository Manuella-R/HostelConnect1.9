<!-- review.blade.php -->



<?php $__env->startSection('body'); ?>

<div class="container">
    <h1>Review for <?php echo e($hostel->name); ?></h1>

    <form action="<?php echo e(route('hostels.storeReview', $hostel->H_id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label for="review">Leave a Review:</label>
            <textarea name="review" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit Review</button>
    </form>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\HostelConnect2.5\resources\views/hostels/review.blade.php ENDPATH**/ ?>