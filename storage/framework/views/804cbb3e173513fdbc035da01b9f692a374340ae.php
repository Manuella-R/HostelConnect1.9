
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>HostelConnect - Find your dream hostel</title>
    <link rel="shortcut icon" href="<?php echo e(asset('images/favicon.svg')); ?>" type="image/svg+xml">
    <link rel="stylesheet" href="<?php echo e(asset('css/home.css')); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;600;700&family=Poppins:wght@400;500;600;700&display=swap"
    rel="stylesheet">
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
  <body >
  <header class="header" data-header>

<div class="overlay" data-overlay></div>



<div class="header-bottom">
  <div class="container">

    <a href="#" class="logo">
      <img src="<?php echo e(asset('images/logo.png')); ?>" alt="Homeverse logo">
    </a>

    <nav class="navbar" data-navbar>

      <div class="navbar-top">

        <a href="#" class="logo">
          <img src="<?php echo e(asset('images/logo.png')); ?>" alt="Homeverse logo">
        </a>

        <button class="nav-close-btn" data-nav-close-btn aria-label="Close Menu">
          <ion-icon name="close-outline"></ion-icon>
        </button>

      </div>

      <div class="navbar-bottom">
        <ul class="navbar-list">

          <li>
    <a class="navbar-link <?php echo e((request()->route()->getName()=='home')?'active':''); ?>" href="<?php echo e(route('home')); ?>">Home</a>
          </li>

          <li>
            <a href="<?php echo e((request()->route()->getName()=='home')?'active':''); ?>" href="<?php echo e(route('home')); ?>" class="navbar-link" data-nav-link>About</a>
          </li>

          <li>
            <a href="<?php echo e((request()->route()->getName()=='home')?'active':''); ?>" href="<?php echo e(route('home')); ?>" class="navbar-link" data-nav-link>Service</a>
          </li>

          <li>
            <a href="<?php echo e((request()->route()->getName()=='home')?'active':''); ?>" href="<?php echo e(route('home')); ?>" class="navbar-link" data-nav-link>Property</a>
          </li>

          <li>
      <?php if(!auth()->check()): ?>
            <a class="navbar-link <?php echo e((request()->route()->getName()=='getLogin')?'active':''); ?>" href="<?php echo e(route('getLogin')); ?>">Login</a>
            <?php endif; ?>
          </li>

          <li>
       <?php if(!auth()->check()): ?>
            <a class="navbar-link <?php echo e((request()->route()->getName()=='getRegister')?'active':''); ?>" href="<?php echo e(route('getRegister')); ?>">Sign up</a>
            <?php endif; ?>
          </li>

        </ul>
      </div>

    </nav>

    <div class="header-bottom-actions">

    <?php if(auth()->check()): ?>
    <a class="navbar-link <?php echo e((request()->route()->getName()=='dashboard')?'active':''); ?>" href="<?php echo e(route('dashboard')); ?>">Profile</a>
    <a class="navbar-link" href="<?php echo e(route('logout')); ?>">Logout</a>
    <?php endif; ?>

      <button class="header-bottom-actions-btn" data-nav-open-btn aria-label="Open Menu">
        <ion-icon name="menu-outline"></ion-icon>

        <span>Menu</span>
      </button>

    </div>

  </div>
</div>

</header>


<div class="container-fluid" style="min-height: 74vh;">
<?php echo $__env->yieldContent('body'); ?>
</div>
<footer class="footer">

    
    <div class="footer-bottom">
      <div class="container">

        <p class="copyright">
          &copy; 2024 <a href="#">Cindy & Rehema</a>. All Rights Reserved
        </p>

      </div>
    </div>

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
</html><?php /**PATH C:\xampp\htdocs\HostelConnect2.5\resources\views\layout\main-layout.blade.php ENDPATH**/ ?>