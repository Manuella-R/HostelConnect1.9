

<?php $__env->startSection('profile'); ?>

<h1>All Residents of <?php echo e($hostel->name); ?></h1>

<?php if($residents->isEmpty()): ?>
    <p>No residents found.</p>
<?php else: ?>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $residents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resident): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($resident->user->first_name); ?></td>
                    <td><?php echo e($resident->user->email); ?></td>
                    <td><?php echo e($resident->user->phone_number); ?></td>
                    <!-- Add more columns as needed -->
                    <td>
                        <form action="<?php echo e(route('removeResident', $resident->user->id)); ?>" method="POST" onsubmit="return confirm('Are you sure you want to remove this resident?');">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger">Remove</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('profile.profile-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\HostelConnect2.5\resources\views/hostels/residents.blade.php ENDPATH**/ ?>