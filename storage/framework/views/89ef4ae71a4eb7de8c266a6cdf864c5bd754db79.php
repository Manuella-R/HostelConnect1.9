

<?php $__env->startSection('profile'); ?>
<div class="container">
    <h1 class="my-4">Expenditures</h1>
    
    <!-- Success message -->
    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <!-- Add Expenditure Form -->
    <div class="card mb-4">
        <div class="card-header">
            Add New Expenditure
        </div>
        <div class="card-body">
            <form method="POST" action="<?php echo e(route('expenditures.store')); ?>">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" class="form-control" id="date" name="date" required>
                </div>
                <div class="form-group">
    <label for="type">Type</label>
    <select class="form-control" id="type" name="type" required>
        <option value="shopping">Shopping</option>
        <option value="repair">Repair</option>
        <option value="medical">Medical</option>
        <option value="emergency">Emergency</option>
    </select>
</div>

                <div class="form-group">
                    <label for="amount">Amount</label>
                    <input type="number" class="form-control" id="amount" name="amount" required>
                </div>
                <button type="submit" class="btn btn-primary">Add Expenditure</button>
            </form>
        </div>
    </div>

    <!-- Expenditures List -->
    <div class="card">
        <div class="card-header">
            Expenditures List
        </div>
        <div class="card-body">
            <?php if($expenditures->isEmpty()): ?>
                <p>No expenditures found.</p>
            <?php else: ?>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Type</th>
                            <th>Amount</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $expenditures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $expenditure): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($expenditure->date); ?></td>
                                <td><?php echo e($expenditure->type); ?></td>
                                <td><?php echo e($expenditure->amount); ?></td>
                                <td>
                                    <form action="<?php echo e(route('expenditures.destroy', $expenditure->id)); ?>" method="POST" onsubmit="return confirm('Are you sure you want to delete this expenditure?');">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('profile.profile-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\HostelConnect2.5\resources\views/expenditures/index.blade.php ENDPATH**/ ?>