

<?php $__env->startSection('profile'); ?>
<body>
  
    <div style="width:75%;">
        <h2>Hostel Features</h2>
        <?php echo $barChart->render(); ?>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Feature</th>
                    <th>Number of Hostels</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $hostelCounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature => $count): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($feature); ?></td>
                        <td><?php echo e($count); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
    <div style="width:75%;">
        <h2>Hostel Rents</h2>
        <?php echo $lineChart->render(); ?>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Average Rent</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>KSH <?php echo e(number_format($averageRent, 2)); ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('profile.profile-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\HostelConnect2.5\resources\views/admin/charts.blade.php ENDPATH**/ ?>