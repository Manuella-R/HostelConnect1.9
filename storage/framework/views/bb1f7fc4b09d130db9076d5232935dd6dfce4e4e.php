<!DOCTYPE html>
<html>
<head>
    <title>Resident Invitation</title>
</head>
<body>
    <h1>Hello, <?php echo e($user->name); ?></h1>
    <p>You have been invited to join the hostel <?php echo e($hostel->name); ?>.</p>
    <p>Please click the link below to accept the invitation:</p>
    <a href="<?php echo e(route('accept_invitation', ['token' => $token])); ?>">Accept Invitation</a>
    <p>If you do not expect this invitation, you can ignore this email.</p>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\HostelConnect2.5\resources\views\emails\resident_invitation.blade.php ENDPATH**/ ?>