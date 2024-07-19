<?php $__env->startComponent('mail::message'); ?>

Hello <?php echo e($user->first_name); ?>,
<?php $__env->startComponent('mail::button', ['url' => route('verify_email',$user->email_verification_code)]); ?>
Click here to verify your email address
<?php if (isset($__componentOriginalb8f5c8a6ad1b73985c32a4b97acff83989288b9e)): ?>
<?php $component = $__componentOriginalb8f5c8a6ad1b73985c32a4b97acff83989288b9e; ?>
<?php unset($__componentOriginalb8f5c8a6ad1b73985c32a4b97acff83989288b9e); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>

<p>Or copy paste the following link on your web browser to verify your email address</p>

<p><a href="<?php echo e(route('verify_email',$user->email_verification_code)); ?>"><?php echo e(route('verify_email',$user->email_verification_code)); ?></a></p>


Thanks,<br>
<?php echo e(config('app.name')); ?>

<?php if (isset($__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d)): ?>
<?php $component = $__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d; ?>
<?php unset($__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?><?php /**PATH C:\xampp\htdocs\HostelConnect2.5\resources\views/emails/auth/email_verification_mail.blade.php ENDPATH**/ ?>