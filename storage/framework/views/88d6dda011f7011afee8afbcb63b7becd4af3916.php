<?php $__env->startSection('profile'); ?>
 <div class="card">
<div class="card-header">Update Profile</div>
	<div class="card-body">
		<form action="<?php echo e(route('update_profile')); ?>" id="edit_profile_form" method="post">
			<?php echo csrf_field(); ?>
			<?php echo method_field('PUT'); ?>
			 <div class="form-group">
			    <label for="first_name">First Name</label>
			    <input type="text" name="first_name" value="<?php echo e((old('first_name'))?old('first_name'):$user->first_name); ?>"  class="form-control" id="first_name"  placeholder="Enter first name">
        	   <?php if($errors->any('first_name')): ?>
				<span class="text-danger"><?php echo e($errors->first('first_name')); ?></span>
			   <?php endif; ?>
			  </div>
			  <div class="form-group ">
			    <label for="last_name">Last Name</label>
			    <input type="text" value="<?php echo e((old('last_name'))?old('last_name'):$user->last_name); ?>"  name="last_name" class="form-control" id="last_name" placeholder="Enter last name">
          	   <?php if($errors->any('last_name')): ?>
				<span class="text-danger"><?php echo e($errors->first('last_name')); ?></span>
			   <?php endif; ?>
			  </div>
	
		    <button type="submit" class="btn btn-primary">Update</button>
		</form>

	</div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('profile.profile-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\HostelConnect2.5\resources\views/profile/edit_profile.blade.php ENDPATH**/ ?>