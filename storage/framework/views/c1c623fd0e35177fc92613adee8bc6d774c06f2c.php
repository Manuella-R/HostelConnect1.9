

<?php $__env->startSection('profile'); ?>
<div class="container">
    <h1>Expenditure Analysis</h1>

    <div class="row">
        <div class="col-md-6">
            <div>
                <?php echo $barChart->render(); ?>

            </div>
        </div>
        <div class="col-md-6">
            <div>
                <?php echo $pieChart->render(); ?>

            </div>
        </div>
    </div>

    <h2>Expenditure Summary</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Type</th>
                <th>Total Amount</th>
                <th>Count</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $expenditureTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($type); ?></td>
                    <td><?php echo e($data['sum']); ?></td>
                    <td><?php echo e($data['count']); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('profile.profile-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\HostelConnect2.5\resources\views/expenditures/analysis.blade.php ENDPATH**/ ?>