<?php $__env->startSection('body'); ?>
<div class="row">
    <div class="col-md-4">
        <ul class="list-group profile-nav">
            <li class="list-group-item <?php echo e((request()->route()->getName() == 'dashboard') ? 'active' : ''); ?>"><a href="<?php echo e(route('dashboard')); ?>">Dashboard</a></li>
            <li class="list-group-item <?php echo e((request()->route()->getName() == 'edit_profile') ? 'active' : ''); ?>"><a href="<?php echo e(route('edit_profile')); ?>">Edit Profile</a></li>
            <li class="list-group-item <?php echo e((request()->route()->getName() == 'change_password') ? 'active' : ''); ?>"><a href="<?php echo e(route('change_password')); ?>">Change Password</a></li>
            
            
            <li class="list-group-item" data-role="user-info"><a href="<?php echo e(route('notifications.view')); ?>">View Notifications</a></li>
            <li class="list-group-item" data-role="user-info"><a href="<?php echo e(route('tickets.index')); ?>">Post Ticket</a></li>
            <li class="list-group-item" data-role="user-info"><a href="<?php echo e(route('payment.form')); ?>">Pay Rent
                       
                
            </a></li>
     


            <li class="list-group-item" data-role="manage-hostel"><a href="<?php echo e(route('manager')); ?>">Manage Hostel Owners</a></li>
            <li class="list-group-item" data-role="manage-hostel"><a href="<?php echo e(route('admin.reviews.flagged-reviews')); ?>">Manage Comments</a></li>
            <li class="list-group-item" data-role="manage-hostel"><a href="<?php echo e(route('showCharts')); ?>">Hostel Analysis</a></li>

            <li class="list-group-item" data-role="hostel-info"><a href="<?php echo e(route('hostel_info')); ?>">Create/View Hostel Info</a></li>
            <li class="list-group-item" data-role="hostel-info"><a href="<?php echo e(route('hostel_info_main')); ?>">View Hostel Info</a></li>
            <li class="list-group-item" data-role="hostel-info"><a href="<?php echo e(route('search_user_form')); ?>">Add Residents</a></li>
            <li class="list-group-item" data-role="hostel-info"><a href="<?php echo e(route('notifications.index')); ?>">Manage Notifications</a></li>
            <li class="list-group-item" data-role="hostel-info"><a href="<?php echo e(route('viewResidents')); ?>">View Residents</a></li>
            <li class="list-group-item" data-role="hostel-info"><a href="<?php echo e(route('tickets.view')); ?>">View Tickets</a></li>
            <li class="list-group-item" data-role="hostel-info"><a href="<?php echo e(route('expenditures.index')); ?>">Add Expenditures</a></li>
            <li class="list-group-item" data-role="hostel-info"><a href="<?php echo e(route('expenditures.analysis')); ?>">Analysis of Expenditures</a></li>
        </ul>
    </div>
    <div class="col-md-8">
        <?php echo $__env->yieldContent('profile'); ?> 
    </div>
</div>


<p style="visibility: hidden;">User Role ID: <?php echo e(auth()->check() ? auth()->user()->user_role_id : 'Not logged in'); ?></p>
<p style="visibility: hidden;">User is Resident: <?php echo e(auth()->check() ? auth()->user()->is_resident : 'Not logged in'); ?></p>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        var userRole = <?php echo e(auth()->check() ? auth()->user()->user_role_id : '0'); ?>; // Fetch user role ID
        var isResident = <?php echo e(auth()->check() ? auth()->user()->is_resident : '0'); ?>; // Fetch user is_resident

        // Function to hide elements based on user role and is_resident
        function hideElementsBasedOnUserRoleAndResidentStatus(roleId, residentStatus) {
            var elementsToHide = document.querySelectorAll('.list-group-item');

            elementsToHide.forEach(function(element) {
                var role = element.getAttribute('data-role');

                // Hide elements based on user role and is_resident
                if (roleId == 1 && (role === 'manage-hostel' || role === 'hostel-info')) {
                    element.style.display = 'none';
                } else if (roleId == 2 && (role === 'user-info' || role === 'hostel-info')) {
                    element.style.display = 'none';
                } else if (roleId == 3 && (role === 'user-info' || role === 'manage-hostel')) {
                    element.style.display = 'none';
                } else if (!residentStatus && role === 'user-info') {
                    element.style.display = 'none';
                }
            });
        }

        // Call function based on user role and resident status after DOM loaded
        hideElementsBasedOnUserRoleAndResidentStatus(userRole, isResident);
    });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\HostelConnect2.5\resources\views/profile/profile-layout.blade.php ENDPATH**/ ?>