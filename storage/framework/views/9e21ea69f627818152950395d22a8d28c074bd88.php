<?php $__env->startSection('body'); ?>
<div class="row">
    <div class="col-md-4">
        <ul class="list-group profile-nav">
            <li class="list-group-item <?php echo e((request()->route()->getName() == 'dashboard') ? 'active' : ''); ?>"><a href="<?php echo e(route('dashboard')); ?>">Dashboard</a></li>
            <li class="list-group-item <?php echo e((request()->route()->getName() == 'edit_profile') ? 'active' : ''); ?>"><a href="<?php echo e(route('edit_profile')); ?>">Edit Profile</a></li>
            <li class="list-group-item <?php echo e((request()->route()->getName() == 'change_password') ? 'active' : ''); ?>"><a href="<?php echo e(route('change_password')); ?>">Change Password</a></li>
            
            
            <li class="list-group-item" data-role="user-info"><a href="<?php echo e(route('edit_userinfo')); ?>">User Info</a></li>
            <li class="list-group-item" data-role="manage-hostel"><a href="<?php echo e(route('manager')); ?>">Manage Hostel Owners</a></li>
            <li class="list-group-item" data-role="hostel-info"><a href="<?php echo e(route('hostel_info')); ?>">Create/View Hostel Info</a></li>
            <li class="list-group-item" data-role="hostel-info"><a href="<?php echo e(route('hostel_info_main')); ?>">View Hostel Info</a></li>
            <li class="list-group-item" data-role="hostel-info"><a href="#">Manage Notifications</a>
            <li class="list-group-item" data-role="hostel-info"><a href="<?php echo e(route('expenditures.index')); ?>">Go to Expenditures</a></li>
            </ul>
    </div>
    <div class="col-md-8">
        <?php echo $__env->yieldContent('profile'); ?> 
    </div>
</div>


<p>User Role ID: <?php echo e(auth()->check() ? auth()->user()->user_role_id : 'Not logged in'); ?></p>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        var userRole = <?php echo e(auth()->check() ? auth()->user()->user_role_id : '0'); ?>; // Fetch user role ID

        // Function to hide elements based on user role
        function hideElementsBasedOnUserRole(roleId) {
            var elementsToHide = document.querySelectorAll('.list-group-item');

            elementsToHide.forEach(function(element) {
                var role = element.getAttribute('data-role');

                // Hide elements based on user role
                switch (roleId) {
                    case 1: // User role 1 (Example: hide elements for user info)
                        if ((role === 'manage-hostel' || role === 'hostel-info')) {
                            element.style.display = 'none';
                        }
                        break;
                    case 2: // User role 2 (Example: hide elements for manage hostel owners)
                        if ((role === 'user-info' || role === 'hostel-info')) {
                            element.style.display = 'none';
                        }
                        break;
                    case 3: // User role 3 (Example: hide elements for hostel info)
                        if ((role === 'user-info' || role === 'manage-hostel')) {
                            element.style.display = 'none';
                        }
                        break;
                    default:
                        break;
                }
            });
        }

        // Call function based on user role after DOM loaded
        hideElementsBasedOnUserRole(userRole);
    });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\HostelConnect2.5\resources\views\profile\profile-layout.blade.php ENDPATH**/ ?>