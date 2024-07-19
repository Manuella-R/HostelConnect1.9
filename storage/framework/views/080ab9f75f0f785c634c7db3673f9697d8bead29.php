<!DOCTYPE html>
<html>
<head>
    <title>Hostel Application</title>
</head>
<body>
    <h1>Hostel Application from <?php echo e($details['user']->name); ?></h1>
    <p><strong>Email:</strong> <?php echo e($details['user']->email); ?></p>
    <p><strong>Hostel Name:</strong> <?php echo e($details['hostel']->name); ?></p>
    <p><strong>Personality Description:</strong></p>
    <p><?php echo e($details['personality']); ?></p>
    <p><strong>Neighbour Expectations:</strong></p>
    <p><?php echo e($details['expectations']); ?></p>
    <p>Looking forward hearing a favourable response from you soon</p>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\HostelConnect2.5\resources\views\emails\hostel-application.blade.php ENDPATH**/ ?>