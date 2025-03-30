<?php

include('../server/connection.php');

if (!isset($_SESSION['admin_login_']) && $_SESSION['admin_login_'] != true) echo "<script> window.location.href = 'login.php' </script>"; 
?>
<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed " dir="ltr" data-theme="theme-default" data-assets-path="assets/" data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Create A Users</title>
 
  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="assets/img/favicon/favicon.ico" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Icons. Uncomment required icon fonts -->
  <link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />



  <!-- Core CSS -->
  <link rel="stylesheet" href="assets/vendor/css/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="assets/css/demo.css" />

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />



  <!-- Page CSS -->

  <!-- Helpers -->
  <script src="assets/vendor/js/helpers.js"></script>

  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="assets/js/config.js"></script>

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async="async" src="https://www.googletagmanager.com/gtag/js?id=GA_MEASUREMENT_ID"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'GA_MEASUREMENT_ID');
  </script>
  <!-- Custom notification for demo -->
  <!-- beautify ignore:end -->
   <script src="<?php echo $domain ?>app/assets/js/jquery-3.6.0.min.js"></script>
     <script src="<?php echo $domain ?>app/assets/js/sweetalert2.all.min.js"></script>

</head>

<body>

  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar  ">
    <div class="layout-container">

      <!-- Menu -->
      <?php include('includes/side_bar.php') ?>
      <!-- / Menu -->

      <!-- Layout container -->
      <div class="layout-page">

        <!-- Navbar -->

        <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">

          <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0   d-xl-none ">
            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
              <i class="bx bx-menu bx-sm"></i>
            </a>
          </div>


          <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

            <!-- Search -->
            <div class="navbar-nav align-items-center">
              <div class="nav-item d-flex align-items-center">
                <i class="bx bx-search fs-4 lh-0"></i>
                <input type="text" class="form-control border-0 shadow-none" placeholder="Search..." aria-label="Search...">
              </div>
            </div>
            <!-- /Search -->


            <ul class="navbar-nav flex-row align-items-center ms-auto">



              <!-- Place this tag where you want the button to render. -->
              <li class="nav-item lh-1 me-3">
                <a class="github-button" href="https://github.com/themeselection/sneat-html-admin-template-free" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star themeselection/sneat-html-admin-template-free on GitHub">Star</a>
              </li>



              <!-- User -->
              <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                  <div class="avatar avatar-online">
                    <img src="assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle">
                  </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li>
                    <a class="dropdown-item" href="#">
                      <div class="d-flex">
                        <div class="flex-shrink-0 me-3">
                          <div class="avatar avatar-online">
                            <img src="assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle">
                          </div>
                        </div>
                        <div class="flex-grow-1">
                          <span class="fw-semibold d-block">John Doe</span>
                          <small class="text-muted">Admin</small>
                        </div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <div class="dropdown-divider"></div>
                  </li>
                  <li>
                    <a class="dropdown-item" href="#">
                      <i class="bx bx-user me-2"></i>
                      <span class="align-middle">My Profile</span>
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="#">
                      <i class="bx bx-cog me-2"></i>
                      <span class="align-middle">Settings</span>
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="#">
                      <span class="d-flex align-items-center align-middle">
                        <i class="flex-shrink-0 bx bx-credit-card me-2"></i>
                        <span class="flex-grow-1 align-middle">Billing</span>
                        <span class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">4</span>
                      </span>
                    </a>
                  </li>
                  <li>
                    <div class="dropdown-divider"></div>
                  </li>
                  <li>
                    <a class="dropdown-item" href="auth-login-basic.html">
                      <i class="bx bx-power-off me-2"></i>
                      <span class="align-middle">Log Out</span>
                    </a>
                  </li>
                </ul>
              </li>
              <!--/ User -->


            </ul>
          </div>



        </nav>

        <!-- / Navbar -->


        <!-- Content wrapper -->
        <div class="content-wrapper">

          <!-- Content -->

          <div class="container-xxl flex-grow-1 container-p-y">

            <h4 class="fw-bold py-3 mb-4">
              <span class="text-muted fw-light">Admin /</span> Add User
            </h4>

            <!-- Basic Layout -->
            <div class="row">
              <div class="col-xl">
                <div class="card mb-4">
                  <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">User Creation</h5> <small class="text-muted float-end"></small>
                  </div>
                  <div class="card-body">
                    <?php
                      if (isset($_POST['createUser'])) {
                        $user = mysqli_real_escape_string($connection, $_POST['user']);
                        $name = mysqli_real_escape_string($connection, $_POST['name']);
                        $email = mysqli_real_escape_string($connection, $_POST['email']); 
                        $country = mysqli_real_escape_string($connection, $_POST['country']);
                        $pass = mysqli_real_escape_string($connection, $_POST['pass']); 
                        $ref = mysqli_real_escape_string($connection, $_POST['ref']);
                        $ref_id = rand();
                        $registered = date('Y-m-d H:i:s');
                
                        $checkUser = mysqli_query($connection, "SELECT * FROM `users` WHERE  `email` = '$email' AND `password` = '$pass'");
                        if (!mysqli_num_rows($checkUser) > 0) {
                            if (!empty($user)&& !empty($name) && !empty($email) && !empty($country) && !empty($pass)) {
                                $createUser = mysqli_query($connection, "INSERT INTO `users`(`id`, `user`, `name`, `email`, `phone`, `profile_image`, `password`, `country`, `wallet`, `ref_wallet`, `gain_wallet`, `ref_id`, `referree`, `date_registered`, `paid_ref`,`dn_with`, `status`) 
                                                                                 VALUES ('','$user','$name','$email','$phone','--','$pass','$country','0','0','0','$ref_id','$ref','$registered','0','0','0')");
                                if ($createUser) {
                                    echo "<script>Swal.fire('Account Created','Your Account has been created successfully','success')</script>";
                                    echo "<script>setTimeout( ()=> { window.location.href = 'all.php' }, 1000)</script>";
                                } else {
                                    echo "<script>Swal.fire('Account Error','Error Creating account','error')</script>";
                                    echo "<script>setTimeout( ()=> { window.location.href = 'add-user.php' }, 1000)</script>";
                                }
                            } else { 
                                echo "<script>Swal.fire('Input Error','Some of your inputs are empty','error')</script>";
                                echo "<script>setTimeout( ()=> { window.location.href = 'add-user.php' }, 1000)</script>";
                            }
                        } else {
                            echo "<script>Swal.fire('Details Error','Details Error,'Details You Parsed Is Already In Use..!','error')</script>";
                            echo "<script>setTimeout( ()=> { window.location.href = 'add-user.php' }, 1000)</script>";
                        }
                      }
                    ?>
                    <form method="POST">
                      <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">User Name</label>
                        <input type="text" class="form-control" name="user" id="basic-default-fullname" placeholder="@Jasi"/>
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Full Name</label>
                        <input type="text" class="form-control" name="name" id="basic-default-fullname" placeholder="Jasmine kile"/>
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Country</label>
                        <input type="text" class="form-control" name="country" id="basic-default-fullname" placeholder="Napoli"/>
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Phone Number</label>
                        <input type="text" class="form-control" name="phone" id="basic-default-fullname" placeholder="+44 (657) 8765 6676"/>
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Email Address</label>
                        <input type="text" class="form-control" name="email" id="basic-default-fullname" placeholder="jasminekile@gmail.com"/>
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Password</label>
                        <input type="text" class="form-control" name="pass" id="basic-default-fullname" placeholder="**********"/>
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Referral ID</label>
                        <input type="text" class="form-control" name="ref_id" id="basic-default-fullname" placeholder="7683485935" />
                      </div>
                        
                      <!-- <div class="mb-3">
                        <label class="form-label" for="basic-default-company">Admin Security Pin</label>
                        <input type="password" class="form-control" name="ad_pin" id="basic-default-company" placeholder="Nobody" />
                      </div>   -->
                      <button type="submit" class="btn btn-primary" onclick="return confirm('Are you want to create this user, this action cannot be reverted once done >>> sure to proceed')" name="createUser">CREATE NEW USER</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Basic form end -->
          <!-- / Content -->




          <!-- Footer -->
          <!-- <footer class="content-footer footer bg-footer-theme">
            <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
              <div class="mb-2 mb-md-0">
                © <script>
                  document.write(new Date().getFullYear())
                </script>
                , made with ❤️ by <a href="https://themeselection.com" target="_blank" class="footer-link fw-bolder">ThemeSelection</a>
              </div>
              <div>

                <a href="https://themeselection.com/license/" class="footer-link me-4" target="_blank">License</a>
                <a href="https://themeselection.com/" target="_blank" class="footer-link me-4">More Themes</a>

                <a href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/" target="_blank" class="footer-link me-4">Documentation</a>

                <a href="https://github.com/themeselection/sneat-html-admin-template-free/issues" target="_blank" class="footer-link me-4">Support</a>


              </div>
            </div>
          </footer> -->
          <!-- / Footer -->
          <div class="content-backdrop fade"></div>
        </div>
        <!-- Content wrapper -->
      </div>
      <!-- / Layout page -->
    </div>



    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>


  </div>
  <!-- / Layout wrapper -->




  <!-- <div class="buy-now">
    <a href="https://themeselection.com/products/sneat-bootstrap-html-admin-template/" target="_blank" class="btn btn-danger btn-buy-now">Upgrade to Pro</a>
  </div> -->


  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->
  <script src="assets/vendor/libs/jquery/jquery.js"></script>
  <script src="assets/vendor/libs/popper/popper.js"></script>
  <script src="assets/vendor/js/bootstrap.js"></script>
  <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

  <script src="assets/vendor/js/menu.js"></script>
  <!-- endbuild -->

  <!-- Vendors JS -->



  <!-- Main JS -->
  <script src="assets/js/main.js"></script>

  <!-- Page JS -->



  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>

</body>

</html>