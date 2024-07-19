<body>

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
              <img src="<?php echo e(asset('images/logo.png')); ?>" alt="HostelConnect logo">
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
                <a href="<?php echo e((request()->route()->getName()=='home#about')?'active':''); ?>" class="navbar-link" data-nav-link>About</a>
              </li>

              <li>
                <a href="<?php echo e((request()->route()->getName()=='home#service')?'active':''); ?>" class="navbar-link" data-nav-link>Service</a>
              </li>

              <li>
    <a href="<?php echo e(route('hostels.general')); ?>" class=" navbar-link <?php echo e(request()->route()->getName() == 'hostels.general' ? 'active' : ''); ?>" class="navbar-link" data-nav-link>Property</a>
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
		
          <button class="header-bottom-actions-btn" aria-label="Search">
            <ion-icon name="search-outline"></ion-icon>

            <span>Search</span>
          </button>

          


          <button class="header-bottom-actions-btn" data-nav-open-btn aria-label="Open Menu">
            <ion-icon name="menu-outline"></ion-icon>

            <span>Menu</span>
          </button>

        </div>

      </div>
    </div>

  </header>





  <main>
    <article>
      <section class="hero" id="home">
        <div class="container">

          <div class="hero-content">

            <p class="hero-subtitle">
              <ion-icon name="home"></ion-icon>

              <span>Connecting you to hostels</span>
            </p>

            <h2 class="h1 hero-title">Find Your Dream Hostel By Us</h2>

            <p class="hero-text">
             Help ease your struggles in finfing the best hostel for you
            </p>

            <button class="btn">Available Hostels</button>

          </div>

          <figure class="hero-banner">
            <img src="<?php echo e(asset('images/hero-banner.png')); ?>" alt="Modern house model" class="w-100">
          </figure>

        </div>
      </section>


      <section class="about" id="about">
        <div class="container">

          <figure class="about-banner">
            <img src="<?php echo e(asset('images/about-banner-1.png')); ?>" alt="House interior">

        
          </figure>

          <div class="about-content">

            <p class="section-subtitle">About Us</p>

            <h2 class="h2 section-title">Best assistenat in finding the best hostel for you.</h2>

            <p class="about-text">
              Over 1,000 students have found hostels that perfectly suit their preferences
              specialist services
            </p>

            <ul class="about-list">

              <li class="about-item">
                <div class="about-item-icon">
                  <ion-icon name="home-outline"></ion-icon>
                </div>

                <p class="about-item-text">Smart Home Design</p>
              </li>

              <li class="about-item">
                <div class="about-item-icon">
                  <ion-icon name="leaf-outline"></ion-icon>
                </div>

                <p class="about-item-text">Beautiful Scene Around</p>
              </li>

              <li class="about-item">
                <div class="about-item-icon">
                  <ion-icon name="wine-outline"></ion-icon>
                </div>

                <p class="about-item-text">Exceptional Lifestyle</p>
              </li>

              <li class="about-item">
                <div class="about-item-icon">
                  <ion-icon name="shield-checkmark-outline"></ion-icon>
                </div>

                <p class="about-item-text">Secure and Fast paths to School</p>
              </li>

            </ul>

            <p class="callout">
             "The best companion you can find"
            </p>

            <a href="#service" class="btn">Our Services</a>

          </div>

        </div>
      </section>


      <section class="service" id="service">
        <div class="container">

          <p class="section-subtitle">Our Services</p>

          <h2 class="h2 section-title">Our Main Focus</h2>

          <ul class="service-list">

            <li>
              <div class="service-card">

                <div class="card-icon">
                  <img src="<?php echo e(asset('images/service-1.png')); ?>" alt="Service icon">
                </div>

                <h3 class="h3 card-title">
                  <a href="#">Comfortable placements</a>
                </h3>

                <p class="card-text">
                  Help students find their ideal hostels, to ensure maximum comfort as they pursue their higher education
                </p>

                <a href="#" class="card-link">
                  <span>Find A Home</span>

                  <ion-icon name="arrow-forward-outline"></ion-icon>
                </a>

              </div>
            </li>

            <li>
              <div class="service-card">

                <div class="card-icon">
                  <img src="<?php echo e(asset('images/service-2.png')); ?>" alt="Service icon">
                </div>

                <h3 class="h3 card-title">
                  <a href="#">Advertise Hostels</a>
                </h3>

                <p class="card-text">
                  over 100 hostels are available on the website, we can match you with a hostel you will want
                  to call home.
                </p>

                <a href="#" class="card-link">
                  <span>Find A Home</span>

                  <ion-icon name="arrow-forward-outline"></ion-icon>
                </a>

              </div>
            </li>

          </ul>

        </div>
      </section>


	  <section class="property" id="property">
        <div class="container">

          <p class="section-subtitle">Properties</p>

          <h2 class="h2 section-title">Recent Listings</h2>

          <ul class="property-list has-scrollbar">
          <?php $__currentLoopData = $latestHostel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hostels): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <li>
            <div class="property-card">
                <div class="card-content">
                    <div class="card-price">
                        <strong>KSH<?php echo e(number_format($hostels->rent, 2)); ?></strong>/Month
                    </div>
                    <h3 class="h3 card-title">
                    <?php echo e($hostels->name); ?>

                  </h3>
                     <p class="card-text">
                        <?php echo e($hostels->description); ?>

                    </p>
                    <ul class="card-list">
                        <li class="card-item">
                            <strong><?php echo e($hostels->vacant_beds); ?></strong>
                            <ion-icon name="bed-outline"></ion-icon>
                            <span>Bedrooms</span>
                        </li>
                        <a href="<?php echo e(route('hostels.show', ['id' => $hostels->H_id])); ?>" class="btn btn-primary">View Details</a>        
                    </ul>
                               </div>
            </div>
            <div class="card-footer">

                  <div class="card-author">

                    <figure class="author-avatar">
                     
                    </figure>

                    <div>
                      <p class="author-name">
                        <a href="#"><?php echo e($hostels->user->first_name); ?></a>
                      </p>

                      <p class="author-title">Hostel Manager</p>
                    </div>

                  </div>
</div>
          </li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <li>
              <div class="property-card">

                <div class="card-content">

                  <div class="card-price">
                    <strong>KSH34,900</strong>/Month
                  </div>

                  <h3 class="h3 card-title">
                    <a href="#">Modern Apartments</a>
                  </h3>

                  <p class="card-text">
                    Beautiful Huge 1 Family House In Heart Of Westbury. Newly Renovated With New Wood
                  </p>

                  <ul class="card-list">

                    <li class="card-item">
                      <strong>3</strong>

                      <ion-icon name="bed-outline"></ion-icon>

                      <span>Bedrooms</span>
                    </li>

                    <a href="#" class="btn btn-primary">View Details</a> 
                  </ul>

                </div>

                <div class="card-footer">

                  <div class="card-author">

                    <figure class="author-avatar">
                     
                    </figure>

                    <div>
                      <p class="author-name">
                        <a href="#">William Seklo</a>
                      </p>

                      <p class="author-title">Hostel Manager</p>
                    </div>

                  </div>

                  <div class="card-footer-actions">

                    <button class="card-footer-actions-btn">
                      <ion-icon name="resize-outline"></ion-icon>
                    </button>

                    <button class="card-footer-actions-btn">
                      <ion-icon name="heart-outline"></ion-icon>
                    </button>

                    <button class="card-footer-actions-btn">
                      <ion-icon name="add-circle-outline"></ion-icon>
                    </button>

                  </div>

                </div>

              </div>
            </li>

            <li>
              <div class="property-card">



                <div class="card-content">

                  <div class="card-price">
                    <strong>Ksh34,900</strong>/Month
                  </div>

                  <h3 class="h3 card-title">
                    <a href="#">Comfortable Apartment</a>
                  </h3>

                  <p class="card-text">
                    Beautiful Huge 1 Family House In Heart Of Westbury. Newly Renovated With New Wood
                  </p>

                  <ul class="card-list">

                    <li class="card-item">
                      <strong>3</strong>

                      <ion-icon name="bed-outline"></ion-icon>

                      <span>Bedrooms</span>
                    </li>
                    <a href="#" class="btn btn-primary">View Details</a> 

                  </ul>

                </div>

                <div class="card-footer">

                  <div class="card-author">

                   

                    <div>
                      <p class="author-name">
                        <a href="">William Seklo</a>
                      </p>

                      <p class="author-title">Hostel Manager</p>
                    </div>

                  </div>

                  <div class="card-footer-actions">

                    <button class="card-footer-actions-btn">
                      <ion-icon name="resize-outline"></ion-icon>
                    </button>

                    <button class="card-footer-actions-btn">
                      <ion-icon name="heart-outline"></ion-icon>
                    </button>

                    <button class="card-footer-actions-btn">
                      <ion-icon name="add-circle-outline"></ion-icon>
                    </button>

                  </div>

                </div>

              </div>
            </li>

            <li>
              <div class="property-card">

               

                <div class="card-content">

                  <div class="card-price">
                    <strong>Ksh34,900</strong>/Month
                  </div>

                  <h3 class="h3 card-title">
                    <a href="#">Luxury villa in Rego Park</a>
                  </h3>

                  <p class="card-text">
                    Beautiful Huge 1 Family House In Heart Of Westbury. Newly Renovated With New Wood
                  </p>

                  <ul class="card-list">

                    <li class="card-item">
                      <strong>3</strong>

                      <ion-icon name="bed-outline"></ion-icon>

                      <span>Bedrooms</span>
                    </li>
                    <a href="#" class="btn btn-primary">View Details</a> 
                   
                  </ul>

                </div>

                <div class="card-footer">

                  <div class="card-author">

                    <div>
                      <p class="author-name">
                        <a href="#">William Seklo</a>
                      </p>

                      <p class="author-title">Hostel Manager</p>
                    </div>

                  </div>

                  <div class="card-footer-actions">

                    <button class="card-footer-actions-btn">
                      <ion-icon name="resize-outline"></ion-icon>
                    </button>

                    <button class="card-footer-actions-btn">
                      <ion-icon name="heart-outline"></ion-icon>
                    </button>

                    <button class="card-footer-actions-btn">
                      <ion-icon name="add-circle-outline"></ion-icon>
                    </button>

                  </div>

                </div>

              </div>
            </li>

          </ul>

        </div>
  </section>


      <section class="cta">
        <div class="container">

          <div class="cta-card">
            <div class="card-content">
              <h2 class="h2 card-title">Looking for a dream home?</h2>

              <p class="card-text">We can help you realize your dream of a new home</p>
            </div>

            <button class="btn cta-btn">
              <span>Explore Properties</span>

              <ion-icon name="arrow-forward-outline"></ion-icon>
            </button>
          </div>

        </div>
      </section>

    </article>
  </main>


  <footer class="footer">

    <div class="footer-top">
      <div class="container">

        <div class="footer-brand">

          <a href="#" class="logo">
            <img src="<?php echo e(asset('images/logo.png')); ?>" alt="HostelConnect logo">
          </a>

          <p class="section-text">
           Connecting students to their ideal hostels
          </p>

          <ul class="contact-list">

            <li>
              <a href="#" class="contact-link">
                <ion-icon name="location-outline"></ion-icon>

                <address>West Madaraka, Nairobi,Kenya</address>
              </a>
            </li>

            <li>
              <a href="tel:+0123456789" class="contact-link">
                <ion-icon name="call-outline"></ion-icon>

                <span>+0123-456789</span>
              </a>
            </li>

            <li>
              <a href="mailto:#" class="contact-link">
                <ion-icon name="mail-outline"></ion-icon>

                <span>contact@hostelconnect.com</span>
              </a>
            </li>

          </ul>

          <ul class="social-list">

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-facebook"></ion-icon>
              </a>
            </li>

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-twitter"></ion-icon>
              </a>
            </li>

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-linkedin"></ion-icon>
              </a>
            </li>

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-youtube"></ion-icon>
              </a>
            </li>

          </ul>

        </div>

        

        <div class="footer-link-box">

        <ul class="footer-list">

            <li>
              <p class="footer-list-title">Services</p>
            </li>

            <li>
              <a href="#" class="footer-link">Order tracking</a>
            </li>

            <li>
              <a href="#" class="footer-link">Wish List</a>
            </li>

            <li>
              <a href="#" class="footer-link">Login</a>
            </li>

            <li>
              <a href="#" class="footer-link">My account</a>
            </li>

            <li>
              <a href="#" class="footer-link">Terms & Conditions</a>
            </li>

            <li>
              <a href="#" class="footer-link">Promotional Offers</a>
            </li>

          </ul>


          <ul class="footer-list">

            <li>
              <p class="footer-list-title">Customer Care</p>
            </li>

            <li>
              <a href="#" class="footer-link">Login</a>
            </li>

            <li>
              <a href="#" class="footer-link">My account</a>
            </li>

            <li>
              <a href="#" class="footer-link">Wish List</a>
            </li>

            <li>
              <a href="#" class="footer-link">Order tracking</a>
            </li>

            <li>
              <a href="#" class="footer-link">FAQ</a>
            </li>

            <li>
              <a href="#" class="footer-link">Contact us</a>
            </li>

          </ul>

        </div>

      </div>
    </div>

    <div class="footer-bottom">
      <div class="container">

        <p class="copyright">
          &copy; 2024 <a href="#">Cindy & Rehema</a>. All Rights Reserved
        </p>

      </div>
    </div>

  </footer>

  <script src="./assets/js/script.js"></script>
<script>
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
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>


<?php echo $__env->make('profile.profile-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\HostelConnect2.5\resources\views/home.blade.php ENDPATH**/ ?>