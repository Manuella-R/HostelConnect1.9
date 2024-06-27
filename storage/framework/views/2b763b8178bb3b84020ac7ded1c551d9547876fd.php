<?php $__env->startSection('body'); ?>
 <div class="row mb-3">
     <form action="<?php echo e(route('postLogin')); ?>" method="POST" class="col-md-6 col-xs-12 offset-md-3 auth-form"  id="login_form">
     	  <?php echo csrf_field(); ?>
          <div class="form-title">
             SIGN IN
          </div>

		  <div class="form-group">
		    <label for="email">Email address</label>
		    <input type="email" class="form-control" value="<?php echo e(old('email')); ?>" id="email" name="email"  placeholder="Enter email">
		
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


		   <div class="form-check">
		    <input type="checkbox" <?php echo e((old('remember_me'))?'checked':''); ?> value="true" name="remember_me" id="remember_me" class="form-check-input" >
		    <label class="form-check-label" for="remember_me">Remember Me</label>

		  </div>

		   
		   <div><button type="submit" class="btn btn-primary mt-2">Submit</button>&nbsp; Don't have an account <a href="<?php echo e(route('getRegister')); ?>">sign up</a> here</div>

		   <div> <a href="<?php echo e(route('getForgetPassword')); ?>">Forget Password</a></div>

	</form>	
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.main-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\HostelConnect1.9\resources\views/auth/login.blade.php ENDPATH**/ ?>