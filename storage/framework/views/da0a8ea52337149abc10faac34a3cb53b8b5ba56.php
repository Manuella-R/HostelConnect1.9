<?php $__env->startComponent('mail::message'); ?>

Hello <?php echo e($user_name); ?> 

<?php $__env->startComponent('mail::button', ['url' => route('getResetPassword',$reset_code)]); ?>
Click here to reset your password
<?php if (isset($__componentOriginalb8f5c8a6ad1b73985c32a4b97acff83989288b9e)): ?>
<?php $component = $__componentOriginalb8f5c8a6ad1b73985c32a4b97acff83989288b9e; ?>
<?php unset($__componentOriginalb8f5c8a6ad1b73985c32a4b97acff83989288b9e); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<p>Or copy & paste the following link to your browser</p>
<p><a href="<?php echo e(route('getResetPassword',$reset_code)); ?>"><?php echo e(route('getResetPassword',$reset_code)); ?></a></p>

Thanks,<br>
<?php echo e(config('app.name')); ?>

<?php if (isset($__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d)): ?>
<?php $component = $__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d; ?>
<?php unset($__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php /**PATH C:\xampp\htdocs\HostelConnect2.5\resources\views/emails/auth/forget_password_mail.blade.php ENDPATH**/ ?>