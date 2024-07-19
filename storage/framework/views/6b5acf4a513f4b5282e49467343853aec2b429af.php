
<?php $__env->startSection('profile'); ?>
    <div class="container">
        <h1>Hostel Information</h1>

        <table class="table">
            <tbody>
                <tr>
                    <td>Address</td>
                    <td><?php echo e($hostel->address); ?></td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td><?php echo e($hostel->description); ?></td>
                </tr>
                <tr>
                    <td>Rent</td>
                    <td><?php echo e($hostel->rent); ?></td>
                </tr>
                <tr>
                    <td>Amenities</td>
                    <td><?php echo e($hostel->amenities); ?></td>
                </tr>
                <tr>
                    <td>Rules</td>
                    <td><?php echo e($hostel->rules); ?></td>
                </tr>
                <tr>
                    <td>Availability</td>
                    <td><?php echo e($hostel->availability ? 'Yes' : 'No'); ?></td>
                </tr>
                <tr>
                    <td>Number of Beds</td>
                    <td><?php echo e($hostel->number_beds); ?></td>
                </tr>
                <tr>
                    <td>Vacant Beds</td>
                    <td><?php echo e($hostel->vacant_beds); ?></td>
                </tr>
                <tr>
                    <td>Constant Water Supply</td>
                    <td><?php echo e($hostel->constant_water_supply ? 'Yes' : 'No'); ?></td>
                </tr>
                <tr>
                    <td>Private Security</td>
                    <td><?php echo e($hostel->private_security ? 'Yes' : 'No'); ?></td>
                </tr>
                <tr>
                    <td>Parking Space</td>
                    <td><?php echo e($hostel->parking_space ? 'Yes' : 'No'); ?></td>
                </tr>
                <tr>
                    <td>Caretaker</td>
                    <td><?php echo e($hostel->caretaker ? 'Yes' : 'No'); ?></td>
                </tr>
                <tr>
                    <td>
                        <?php if($hostel->photo_proof1): ?>
                            <img src="<?php echo e(asset('storage/' . $hostel->photo_proof1)); ?>" alt="Hostel Photo 1" style="max-width: 300px;">
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if($hostel->photo_proof2): ?>
                            <img src="<?php echo e(asset('storage/' . $hostel->photo_proof2)); ?>" alt="Hostel Photo 2" style="max-width: 300px;">
                        <?php endif; ?>
                    </td>
</tr>
<tr>
                    <td>
                        <?php if($hostel->photo_proof3): ?>
                            <img src="<?php echo e(asset('storage/' . $hostel->photo_proof3)); ?>" alt="Hostel Photo 3" style="max-width: 300px;">
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if($hostel->photo_proof4): ?>
                            <img src="<?php echo e(asset('storage/' . $hostel->photo_proof4)); ?>" alt="Hostel Photo 4" style="max-width: 300px;">
                        <?php endif; ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('profile.profile-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\HostelConnect2.5\resources\views/profile/hostelinfo.blade.php ENDPATH**/ ?>