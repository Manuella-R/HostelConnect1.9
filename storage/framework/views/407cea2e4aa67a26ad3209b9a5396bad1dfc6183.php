<?php $__env->startSection('body'); ?>
 <div class="row mb-3">
     <form action="<?php echo e(route('postResetPassword',$reset_code)); ?>" method="POST" class="col-md-6 col-xs-12 offset-md-3 auth-form"  id="reset_password_form">
     	  <?php echo csrf_field(); ?>
          <div class="form-title">
             RESET PASSWORD
          </div>

		  <div class="form-group">
		    <label for="email">Email address</label>
		    <input type="email" class="form-control" value="<?php echo e(old('email')); ?>" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
		    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
			<?php if($errors->any('email')): ?>
				<span class="text-danger"><?php echo e($errors->first('email')); ?></span>
			<?php endif; ?>
		  </div>
		  <div class="form-group">
		    <label for="password">Password</label>
		    <input type="password" class="form-control" name="password" autocomplete="false" id="password" placeholder="Password">
			<?php if($errors->any('password')): ?>
				<span class="text-danger"><?php echo e($errors->first('password')); ?></span>
			<?php endif; ?>
		  </div>

		  <div class="form-group">
		    <label for="confirm_password">Confirm Password</label>
		    <input type="password" class="form-control" name="confirm_password" autocomplete="false" id="confirm_password" placeholder="Confirm Password">
			<?php if($errors->any('confirm_password')): ?>
				<span class="text-danger"><?php echo e($errors->first('confirm_password')); ?></span>
			<?php endif; ?>
		  </div>

		   <div><button type="submit" class="btn btn-primary mt-2">Submit</button></div>
	</form>	
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.main-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\HostelConnect2.5\resources\views/auth/reset_password.blade.php ENDPATH**/ ?>