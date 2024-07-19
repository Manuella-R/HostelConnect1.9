<?php $__env->startSection('profile'); ?>
 <div class="card">
  <div class="card-header">
    Change Password
  </div>
  <div class="card-body">
	 
	 <form action="<?php echo e(route('update_password')); ?>" id="change_password_form" method="post">
		<?php echo csrf_field(); ?>
	   <div class="form-group">
		<label for="old_password">Old Password</label>
		<input type="password" name="old_password" class="form-control" id="old_password" >
	
		<?php if($errors->any('old_password')): ?>
		  <span class="text-danger"><?php echo e($errors->first('old_password')); ?></span>
		<?php endif; ?>
	  </div>
	  <div class="form-group">
		<label for="password">New Password</label>
		<input type="password" name="new_password" class="form-control" id="new_password" >
		<?php if($errors->any('new_password')): ?>
		  <span class="text-danger"><?php echo e($errors->first('new_password')); ?></span>
		<?php endif; ?>
	  </div>
	  <div class="form-group">
		<label for="confirm_password">Confirm Password</label>
		<input type="password" name="confirm_password" class="form-control" id="confirm_password" >
		<?php if($errors->any('confirm_password')): ?>
		  <span class="text-danger"><?php echo e($errors->first('confirm_password')); ?></span>
		<?php endif; ?>
	  </div>

	  <button type="submit" class="btn btn-primary">Update Password</button>
	</form>
  </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('profile.profile-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\HostelConnect2.5\resources\views\profile\change_password.blade.php ENDPATH**/ ?>