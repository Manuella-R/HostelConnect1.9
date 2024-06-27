
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>Hostel Connect</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/style.css')); ?>">

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>
    
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>
    
  </head>
  <body>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
  <h5 class="my-0 mr-md-auto font-weight-normal">Company name</h5>
  <nav class="my-2 my-md-0 mr-md-3 top-nav" >
    <a class="p-2 text-dark <?php echo e((request()->route()->getName()=='home')?'active':''); ?>" href="<?php echo e(route('home')); ?>">Home</a>

    <?php if(!auth()->check()): ?>
    <a class="p-2 text-dark <?php echo e((request()->route()->getName()=='getLogin')?'active':''); ?>" href="<?php echo e(route('getLogin')); ?>">Login</a>
    <?php endif; ?>

    <?php if(auth()->check()): ?>
    <a class="p-2 text-dark <?php echo e((request()->route()->getName()=='dashboard')?'active':''); ?>" href="<?php echo e(route('dashboard')); ?>">Profile</a>
    <a class="p-2 text-dark" href="<?php echo e(route('logout')); ?>">Logout</a>
    <?php endif; ?>
  </nav>
  <?php if(!auth()->check()): ?>
  <a class="btn btn-outline-primary <?php echo e((request()->route()->getName()=='getRegister')?'active':''); ?>" href="<?php echo e(route('getRegister')); ?>">Sign up</a>
  <?php endif; ?>
</div>


<div class="container-fluid" style="min-height: 74vh;">
<?php echo $__env->yieldContent('body'); ?>
</div>
<footer style="height: 100px;background: black;">
  
</footer>
<script type="text/javascript">
  window.baseUrl="<?php echo e(URL::to('/')); ?>";
  <?php if(session('success')): ?>
  toastr.success('<?php echo e(session("success")); ?>', 'Success', {timeOut: 5000});
  <?php endif; ?>

  <?php if(session('error')): ?>
  toastr.error('<?php echo e(session("error")); ?>', 'Error', {timeOut: 5000});
  <?php endif; ?>
</script>

<script type="text/javascript" src="<?php echo e(asset('js/auth.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/profile.js')); ?>"></script>
</body>
</html><?php /**PATH C:\xampp\htdocs\HostelConnect1.9\resources\views/layout/main-layout.blade.php ENDPATH**/ ?>