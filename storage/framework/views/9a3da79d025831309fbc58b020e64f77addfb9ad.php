<?php $__env->startSection('profile'); ?>
<div class="card">
  <div class="card-header">
    Update Profile
  </div>
  <div class="card-body">
    <form action="<?php echo e(route('updateUserinfo')); ?>" id="update_profile_form" method="post">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>
      <div class="form-group">
        <label for="first_name">First Name</label>
        <input type="text" name="first_name" value="<?php echo e(old('first_name', $user->first_name ?? '')); ?>" class="form-control" id="first_name" placeholder="Enter first name">
        <?php if($errors->has('first_name')): ?>
          <span class="text-danger"><?php echo e($errors->first('first_name')); ?></span>
        <?php endif; ?>
      </div>
      <div class="form-group">
        <label for="last_name">Last Name</label>
        <input type="text" name="last_name" value="<?php echo e(old('last_name', $user->last_name ?? '')); ?>" class="form-control" id="last_name" placeholder="Enter last name">
        <?php if($errors->has('last_name')): ?>
          <span class="text-danger"><?php echo e($errors->first('last_name')); ?></span>
        <?php endif; ?>
      </div>
      <!-- Additional fields from user_desc table -->
      <div class="form-group">
        <label for="gender">Gender</label>
        <input type="text" name="gender" value="<?php echo e(old('gender', $UserDescription->gender?? '')); ?>" class="form-control" id="gender" placeholder="Enter gender">
        <?php if($errors->has('gender')): ?>
          <span class="text-danger"><?php echo e($errors->first('gender')); ?></span>
        <?php endif; ?>
      </div>
     
      <div class="form-group">
        <label for="admission_number">Admission number</label>
        <input type="number" name="admission_number" value="<?php echo e(old('admission_number', $UserDescription->admission_number ?? '')); ?>" class="form-control" id="admission_number" placeholder="Enter your admission number">
        <?php if($errors->has('admission_number')): ?>
          <span class="text-danger"><?php echo e($errors->first('admission_number')); ?></span>
        <?php endif; ?>
      </div>
     
      <div class="form-group">
        <label for="personality">Personality</label>
        <textarea name="personality" value="<?php echo e(old('personality', $UserDescription->personality ?? '')); ?>" class="form-control" id="personality" placeholder="Describe your personality"></textarea>
        <?php if($errors->has('personality')): ?>
          <span class="text-danger"><?php echo e($errors->first('personality')); ?></span>
        <?php endif; ?>
      </div>
      
      <div class="form-group">
        <label for="describe_yourself">description</label>
        <textarea name="additional_info" value="<?php echo e(old('describe_yourself', $UserDescription->describe_yourself ?? '')); ?>" class="form-control" id="describe_yourself" placeholder="Describe yourself and how you'd socialize with fellow hostel members"></textarea>
        <?php if($errors->has('describe_yourself')): ?>
          <span class="text-danger"><?php echo e($errors->first('describe_yourself')); ?></span>
        <?php endif; ?>
      </div>
      <button type="submit" class="btn btn-primary">Update Profile</button>
    </form>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('profile.profile-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\HostelConnect2.5\resources\views\profile\user_desc.blade.php ENDPATH**/ ?>