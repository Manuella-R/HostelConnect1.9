

<?php $__env->startSection('profile'); ?>
<div class="user-list">
    <?php $__currentLoopData = $hostelOwners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $owner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="user-card">
            <div class="user-card-header" onclick="toggleCard(<?php echo e($owner->id); ?>)">
                <div class="user-info">
                    <div>
                        <div class="name"><?php echo e($owner->first_name); ?> <?php echo e($owner->last_name); ?></div>
                    </div>
                </div>
                <div class="toggle-icon">▼</div>
            </div>
            <div class="user-card-body" id="body-<?php echo e($owner->id); ?>">
                <div class="description"><?php echo e($owner->description); ?></div>
                <div class="email"><?php echo e($owner->email); ?></div>
                <div class="phone_number"><?php echo e($owner->phone_number); ?></div>
                <div class="establishment_name"><?php echo e($owner->establishment_name); ?></div>
                <div class="actions">
                    <form action="<?php echo e(route('hostel-owners.approve', $owner->id)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="btn btn-success">Approve</button>
                    </form>
                    <form action="<?php echo e(route('hostel-owners.delete', $owner->id)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php $__env->stopSection(); ?>
<script>
    function toggleCard(id) {
        const body = document.getElementById('body-' + id);
        body.classList.toggle('active');
    }
</script>

<?php echo $__env->make('profile.profile-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\HostelConnect2.5\resources\views\profile\manager.blade.php ENDPATH**/ ?>