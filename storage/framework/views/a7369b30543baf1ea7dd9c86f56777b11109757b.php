 <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-body">
         <div >
     <form action="<?php echo e(route('postLogin')); ?>" method="POST"   id="modal_login_form">
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

       
       <div><button type="submit" class="btn btn-primary mt-2">Submit</button>&nbsp; Don't have an account <a class="register_button" href="javascript:void(0)">sign up</a> here</div>

       <div> <a href="<?php echo e(route('getForgetPassword')); ?>">Forget Password</a></div>

  </form> 
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    
      </div>
    </div>
  </div>
</div>
<?php /**PATH C:\xampp\htdocs\HostelConnect2.5\resources\views\partials\modals\login.blade.php ENDPATH**/ ?>