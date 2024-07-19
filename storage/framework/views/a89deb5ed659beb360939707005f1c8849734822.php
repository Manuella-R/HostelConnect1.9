

<?php $__env->startSection('body'); ?>

<div class="hostel-details">
    <h1><?php echo e($hostel->name); ?></h1>

    <table class="table">
        <tbody>
            <tr>
                <td><strong>Rent:</strong></td>
                <td>Ksh<?php echo e(number_format($hostel->rent, 2)); ?>/Month</td>
            </tr>
            <tr>
                <td><strong>Description:</strong></td>
                <td><?php echo e($hostel->description); ?></td>
            </tr>
            <tr>
                <td><strong>Vacant Beds:</strong></td>
                <td><?php echo e($hostel->vacant_beds); ?></td>
            </tr>
            <tr>
                <td><strong>Hostel Rules:</strong></td>
                <td>
                    <ul>
                        <?php $__currentLoopData = explode("\n", trim($hostel->rules)); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rule): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(!empty($rule)): ?>
                                <li><?php echo e($rule); ?></li>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </td>
            </tr>
            <tr>
                <td><strong>Amenities:</strong></td>
                <td>
                    <ul>
                        <?php
                            $amenitiesArray = array_map('trim', explode(',', $hostel->amenities));
                        ?>
                        <?php $__currentLoopData = $amenitiesArray; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $amenity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(!empty($amenity)): ?>
                                <li><?php echo e($amenity); ?></li>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </td>
            </tr>
            <tr>
                <td><strong>Constant Water Supply:</strong></td>
                <td><?php echo e($hostel->constant_water_supply ? 'Yes' : 'No'); ?></td>
            </tr>
            <tr>
                <td><strong>Private Security:</strong></td>
                <td><?php echo e($hostel->private_security ? 'Yes' : 'No'); ?></td>
            </tr>
            <tr>
                <td><strong>Parking Space:</strong></td>
                <td><?php echo e($hostel->parking_space ? 'Yes' : 'No'); ?></td>
            </tr>
            <tr>
                <td><strong>Caretaker:</strong></td>
                <td><?php echo e($hostel->caretaker ? 'Yes' : 'No'); ?></td>
            </tr>
            <tr>
                <td><strong>Reviews</strong></td>
                <td>
                    <?php if($reviews->isEmpty()): ?>
                        <p>No reviews yet.</p>
                    <?php else: ?>
                        <ul>
                            <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <?php echo e($review->review); ?>

                                    <form action="<?php echo e(route('hostels.flag', $review->Review_id)); ?>" method="POST" style="display:inline;">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('PATCH'); ?>
                                        <button type="submit" class="btn btn-primary">Flag</button>
                                    </form>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    <?php endif; ?>
                </td>
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
            <tr>
                <td>
                    <?php if(auth()->check()): ?>
                        <p style="visibility:hidden;">User is logged in</p>
                        <p style="visibility:hidden;">User role ID: <?php echo e(auth()->user()->user_role_id); ?></p>
                        <?php if(auth()->user()->user_role_id == 1): ?>
                            <a href="<?php echo e(route('hostels.showApplicationForm', $hostel->H_id)); ?>" class="btn btn-primary">Apply</a><br></td>
                            <td> <a href="<?php echo e(route('hostels.showReviewForm', $hostel->H_id)); ?>" class="btn btn-primary">Leave a Review</a></td>
                        <?php endif; ?>
                    <?php else: ?>
                        <p>You need to be logged in to apply for this hostel.</p>
                    <?php endif; ?>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\HostelConnect2.5\resources\views/hostels/show.blade.php ENDPATH**/ ?>