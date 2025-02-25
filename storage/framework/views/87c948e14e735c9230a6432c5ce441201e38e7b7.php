<?php $__env->startSection('body'); ?>
 <div class="row">
 	<div class="col-md-12" align="center">
 		<div class="jumbotron">
	 		<div>
	 			<p class="home-text">Please login or  register</p>
	 			<button class="btn btn-success login_button" >Login</button>&nbsp;<button class="btn btn-primary register_button" >Register</button>
	 		</div>
	 		<div class="mt-5">
	            <form action="<?php echo e(route('subscribe')); ?>" method="post">
	            	<?php echo csrf_field(); ?>
				  <div class="form-group">
				    <input type="email" name="subscriber_email" placeholder="Enter your email"  class="form-control col-md-4 col-xs-12" id="exampleInputEmail1" aria-describedby="emailHelp">
				    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
					<?php if($errors->any('subscriber_email')): ?>
						<span class="text-danger"><?php echo e($errors->first('subscriber_email')); ?></span>
					<?php endif; ?>
				  </div>
				  <button type="submit" class="btn btn-primary">Subscribe</button>
				</form>
	 		</div>
 		</div>
 	</div>
 </div>

<?php echo $__env->make('partials.modals.login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('partials.modals.register', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.main-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\HostelConnect1.9\resources\views/home.blade.php ENDPATH**/ ?>