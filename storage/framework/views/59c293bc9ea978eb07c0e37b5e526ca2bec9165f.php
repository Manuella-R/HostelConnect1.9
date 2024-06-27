<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-body">
        
 <div >
     <form action="<?php echo e(route('postRegister')); ?>" method="POST"   id="modal_regitration_form">
        <?php echo csrf_field(); ?>
          <div class="form-title">
             SIGN UP
          </div>
         <div class="row">
          <div class="col-md-6">
          <div class="form-group">
          <label for="first_name">First Name</label>
          <input type="text" class="form-control" value="<?php echo e(old('first_name')); ?>" name="first_name" id="first_name" placeholder="First Name">
        <?php if($errors->any('first_name')): ?>
          <span class="text-danger"><?php echo e($errors->first('first_name')); ?></span>
        <?php endif; ?>
        </div>
          </div>
          <div class="col-md-6">
          <div class="form-group">
          <label for="last_name">Last Name</label>
          <input type="text" class="form-control" value="<?php echo e(old('last_name')); ?>" name="last_name" id="last_name" placeholder="Last Name">
          <?php if($errors->any('last_name')): ?>
          <span class="text-danger"><?php echo e($errors->first('last_name')); ?></span>
        <?php endif; ?>
        </div>
          </div>
         </div>
      <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" class="form-control" value="<?php echo e(old('email')); ?>" id="register_email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
      <?php if($errors->any('email')): ?>
        <span class="text-danger"><?php echo e($errors->first('email')); ?></span>
      <?php endif; ?>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password" autocomplete="false" id="register_password" placeholder="Password">
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
      
      <div class="form-group">
			    <label for="last_name">School Name</label>
			    <input type="text" class="form-control" value="<?php echo e(old('Schoolname')); ?>" name="Schoolname" id="Schoolname" placeholder="School Name">
			    <?php if($errors->any('Schoolname')): ?>
					<span class="text-danger"><?php echo e($errors->first('Schoolname')); ?></span>
				<?php endif; ?>
			  </div>
     	   	
				
	     	  <div class="form-group">
			    <label for="last_name">Admission number</label>
			    <input type="text" class="form-control" value="<?php echo e(old('AdmNo')); ?>" name="AdmNo" id="AdmNo" placeholder="Admission number">
			    <?php if($errors->any('AdmNo')): ?>
					<span class="text-danger"><?php echo e($errors->first('AdmNo')); ?></span>
				<?php endif; ?>
			  </div>
     	   
			
			<div class="form-group">
                <label for="DOB">Date of Birth</label>
                <input type="text" class="form-control datepicker" value="<?php echo e(old('DOB')); ?>" name="DOB" id="DOB" placeholder="Date of Birth">
                <?php if($errors->any('DOB')): ?>
                   <span class="text-danger"><?php echo e($errors->first('DOB')); ?></span>
                 <?php endif; ?>
            </div>
       <div class="form-check">
        <input type="checkbox" <?php echo e((old('terms'))?'checked':''); ?> name="terms" id="terms" class="form-check-input" >
        <label class="form-check-label" for="terms_check">Check our <a href="#">terms</a> and <a href="#">conditions</a></label>

      </div>
      <div id="terms_error"></div>
      <?php if($errors->any('terms')): ?>
        <span class="text-danger"><?php echo e($errors->first('terms')); ?></span>
      <?php endif; ?>
       
       <div><button type="submit" class="btn btn-primary mt-2">Submit</button>&nbsp; Already have an account <a class="login_button" href="javascript:void(0)">sign in</a> here</div>
  </form> 
</div>
</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
<script>
$(document).ready(function() {
        $(".datepicker").datepicker({
            dateFormat: 'yy-mm-dd', // Format the date as YYYY-MM-DD
            changeMonth: true, // Allow changing the month
            changeYear: true, // Allow changing the year
            yearRange: "1900:2100" // Specify the year range
        });
    });
</script><?php /**PATH C:\xampp\htdocs\HostelConnect1.9\resources\views/partials/modals/register.blade.php ENDPATH**/ ?>