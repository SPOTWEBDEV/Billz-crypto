<?php

include('../server/connection.php');

if (!isset($_SESSION['admin_login_']) && $_SESSION['admin_login_'] != true) echo "<script> window.location.href = 'login.php' </script>";





?>









<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed " dir="ltr" data-theme="theme-default" data-assets-path="assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title><?php echo $sitename ?> || Add Payment</title>

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

    <?php



    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addExpert'])) {
        // Get form data
        $expert_name = $_POST['expert_name'];
        $return = $_POST['return'];
        $amount = $_POST['amount'];
        $max_drawdown = $_POST['max_drawdown'];
        $win_rates = $_POST['win_rates'];
        $trades = $_POST['trades'];
        $ratio = $_POST['ratio'];

        // Handle file upload
        
            $upload_dir = '../uploads/expert/'; // Specify the upload directory
            $image_name = $_FILES['expert_image']['name'];
            $image_tmp = $_FILES['expert_image']['tmp_name'];
            $image_path = $upload_dir . basename($image_name);

            // Move the uploaded image to the desired directory
            if (move_uploaded_file($image_tmp, $image_path)) {
                // Image uploaded successfully, now insert the data into the database


                $img_name = basename($image_name);

                

                // Insert query
                $stmt = mysqli_query($connection , "INSERT INTO expert (expert_name, expert_image, returns_profit, amount, max_drawdown, win_rates, trades, ratio) VALUES ('$expert_name', '$img_name', '$return', '$amount', '$max_drawdown', '$win_rates', '$trades', '$ratio') ");

                echo $stmt;

                echo mysqli_error($connection);

                if ($stmt) {
                    // Success: Show SweetAlert for success message
                    echo "<script>
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Expert added successfully!',
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                              </script>";
                } else {
                    // Error: Show SweetAlert for error message
                    echo "<script>
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'There was an error while adding the expert: ',
                                    showConfirmButton: true
                                });
                              </script>";
                }

               
            } else {
                // Image upload error: Show SweetAlert for image upload error
                echo "<script>
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Error uploading image.',
                                showConfirmButton: true
                            });
                          </script>";
            }
       
    }
    ?>







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
                            <span class="text-muted fw-light">Admin /</span> Add Expert
                        </h4>

                        <!-- Basic Layout -->
                        <div class="row">
                            <!-- Add Payment Account Form -->
                            <div class="col-xl">
                                <div class="card mb-4">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <!-- <h5 class="mb-0">Add Payment Account</h5> -->
                                    </div>
                                    <div class="card-body">

                                        <form method="POST" enctype="multipart/form-data">
                                            <div class="mb-3">
                                                <label class="form-label" for="expert_name">Expert Name</label>
                                                <input type="text" class="form-control" name="expert_name" id="expert_name" placeholder="Enter Expert Name" required />
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label" for="expert_image">Expert Image</label>
                                                <input type="file" class="form-control" name="expert_image" id="expert_image" required />

                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label" for="return">Return (%)</label>
                                                <input type="number" step="0.01" class="form-control" name="return" id="return" placeholder="Enter Return Percentage" required />
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label" for="amount">Amount ($)</label>
                                                <input type="number" step="0.01" class="form-control" name="amount" id="amount" placeholder="Enter Amount" required />
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label" for="max_drawdown">Max Drawdown (%)</label>
                                                <input type="number" step="0.01" class="form-control" name="max_drawdown" id="max_drawdown" placeholder="Enter Max Drawdown" required />
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label" for="win_rates">Win Rates (%)</label>
                                                <input type="number" step="0.01" class="form-control" name="win_rates" id="win_rates" placeholder="Enter Win Rate" required />
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label" for="trades">Total Trades</label>
                                                <input type="number" class="form-control" name="trades" id="trades" placeholder="Enter Number of Trades" required />
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label" for="ratio">Rise To Reward Ratio</label>
                                                <input type="text"  class="form-control" name="ratio" id="ratio" placeholder="Enter like  1:3" required />
                                            </div>

                                            <button type="submit" class="btn btn-primary" name="addExpert">Add Expert</button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <script>
                            // JavaScript to show/hide fields based on selected payment type
                            document.getElementById('payment_type').addEventListener('change', function() {
                                const paymentType = this.value;
                                document.getElementById('bankFields').style.display = (paymentType === 'Bank') ? 'block' : 'none';
                                document.getElementById('walletFields').style.display = (paymentType === 'Wallet') ? 'block' : 'none';
                                document.getElementById('wuFields').style.display = (paymentType === 'Western Union') ? 'block' : 'none';
                            });
                        </script>

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