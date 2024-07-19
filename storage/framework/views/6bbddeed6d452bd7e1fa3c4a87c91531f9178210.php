
<?php $__env->startSection('profile'); ?>
<div class="container">
    <h1>Tickets</h1>

    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <a href="<?php echo e(route('tickets.create')); ?>" class="btn btn-primary mb-3">Create Tickets</a>

    <?php if($hasTickets): ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Message</th>
                    <th>Created At</th>
                    <th>Actions</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($ticket->ticket); ?></td>
                        <td><?php echo e($ticket->created_at->format('Y-m-d H:i:s')); ?></td>
                        <td>
                            <a href="<?php echo e(route('tickets.edit', $ticket->ticket_id)); ?>" class="btn btn-warning">Edit</a>
                            <form action="<?php echo e(route('tickets.destroy', $ticket->ticket_id)); ?>" method="POST" style="display:inline;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                        <td>Status: <?php echo e($ticket->status); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No tickets posted.</p>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('profile.profile-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\HostelConnect2.5\resources\views/tickets/index.blade.php ENDPATH**/ ?>