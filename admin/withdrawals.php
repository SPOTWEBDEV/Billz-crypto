<?php


include('../server/connection.php');
include('../mailer/index.php');
if (!isset($_SESSION['admin_login_']) && $_SESSION['admin_login_'] != true) {
  echo "<script> window.location.href = 'login.php'</script>";
}






?>
<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed " dir="ltr" data-theme="theme-default" data-assets-path="assets/" data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Withdrawals</title>

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
              <span class="text-muted fw-light">Admin /</span> Withdrawals
            </h4>

            <!-- Basic Bootstrap Table -->
            <div class="card">
              <h5 class="card-header">All Withdrawals</h5>
              <div class="table-responsive text-nowrap">
                <table class="table">
                  <thead>
                    <tr>
                      <th>S/N</th>
                      <th>Account Owner</th>
                      <th>Amount</th>
                      <th>Method (Channel)</th>
                      <th>Address</th>
                      <th>Date</th>
                      <th>Stauts</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody class="table-border-bottom-0">
                    <?php
                    // working on the DECLINE TRANSACTION
                    if (isset($_GET['decl'])) {
                      $trf_id = $_GET['trf_id'];
                      $sender = $_GET['sender'];
                      $trf_amount = $_GET['trf_amount'];
                      $decline = mysqli_query($connection, "UPDATE `withdrawals` SET `status` = 2 WHERE `id` = '$trf_id'");
                      $r_info_row = mysqli_query($connection, "SELECT * FROM `users` WHERE `id` = '$sender'");
                      $r_rows = mysqli_fetch_assoc($r_info_row);

                      $sql = mysqli_query($connection, "UPDATE users set wallet = wallet + $trf_amount where id = '$sender'");
                      if ($decline) {
                        echo "<script> Swal.fire('Great Job','TRANSACTION DECLINED','success') </script>";
                        $email = $r_rows['email'];

                        $name = $r_rows['user'];


                        $body = "
                        <html>
                        <body style='margin: 0; padding: 0; font-family: Roboto, sans-serif; background: #131722;'>
                        <section style='width: 100%; background-color: #f1f2f3; color: #333;'>
                        <div style='width: 100%; max-width: 600px; margin: 0 auto;'>
                        <div style='padding: 20px; background-color: #131722; text-align: center;'>
                        <img src='https://ravenassetlimited.com/assets/RALblack.png' alt='$sitename ' style='height: 80px; width: auto; max-width: 100%; margin-bottom: 20px;'>
                        <h2 style='color: #fff; font-size: 24px;'>Welcome aboard, $name!</h2>
                        </div>
                        <div style='padding: 20px; background: #fff; border-radius: 0 0 8px 8px;'>
                        <p>Dear $name,</p>
                        <p>We are pleased to inform you that your withdrawal request of $$trf_amount has been thoroughly reviewed and declined. Should you have any further inquiries or require assistance, please do not hesitate to contact our support team.</p>
                        <p>Thank you for joining $sitename , your gateway to seamless forex exchange trading. We are delighted to have you as part of our community.</p>
                        <p>For any inquiries or assistance, feel free to reach out to our support team at <a href='mailto:$siteemail'>$siteemail</a>.</p>
                        <p>Welcome once again to $sitename !</p>
                        <p>Best regards,</p>
                        <p>The $sitename  Team</p>
                        </div>
                        <div style='text-align: center; color: #666; margin-top: 20px; font-size: 12px;'>
                        &copy; 2020 $sitename . All rights reserved.
                        </div>
                        </div>
                        </section>
                        </body>
                        </html>";

                        $to = $email;
                        $from = '$siteemail';
                        $from_name = '$sitename ';
                        $subj = 'Withdrawal Declined';
                        $result = smtpmailer($to, $siteemail, $sitename, $subj, $body);;

                       
                          echo "<script>setTimeout( ()=> {window.open('withdrawals.php','_self')}, 2000)</script>";
                        
                      } else {
                        echo "<script> Swal.fire('Error','COULD NOT DECLINED','error') </script>";
                      }
                    }

                    // working on the APPROVE TRANSACTION
                    if (isset($_GET['aprv'])) {
                      $trf_id = $_GET['trf_id'];
                      $sender = $_GET['sender'];
                      $trf_amount = $_GET['trf_amount'];
                      $from_account = $_GET['from_account'];
                      $method = $_GET['method'];
                      $wallet_addr = $_GET['wallet_addr'];

                      // $sql = mysqli_query($connection, "SELECT * FROM `clients` WHERE `id` = '$sender'");
                      // $dets = mysqli_fetch_assoc($sql);


                      $approve = mysqli_query($connection, "UPDATE `withdrawals` SET `status` = 1 WHERE `id` = '$trf_id'");

                      $sql = mysqli_query($connection, "UPDATE users set total_withdrawal = total_withdrawal + '$trf_amount' where id = '$sender'");

                      if ($approve) {
                        // EXTRA AUTO DEBIT AND CREDIT
                        $r_info_row = mysqli_query($connection, "SELECT * FROM `users` WHERE `id` = '$sender'");
                        $r_rows = mysqli_fetch_assoc($r_info_row);
                        $update_r_bal = '';
                        if ($from_account == '1') {
                          $r_bal = $r_rows['wallet'];
                          $r_new_balance = $r_bal - $r_amount;
                          $update_r_bal = mysqli_query($connection, "UPDATE `users` SET `wallet` = '$r_new_balance' WHERE `id` = '$sender'");
                        } else if ($from_account == '2') {
                          $r_bal = $r_rows['gain_wallet'];
                          $r_new_balance = $r_bal - $trf_amount;
                          $update_r_bal = mysqli_query($connection, "UPDATE `users` SET `gain_wallet` = '$r_new_balance' WHERE `id` = '$sender'");
                        } else if ($from_account == '3') {
                          $r_bal = $r_rows['ref_wallet'];
                          $r_new_balance = $r_bal - $r_amount;
                          $update_r_bal = mysqli_query($connection, "UPDATE `users` SET `ref_wallet` = '$r_new_balance' WHERE `id` = '$sender'");
                        }

                        if ($update_r_bal) {


                          $email = $r_rows['email'];
                          $name = $r_rows['user'];

                          $body = "
                                                        <html>
                                                        <body style='margin: 0; padding: 0; font-family: Roboto, sans-serif; background: #131722;'>
                                                        <section style='width: 100%; background-color: #f1f2f3; color: #333;'>
                                                        <div style='width: 100%; max-width: 600px; margin: 0 auto;'>
                                                        <div style='padding: 20px; background-color: #131722; text-align: center;'>
                                                        <img src='https://ravenassetlimited.com/assets/RALblack.png' alt='$sitename ' style='height: 80px; width: auto; max-width: 100%; margin-bottom: 20px;'>
                                                        <h2 style='color: #fff; font-size: 24px;'>Welcome aboard, $name!</h2>
                                                        </div>
                                                        <div style='padding: 20px; background: #fff; border-radius: 0 0 8px 8px;'>
                                                        <p>Dear $name,</p>
                                                        <p> We are pleased to inform you that your withdrawal request has been thoroughly
                                                                                            reviewed and approved. As a result, we have credited your wallet, <b>$method</b> with the requested
                                                                                            amount of <b>$$trf_amount</b>. We appreciate your patience throughout the review process and thank you for 
                                                                                            choosing our services. Should you have any further inquiries or require assistance, please 
                                                                                            do not hesitate to contact our support team.</p>
                                                        <p>Best regards,</p>
                                                        <p>The $sitename  Team</p>
                                                        </div>
                                                        <div style='text-align: center; color: #666; margin-top: 20px; font-size: 12px;'>
                                                        &copy; 2020 $sitename . All rights reserved.
                                                        </div>
                                                        </div>
                                                        </section>
                                                        </body>
                                                        </html>";

                          $to = $email;
                          $subj = 'Approval Withdrawal';
                          $result = smtpmailer($to, $siteemail, $sitename, $subj, $body);;




                          
                            echo "<script>Swal.fire('Great Job','TRANSACTION APPROVED','success')</script>";
                            // Additional logic or redirect if needed
                            echo "<script>setTimeout( ()=> {window.open('withdrawals.php','_self')}, 2000)</script>";
                          
                        } else {
                          echo "<script>Swal.fire('Error','FAILED TO APPROVE','error')</script>";
                        }
                      } else {
                        echo "<script>Swal.fire('Error','COULDNT UPDATE','error')</script>";
                      }
                    }

                    $sql = mysqli_query($connection, "SELECT * FROM `withdrawals` where status = 0");
                    if (mysqli_num_rows($sql)) {
                      $count = 1;
                      while ($details = mysqli_fetch_assoc($sql)) {
                    ?>
                        <tr>
                          <td><?php echo $count ?></td>
                          <td><?php echo $details['email'] ?></td>
                          <td>$<?php echo $details['amount'] ?></td>
                          <td><?php echo $details['method'] ?></td>
                          <td><?php echo $details['wallet_addr'] ?></td>

                          <td><?php echo $details['date_withdrawn'] ?></td>
                          <td>
                            <?php
                            if ($details['status'] == 0) {
                              echo "<span class=\"badge bg-label-primary me-1\">PENDING</span>";
                            } else if ($details['status'] == 1) {
                              echo "<span class=\"badge bg-label-success me-1\">APPROVED</span>";
                            } else {
                              echo "<span class=\"badge bg-label-warning me-1\">DECLINED</span>";
                            }
                            ?>
                          </td>
                          <td>
                            <div class="dropdown">
                              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                              <div class="dropdown-menu">
                                <?php if ($details['status'] == 0) { ?>
                                  <a onclick="return confirm('sure to decline')" class="dropdown-item" href="<?php echo $_SERVER['PHP_SELF'] ?>?trf_id=<?php echo $details['id'] ?>&sender=<?php echo $details['user_id'] ?>&trf_amount=<?php echo $details['amount'] ?>&decl"><i class="bx bx-cog me-1"></i> DECLINE</a>
                                  <a onclick="return confirm('sure to approve')" class="dropdown-item" href="<?php echo $_SERVER['PHP_SELF'] ?>?trf_id=<?php echo $details['id'] ?>&trf_amount=<?php echo $details['amount'] ?>&method=<?php echo $details['method'] ?>&wallet_addr=<?php echo $details['wallet_addr'] ?>&sender=<?php echo $details['user_id'] ?>&from_account=<?php echo $details['from_wallet'] ?>&aprv"><i class="bx bx-cog me-1"></i> APPROVE</a>
                                <?php } ?>
                              </div>
                            </div>
                          </td>
                        </tr>
                    <?php $count++;
                      }
                    } else {
                      ?> <p style="color:red">Table is empty</p> <?php
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