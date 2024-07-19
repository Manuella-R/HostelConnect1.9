<?php $__env->startSection('body'); ?>
<div class="row mb-3">
    <form action="<?php echo e(route('postRegister')); ?>" method="POST" enctype="multipart/form-data" class="col-md-6 col-xs-12 offset-md-3 auth-form" id="registration_form">
        <?php echo csrf_field(); ?>
        <div class="form-title">SIGN UP</div>
        
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
        
        <label for="student">
            <input type="radio" id="student" name="role" value="1" required>
            Student
        </label>
        <label for="admin">
            <input type="radio" id="caretaker" name="role" value="3" required>
            caretaker
        </label>
        
        
        
        <div id="admin_fields" style="display:none;">
            <div class="form-group">
                <label for="phone_number">Phone number</label>
                <input type="text" class="form-control" name="phone_number" autocomplete="false" id="phone_number" placeholder="Phone number">
                <?php if($errors->any('phone_number')): ?>
                    <span class="text-danger"><?php echo e($errors->first('phone_number')); ?></span>
                <?php endif; ?>
            </div>
            
            <div class="form-group">
                <label for="establishment_name">Name of business</label>
                <input type="text" class="form-control" name="establishment_name" autocomplete="false" id="establishment_name" placeholder="Name of business">
                <?php if($errors->any('establishment_name')): ?>
                    <span class="text-danger"><?php echo e($errors->first('establishment_name')); ?></span>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="photo_proof">Photo of Buisness Permit </label>
                <input type="file" name="photo_proof" id="photo_proof" class="form-control">
            </div>

		<div class="form-group">
            <input type="checkbox" <?php echo e((old('terms')) ? 'checked' : ''); ?> name="terms" id="terms" class="form-check-input">
            <label class="form-check-label" for="terms_check">Check our <a href="#">terms</a> and <a href="#">conditions</a></label>
        </div>
        
        <div>
            <button type="submit" class="btn btn-primary mt-2">Submit</button>&nbsp; 
           
        </div>
        </div>

        <div id="student_fields" style="display:none;">
       
        <div class="form-group">
                <label for="phone_number">Phone number</label>
                <input type="text" class="form-control" name="phone_number" autocomplete="false" id="phone_number" placeholder="Phone number">
                <?php if($errors->any('phone_number')): ?>
                    <span class="text-danger"><?php echo e($errors->first('phone_number')); ?></span>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="establishment_name">University name</label>
                <input type="text" class="form-control" name="establishment_name" autocomplete="false" id="establishment_name" placeholder="University name">
                <?php if($errors->any('establishment_name')): ?>
                    <span class="text-danger"><?php echo e($errors->first('establishment_name')); ?></span>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="photo">Photo of SchoolID </label>
                <input type="file" name="photo" id="photo" class="form-control">
            </div>
			<div class="form-group">
            <input type="checkbox" <?php echo e((old('terms')) ? 'checked' : ''); ?> name="terms" id="terms" class="form-check-input">
            <label class="form-group" for="terms_check">Check our <a href="#">terms</a> and <a href="#">conditions</a></label>
            </div>
        
           <div>
            <button type="submit" class="btn btn-primary mt-2">Submit</button>&nbsp; 
           
           </div>
        </div>
        
        
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const studentRadio = document.getElementById('student');
        const adminRadio = document.getElementById('caretaker');
        const studentFields = document.getElementById('student_fields');
        const adminFields = document.getElementById('admin_fields');
        
        function toggleFields() {
            if (studentRadio.checked) {
                studentFields.style.display = 'block';
                adminFields.style.display = 'none';
            } else if (adminRadio.checked) {
                adminFields.style.display = 'block';
                studentFields.style.display = 'none';
            }
        }
        
        studentRadio.addEventListener('change', toggleFields);
        adminRadio.addEventListener('change', toggleFields);
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.main-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\HostelConnect2.5\resources\views/auth/register.blade.php ENDPATH**/ ?>