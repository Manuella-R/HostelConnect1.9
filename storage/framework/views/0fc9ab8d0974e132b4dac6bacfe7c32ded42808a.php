<?php $__env->startSection('body'); ?>
 <div class="row mb-3">
     <form action="<?php echo e(route('postForgetPassword')); ?>" method="POST" class="col-md-6 col-xs-12 offset-md-3 auth-form"  id="forget_password_form">
     	  <?php echo csrf_field(); ?>
          <div class="form-title">
             FORGET PASSWORD
          </div>

		  <div class="form-group">
		    <label for="email">Email address</label>
		    <input type="email" class="form-control" value="<?php echo e(old('email')); ?>" id="email" name="email"  placeholder="Enter email">
		
			<?php if($errors->any('email')): ?>
				<span class="text-danger"><?php echo e($errors->first('email')); ?></span>
			<?php endif; ?>
		  </div>

		   <div><button type="submit" class="btn btn-primary mt-2">Submit</button>&nbsp; Have an account <a href="<?php echo e(route('getLogin')); ?>">sign in</a> </div>


	</form>	
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.main-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\HostelConnect2.5\resources\views\auth\forget_password.blade.php ENDPATH**/ ?>