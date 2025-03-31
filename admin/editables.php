<?php

include('../server/connection.php');
if (!isset($_SESSION['admin_login_']) && $_SESSION['admin_login_'] != true) {
  echo "<script> window.location.href = 'login.php'</script>";
}


?>
<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed " dir="ltr" data-theme="theme-default" data-assets-path="assets/" data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>All Users</title>

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
              <span class="text-muted fw-light">Admin /</span> Users
            </h4>

            <!-- Basic Bootstrap Table -->
            <div class="card">
              <h5 class="card-header">All Registered users</h5>
              <div class="table-responsive text-nowrap">
                <table class="table">
                  <thead>
                    <tr>
                      <th>S/N</th>
                      <th>Fullname</th> 
                      <th>Email</th>
                      <th>Trading commission</th>
                      <th>Available balance</th>
                      <th>Trading balance</th>
                      <th>Pending investment</th>
                      <th>Referral balance</th>
                      <th>Referree</th>
                      <th>+ Available balance</th>
                      <th>+ Trading balance</th>
                      <th>+ Trading Commission</th>
                      <th>+ Pending investment</th>
                      <th>+ Promo won</th>
                      <th>Account warning</th>
                      <th>Account restriction</th>
                      <th>Total deposit</th>
                      <th>Total withdrawal</th>
                      <th>+ referral balance</th>
                      <th>+ referral</th>
                        
                      
                    </tr>
                  </thead>
                  <tbody class="table-border-bottom-0">
                    <?php
                    if(isset($_POST['add_available_bal'])){
  $id = $_POST['id'];
  $amount = $_POST['amount'];

  $sql = mysqli_query($connection,"UPDATE users set wallet = wallet + '$amount' where id = '$id'");
   if($sql){
    echo "<script> Swal.fire('Done','You have successfully added available balance of this user','success') 
    setTimeout(()=>{
         window.open('./editables.php','_self')
     },2000)
    </script>";
   }
}

if(isset($_POST['add_trading_bal'])){
  $id = $_POST['id'];
  $amount = $_POST['amount'];

  $sql = mysqli_query($connection,"UPDATE users set gain_wallet = gain_wallet + '$amount' where id = '$id'");
   if($sql){
    echo "<script> Swal.fire('Done','You have successfully added trading balance of this user','success')
    setTimeout(()=>{
         window.open('./editables.php','_self')
     },2000)
    </script>";
   }
}
if(isset($_POST['total_deposit'])){
  $id = $_POST['id'];
  $amount = $_POST['amount'];

  $sql = mysqli_query($connection,"UPDATE users set total_deposit = total_deposit + '$amount' where id = '$id'");
   if($sql){
    echo "<script> Swal.fire('Done','You have successfully added total deposit of this user','success')
    setTimeout(()=>{
         window.open('./editables.php','_self')
     },2000)
    </script>";
   }
}
if(isset($_POST['total_withdrawal'])){
  $id = $_POST['id'];
  $amount = $_POST['amount'];

  $sql = mysqli_query($connection,"UPDATE users set total_withdrawal = total_withdrawal + '$amount' where id = '$id'");
   if($sql){
    echo "<script> Swal.fire('Done','You have successfully added total withdrawal of this user','success') 
    setTimeout(()=>{
         window.open('./editables.php','_self')
     },2000)
    </script>";
    
   }
}

if(isset($_POST['ref_balance'])){
  $id = $_POST['id'];
  $amount = $_POST['amount'];

  $sql = mysqli_query($connection,"UPDATE users set referral_balance = referral_balance + '$amount' where id = '$id'");
   if($sql){
    echo "<script> Swal.fire('Done','You have successfully added referral balance of this user','success')
    setTimeout(()=>{
         window.open('./editables.php','_self')
     },2000) </script>";
   }
}
if(isset($_POST['referral'])){
  $id = $_POST['id'];
  $amount = $_POST['amount'];

  $sql = mysqli_query($connection,"UPDATE users set referral = referral + '$amount' where id = '$id'");
   if($sql){
    echo "<script> Swal.fire('Done','You have successfully added no of referral of this user','success')
    setTimeout(()=>{
         window.open('./editables.php','_self')
     },2000)
    </script>";
   }
}
if(isset($_POST['add_commission'])){
  $id = $_POST['id'];
  $amount = $_POST['amount'];

  $sql = mysqli_query($connection,"UPDATE users set trading_commission = trading_commission + '$amount' where id = '$id'");
   if($sql){
    echo "<script> Swal.fire('Done','You have successfully added trading commission of this user','success')
    setTimeout(()=>{
         window.open('./editables.php','_self')
     },2000)
    </script>";
   }
}

if(isset($_POST['pend_investment'])){
  $id = $_POST['id'];
  $amount = $_POST['amount'];

  $sql = mysqli_query($connection,"UPDATE users set pending_investment = pending_investment + '$amount' where id = '$id'");
   if($sql){
    echo "<script> Swal.fire('Done','You have successfully pended some investment for this user','success')
    setTimeout(()=>{
         window.open('./editables.php','_self')
     },2000)
    </script>";
   }
}

if(isset($_POST['promo_won'])){
  $id = $_POST['id'];
  $amount = $_POST['amount'];

  $sql = mysqli_query($connection,"UPDATE users set promo_won = promo_won + '$amount' where id = '$id'");
   if($sql){
    echo "<script> Swal.fire
    setTimeout(()=>{
         window.open('./editables.php','_self')
     },2000)
    </script>";
   }
}

if(isset($_POST['add_warning'])){
  $id = $_POST['id'];

  $sql = mysqli_query($connection,"UPDATE users set account_warning = 'yes' where id = '$id'");
  if($sql){
    echo "<script> Swal.fire('Done','You have successfully added account warning to this user,','success')
    setTimeout(()=>{
         window.open('./editables.php','_self')
     },2000)
    </script>";
  }
}

if(isset($_POST['remove_warning'])){
  $id = $_POST['id'];

  $sql = mysqli_query($connection,"UPDATE users set account_warning = 'no' where id = '$id'");
  if($sql){
    echo "<script> Swal.fire('Done','You have successfully removed account warning to this user','success') </script>";
  }
}

if(isset($_POST['restrict'])){
    $id = $_POST['id'];

    $sql = "UPDATE users set restriction = 'yes' where id = '$id'";
    $exe = mysqli_query($connection,$sql);
    if($exe){
        echo "<script> Swal.fire('Done','You have successfully restricted this account from withdrawing','success')
        setTimeout(()=>{
         window.open('./editables.php','_self')
     },2000)
        </script>";
    }
}
if(isset($_POST['unrestrict'])){
    $id = $_POST['id'];

    $sql1 = "UPDATE users set restriction = 'no' where id = '$id'";
    $exe1 = mysqli_query($connection,$sql1);
    if($exe1){
        echo "<script> Swal.fire('Done','You have successfully removed restriction from this account, and the user can start withdrawing','success') </script>";
    }
}
if(isset($_POST['add_promo'])){
    $id = $_POST['id'];

    $sql = "UPDATE users set promo_won = 'yes' where id = '$id'";
    $exe = mysqli_query($connection,$sql);
    if($exe){
        echo "<script> Swal.fire('Done','You have successfully added Promo for this user','success') </script>";
    }else{
      mysqli_error($conn);
    }
}
if(isset($_POST['remove_promo'])){
    $id = $_POST['id'];

    $sql1 = "UPDATE users set promo_won = 'no' where id = '$id'";
    $exe1 = mysqli_query($connection,$sql1);
    if($exe1){
        echo "<script> Swal.fire('Done','You have successfully removed Promo for this user','success') </script>";
    }
}
                    

                    
                    $sql = mysqli_query($connection, "SELECT * FROM `users`");
                    if (mysqli_num_rows($sql)) {
                      $count = 1;
                      while ($details = mysqli_fetch_assoc($sql)) {
                        $id = $details['id'];
                    ?>
                        <tr>
                          <td><?php echo $count ?></td>
                          <td><?php echo $details['name']?></td> 
                          <td><?php echo $details['email']?></td>
                          <td>$<?php echo $details['trading_commission']?></td>
                          <td>$<?php echo $details['wallet']?></td>
                          <td>$<?php echo $details['gain_wallet']?></td>
                          <td>$<?php echo $details['pending_investment']?></td>
                          <td>$<?php echo $details['referral_balance']?></td>
                          <td><?php echo $details['referree']?></td>
                          <td>
                            <form method="post">
                              <label><?php echo $details['email'] ?></label><br>
                              <input type="hidden" name="id" value="<?php echo $id ?>">
                              <input type="number" name="amount" placeholder="Amount for avalaible balance*" required><br>
                              <button class="btn btn-primary btn-sm" name="add_available_bal">Add</button>
                            </form>
                          </td>
                          <td>
                            <form method="post">
                              <label><?php echo $details['email'] ?></label><br>
                              <input type="hidden" name="id" value="<?php echo $id ?>">
                              <input type="number" name="amount" placeholder="Amount for trading balance*" required><br>
                              <button class="btn btn-success btn-sm" name="add_trading_bal">Add</button>
                            </form>
                          </td>
                          <td>
                            <form method="post">
                              <label><?php echo $details['email'] ?></label><br>
                              <input type="hidden" name="id" value="<?php echo $id ?>">
                              <input type="number" name="amount" placeholder="Amount trading commission*" required><br>
                              <button class="btn btn-info btn-sm" name="add_commission">Add</button>
                            </form>
                          </td>
                          <td>
                            <form method="post">
                              <label><?php echo $details['email'] ?></label><br>
                              <input type="hidden" name="id" value="<?php echo $id ?>">
                              <input type="number" name="amount" placeholder="Amount to pend*" required><br>
                              <button class="btn btn-dark btn-sm" name="pend_investment">pend</button>
                            </form>
                          </td>
                          <td>
                        <form method="post">
                          <label><?php echo $details['email'] ?></label><br>
                            <input type="hidden" name="id" value="<?php echo $id ?>">
                            <?php if($details['promo_won'] == 'yes'){?>
                                <button class="btn btn-danger" name="remove_promo">Remove promo</button>
                            <?php }else{ ?>
                                <button class="btn btn-success" name="add_promo">Add promo</button>
                            <?php } ?>
                        </form>
                    </td>
                          <td>
                        <form method="post">
                          <label><?php echo $details['email'] ?></label><br>
                            <input type="hidden" name="id" value="<?php echo $id ?>">
                            <?php if($details['account_warning'] == 'yes'){?>
                                <button class="btn btn-primary" name="remove_warning">Remove warning</button>
                            <?php }else{ ?>
                                <button class="btn btn-warning" name="add_warning">Add warning</button>
                            <?php } ?>
                        </form>
                    </td>
                    <td>
                        <form method="post">
                          <label><?php echo $details['email'] ?></b></label><br>
                            <input type="hidden" name="id" value="<?php echo $id ?>">
                            <?php if($details['restriction'] == 'yes'){?>
                                <button class="btn btn-primary" name="unrestrict">Unrestrict</button>
                            <?php }else{ ?>
                                <button class="btn btn-danger" name="restrict">restrict</button>
                            <?php } ?>
                        </form>
                    </td>
                    <td>
                            <form method="post">
                              <label><?php echo $details['email'] ?></label><br>
                              <label>Current balance: $<?php echo number_format($details['total_deposit']) ?></label><br>
                              <input type="hidden" name="id" value="<?php echo $id ?>">
                              <input type="number" name="amount" placeholder="Amount total deposit*" required><br>
                              <button class="btn btn-info btn-sm" name="total_deposit">Add</button>
                            </form>
                          </td>
                          <td>
                            <form method="post">
                              <label><?php echo $details['email'] ?></label><br>
                              <label>Current balance: $<?php echo number_format($details['total_withdrawal']) ?></label><br>
                              <input type="hidden" name="id" value="<?php echo $id ?>">
                              <input type="number" name="amount" placeholder="Amount total withdrawal*" required><br>
                              <button class="btn btn-success btn-sm" name="total_withdrawal">Add</button>
                            </form>
                          </td>
                          <td>
                            <form method="post">
                              <label><?php echo $details['email'] ?></label><br>
                              <label>Current balance: $<?php echo number_format($details['referral_balance']) ?></label><br>
                              <input type="hidden" name="id" value="<?php echo $id ?>">
                              <input type="number" name="amount" placeholder="Amount referral balance*" required><br>
                              <button class="btn btn-success btn-sm" name="ref_balance">Add</button>
                            </form>
                          </td>
                          <td>
                            <form method="post">
                              <label><?php echo $details['email'] ?></label><br>
                              <label>Current referral: $<?php echo $details['referral'] ?></label><br>
                              <input type="hidden" name="id" value="<?php echo $id ?>">
                              <input type="number" name="amount" placeholder="Amount referral*" required><br>
                              <button class="btn btn-success btn-sm" name="referral">Add</button>
                            </form>
                          </td>
                          
                        </tr>
                    <?php $count++;
                      }
                    } else {
                      echo "<td class='bg-danger text-white' colspan='10'>No Users</td>";
                    } ?>
                  </tbody>
                </table>
              </div>
            </div>
            <!--/ Basic Bootstrap Table -->
          </div>
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