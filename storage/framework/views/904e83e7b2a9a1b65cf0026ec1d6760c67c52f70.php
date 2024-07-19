

<?php $__env->startSection('profile'); ?>
<div class="container">
    <h1>Tickets</h1>

    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <?php if($hasTickets): ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Notification</th>
                    <th>Created At</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($ticket->ticket); ?></td>
                        <td><?php echo e($ticket->created_at->format('Y-m-d H:i:s')); ?></td>
                        <td>Status: <?php echo e($ticket->is_solved ? 'Solved' : 'Pending'); ?></td>
                        <td>
                            <form action="<?php echo e(route('tickets.markSolved', $ticket->ticket_id)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>
                                <button type="submit" class="btn btn-sm btn-primary">
                                    <?php echo e($ticket->is_solved ? 'Mark Unsolved' : 'Mark Solved'); ?>

                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No Ticket posted.</p>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('profile.profile-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\HostelConnect2.5\resources\views/tickets/view.blade.php ENDPATH**/ ?>