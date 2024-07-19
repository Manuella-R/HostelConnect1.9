

<?php $__env->startSection('body'); ?>

<form action="<?php echo e(route('hostels.general')); ?>" method="GET">
<div class="form-group">
        <label for="min_rent">Minimum Rent:</label>
        <input type="number" id="min_rent" name="min_rent" value="<?php echo e(request('min_rent')); ?>">


        <label for="max_rent">Maximum Rent:</label>
        <input type="number" id="max_rent" name="max_rent" value="<?php echo e(request('max_rent')); ?>">
</div>
        <div class="form-group">
        <!-- Boolean filters -->
        <label><input type="checkbox" name="constant_water_supply" value="1" <?php echo e(request('constant_water_supply') ? 'checked' : ''); ?>> Constant Water Supply</label>
        <label><input type="checkbox" name="private_security" value="1" <?php echo e(request('private_security') ? 'checked' : ''); ?>> Private Security</label>
        <label><input type="checkbox" name="parking_space" value="1" <?php echo e(request('parking_space') ? 'checked' : ''); ?>> Parking Space</label>
        <label><input type="checkbox" name="caretaker" value="1" <?php echo e(request('caretaker') ? 'checked' : ''); ?>> Caretaker</label>
</div>
        <button type="submit" class="btn btn-primary">Apply Filters</button>
    </form>
    <div class="container">
        <h1>Filtered Hostels</h1>
        
        <div class="row">
            <?php $__currentLoopData = $hostels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hostel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="property-card col-md-6 mb-4">
                    <div class="card-content" style="border: 1px solid #ddd; border-radius: 8px; padding: 15px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
                        <div class="card-price">
                            <strong>KSH<?php echo e(number_format($hostel->rent, 2)); ?></strong>/Month
                        </div>
                        <h3 class="h3 card-title"><?php echo e($hostel->name); ?></h3>
                        <p class="card-text"><?php echo e($hostel->description); ?></p>
                        <ul class="card-list">
                            <li class="card-item">
                                <strong><?php echo e($hostel->vacant_beds); ?></strong>
                                <ion-icon name="bed-outline"></ion-icon>
                                <span>Bedrooms</span>
                            </li>
                            <li class="card-item">
                                <a href="<?php echo e(route('hostels.show', ['id' => $hostel->H_id])); ?>" class="btn btn-primary">View Details</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-footer">
                        <div class="card-author">
                            <figure class="author-avatar">
                                <!-- Placeholder for author avatar -->
                            </figure>
                            <div>
                                <p class="author-name">
                                    <a href="#"><?php echo e($hostel->user->first_name); ?></a>
                                </p>
                                <p class="author-title">Hostel Manager</p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\HostelConnect2.5\resources\views/hostels/general.blade.php ENDPATH**/ ?>