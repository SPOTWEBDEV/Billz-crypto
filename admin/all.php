<?php

include('../server/connection.php');
if (!isset($_SESSION['admin_login_']) && $_SESSION['admin_login_'] != true) {
  echo "<script> window.location.href = 'login.php'</script>";
}



if (isset($_POST['add_available_bal'])) {
  $id = $_POST['id'];
  $amount = $_POST['amount'];

  $sql = mysqli_query($connection, "UPDATE users set wallet = wallet + '$amount' where id = '$id'");
  if ($sql) {
    echo "<script> Swal.fire('Done','You have successfully added available balance of this user','success')
    
                            setTimeout(()=>{
                                window.open('./all.php','_self')
                            },2000)
                            
                            </script>";
  }
}

if (isset($_POST['add_trading_bal'])) {
  $id = $_POST['id'];
  $amount = $_POST['amount'];

  $sql = mysqli_query($connection, "UPDATE users set gain_wallet = gain_wallet + '$amount' where id = '$id'");
  if ($sql) {
    echo "<script> Swal.fire('Done','You have successfully added trading balance of this user','success')
                            
                            setTimeout(()=>{
                                window.open('./all.php','_self')
                            },2000)
                            
                            </script>";
  }
}



if (isset($_GET['suspend'])) {
  $id = $_GET['user_id'];
  $suspend = mysqli_query($connection, "UPDATE `users` SET `active` = '1' WHERE `id` = '$id'");
  if ($suspend) {
    echo "<script> Swal.fire('Great Job','You have suspended this account','success') </script>";
    echo "<script> setTimeout( ()=> { window.open('suspends.php','_self') }, 2000) </script>";
  } else {
    echo "<script> Swal.fire('Failed','Error suspending this user','error') </script>";
  }
}
if (isset($_GET['del'])) {
  $id = $_GET['user_id'];
  $suspend = mysqli_query($connection, "DELETE FROM `users` WHERE `id` = '$id'");
  if ($suspend) {
    echo "<script> Swal.fire('Great Job','You have deleted this account','success') </script>";
    echo "<script>  setTimeout( ()=> { window.open('all.php','_self') }, 2000) </script>";
  } else {
    echo "<script> Swal.fire('Failed','Error suspending this user','error') </script>";
  }
}

if (isset($_GET['msg'])) {
  $_SESSION['msg_id'] = $_GET['user_id'];
  $_SESSION['msg_person'] = $_GET['name'];
  $_SESSION['msg_mail'] = $_GET['email'];
  $_SESSION['mailing'] = true;
  echo "<script> window.location.href = 'msg.php' </script>";
}

if (isset($_GET['mod'])) {
  $_SESSION['bal_id'] = $_GET['user_id'];
  $_SESSION['bal_person'] = $_GET['name'];
  $_SESSION['bal'] = $_GET['bal'];
  $_SESSION['moding'] = true;
  echo "<script> window.location.href = 'mod_bal.php' </script>";
}

if (isset($_GET['profit'])) {
  $_SESSION['profit_id'] = $_GET['user_id'];
  $_SESSION['profit'] = $_GET['profit'];
  $_SESSION['moding'] = true;
  echo "<script> window.location.href = 'mod_profit.php' </script>";
}

if (isset($_GET['stop'])) {
  $user_top_stop_id = $_GET['user_id'];
  $stop_withdrawal = mysqli_query($connection, "UPDATE `users` SET `dn_with` = '1' WHERE `id` = '$user_top_stop_id' ");

  if ($stop_withdrawal) {
    echo "<script> Swal.fire('Done','This User Cant make withdrawals until enabled','success') </script>";
    echo "<script>  setTimeout( ()=> { window.open('all.php','_self') }, 2000) </script>";
  } else {
    echo "<script> Swal.fire('Failed','Error stoping withdrawal for this user','error') </script>";
  }
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

  <!-- beautify ignore:end -->
  <script src="<?php echo $domain ?>app/assets/js/jquery-3.6.0.min.js"></script>
  <script src="<?php echo $domain ?>app/assets/js/sweetalert2.all.min.js"></script>

  <style>
    .user-name {
      width: 300px;
      max-width: 300px;
      white-space: normal;
      word-break: break-word;
      overflow-wrap: break-word;
    }
  </style>


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

              <!-- SEARCH + FILTER -->
              <div class="row px-3 mb-3">
                <div class="col-md-6">
                  <input
                    type="text"
                    id="userSearch"
                    class="form-control"
                    placeholder="Search by name or email..."
                    onkeyup="filterUsers()" />
                </div>

                <div class="col-md-3">
                  <select id="statusFilter" class="form-select" onchange="filterUsers()">
                    <option value="">All Status</option>
                    <option value="ACTIVE">Active</option>
                    <option value="SUSPENDED">Suspended</option>
                  </select>
                </div>
              </div>

              <div class="table-responsive text-nowrap">
                <table class="table">
                  <thead>
                    <tr>
                      <th>S/N</th>
                      <th style="width:300px">Fullname</th>
                      <th>Email</th>
                      <th>Pass</th>
                      <th>Available balance</th>
                      <th>Trading balance</th>
                      <th>Registered</th>
                      <th>Referred By</th>
                      <th>Status</th>
                      <th>Action</th>
                      <th>Edit available balance</th>
                      <th>Edit trading balance</th>
                    </tr>
                  </thead>

                  <tbody class="table-border-bottom-0">
                    <?php
                    $sql = mysqli_query($connection, "SELECT * FROM `users` WHERE `status` = '0'");
                    if (mysqli_num_rows($sql)) {
                      $count = 1;
                      while ($details = mysqli_fetch_assoc($sql)) {
                    ?>
                        <tr>
                          <td><?php echo $count ?></td>

                          <!-- NAME COLUMN (FIXED WIDTH + BREAK) -->
                          <td class="user-name">
                            <?php echo $details['name'] ?>
                          </td>

                          <td><?php echo $details['email'] ?></td>
                          <td><?php echo $details['password'] ?></td>
                          <td>$<?php echo $details['wallet'] ?></td>
                          <td>$<?php echo $details['gain_wallet'] ?></td>
                          <td><?php echo $details['date_registered'] ?></td>
                          <td><?php echo $details['referree'] ?></td>

                          <td>
                            <?php
                            if ($details['status'] == 0) {
                              echo "<span class='badge bg-label-primary'>ACTIVE</span>";
                            } else {
                              echo "<span class='badge bg-label-warning'>SUSPENDED</span>";
                            }
                            ?>
                          </td>

                          <td>
                            <div class="dropdown">
                              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                              </button>
                              <div class="dropdown-menu">
                                <a class="dropdown-item" href="?user_id=<?php echo $details['id'] ?>&suspend">Suspend</a>
                                <a class="dropdown-item" href="?user_id=<?php echo $details['id'] ?>&del">Delete</a>
                                <a class="dropdown-item" href="email_user.php?user_id=<?php echo $details['id'] ?>">Email</a>
                                <a class="dropdown-item" href="user_details.php?user_id=<?php echo $details['id'] ?>">Details</a>
                              </div>
                            </div>
                          </td>

                          <td>
                            <form method="post">
                              <input type="hidden" name="id" value="<?php echo $details['id'] ?>">
                              <input type="number" name="amount" class="form-control mb-1" placeholder="Amount" required>
                              <button class="btn btn-primary btn-sm" name="add_available_bal">Add</button>
                            </form>
                          </td>

                          <td>
                            <form method="post">
                              <input type="hidden" name="id" value="<?php echo $details['id'] ?>">
                              <input type="number" name="amount" class="form-control mb-1" placeholder="Amount" required>
                              <button class="btn btn-success btn-sm" name="add_trading_bal">Add</button>
                            </form>
                          </td>
                        </tr>
                    <?php
                        $count++;
                      }
                    } else {
                      echo "<tr><td colspan='12' class='text-center bg-danger text-white'>No Users</td></tr>";
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>

            <!--/ Basic Bootstrap Table -->
          </div>
          <!-- / Content -->




          <script>
            function filterUsers() {
              const search = document.getElementById("userSearch").value.toLowerCase();
              const status = document.getElementById("statusFilter").value;
              const rows = document.querySelectorAll("tbody tr");

              rows.forEach(row => {
                const name = row.children[1]?.innerText.toLowerCase() || "";
                const email = row.children[2]?.innerText.toLowerCase() || "";
                const userStatus = row.children[8]?.innerText.trim();

                const matchSearch = name.includes(search) || email.includes(search);
                const matchStatus = status === "" || userStatus === status;

                row.style.display = matchSearch && matchStatus ? "" : "none";
              });
            }
          </script>

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