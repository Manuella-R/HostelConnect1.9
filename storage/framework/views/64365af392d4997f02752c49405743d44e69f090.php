<?php $__env->startSection('profile'); ?>
<div class="card">
  <div class="card-header">
    Dashboard
  </div>
  <div class="card-body">
    <h5 class="card-title">Welcome to your profile <?php echo e($user->first_name); ?></h5>

    <table class="table">
 
      <tbody>
        <tr>
          <td>First Name</td>
          <td><?php echo e($user->first_name); ?></td>
        </tr>
        <tr>
          <td>Last Name</td>
          <td><?php echo e($user->last_name); ?></td>
        </tr>
        <tr>
          <td>Email</td>
          <td><?php echo e($user->email); ?></td>
        </tr>
       
      </tbody>
    </table>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('profile.profile-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\HostelConnect2.5\resources\views\profile\dashboard.blade.php ENDPATH**/ ?>