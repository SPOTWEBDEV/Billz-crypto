<?php

include('../server/connection.php');

if (!isset($_SESSION['admin_login_']) && $_SESSION['admin_login_'] != true) echo "<script> window.location.href = 'login.php' </script>";





?>









<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed " dir="ltr" data-theme="theme-default" data-assets-path="assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title><?php echo $sitename ?> || Add Copy Trade</title>

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
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        

        $pair = $_POST['tradingPair'];
        $order_type = $_POST['orderType'];
        $amount = $_POST['amount'];
        $entry_price = $_POST['entryPrice'];
        $stop_loss = $_POST['stopLoss'];
        $take_profit = $_POST['takeProfit'];
        $expert = $_POST['expert'];

        $status = 'pending';

        // Validate input
        if (empty($pair) || empty($order_type) || empty($amount) || $amount <= 0 || empty($entry_price) || empty($stop_loss) || empty($take_profit)) {
            echo "<script>
            window.onload = function() {
                Swal.fire('Error!', 'Invalid input values.', 'error').then(() => {
                    window.location.href='market.php';
                });
            }
        </script>";
            exit;
        }

        // Calculate Risk-to-Reward Ratio (RRR)
        $risk = abs($entry_price - $stop_loss);
        $reward = abs($take_profit - $entry_price);
        $risk_to_reward = ($risk == 0) ? 'N/A' : "1:" . round($reward / $risk, 2);

        // Calculate Pip Value
        $pip_value = ($amount * 1) / $entry_price;

        // Total money made from the trade
        $total_money_made = ($take_profit - $entry_price) * $pip_value * $amount;

        // Fetch all users who have `copy_expert` matching `$expert`
        $user_query = mysqli_query($connection, "SELECT id FROM users WHERE copy_expert = '$expert'");

        if (mysqli_num_rows($user_query) > 0) {
            while ($user = mysqli_fetch_assoc($user_query)) {
                $user_id = $user['id'];

                // Insert trade for each user
                $insert_order = mysqli_query($connection, "INSERT INTO trade 
            (user_id, pair, order_type, amount, entry_price, stop_loss, take_profit, status, risk_reward, pip_value, total_profit, type, expert_id) 
            VALUES ('$user_id', '$pair', '$order_type', '$amount', '$entry_price', '$stop_loss', '$take_profit', '$status', '$risk_to_reward', '$pip_value', '$total_money_made', 'copy_trade', '$expert')");

                if (!$insert_order) {
                    echo "<script>
                    window.onload = function() {
                        Swal.fire('Error!', 'Error creating trade for user ID: $user_id - " . mysqli_error($connection) . "', 'error');
                    }
                </script>";
                }
            }

            // Show success message after inserting all trades
            echo "<script>
            window.onload = function() {
                Swal.fire('Success!', 'Trade created successfully for all users copying this expert!', 'success').then(() => {
                    window.location.href='add_copy_trade.php';
                });
            }
        </script>";
        } else {
            echo "<script>
            window.onload = function() {
                Swal.fire('Error!', 'No users found copying this expert.', 'error').then(() => {
                    window.location.href='add_copy_trade.php';
                });
            }
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
                            <span class="text-muted fw-light">Admin /</span> Add Copy Trade
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

                                            <div class="mb-2">
                                                <label for="expert" class="form-label">Select Expert</label>
                                                <select name="expert" class="form-select" id="expert">
                                                    <?php

                                                    $queryExpert = mysqli_query($connection, "SELECT * FROM `expert`");
                                                    while ($rowExpert = mysqli_fetch_assoc($queryExpert)) { ?>

                                                        <option value="<?php echo $rowExpert['id'] ?>"><?php echo $rowExpert['expert_name'] ?></option>

                                                    <?php }

                                                    ?>


                                                </select>
                                            </div>


                                            <div class="mb-2">
                                                <label for="tradingPair" class="form-label">Select Pair</label>
                                                <select name="tradingPair" class="form-select" id="tradingPair">
                                                    <option value="BTC-USDT">BTC/USDT</option>
                                                    <option value="ETH-USDT">ETH/USDT</option>
                                                    <option value="BNB-USDT">BNB/USDT</option>
                                                </select>
                                            </div>



                                            <!-- Entry Price Input -->
                                            <div class="mb-2">
                                                <label for="entryPrice" class="form-label">Entry Price</label>
                                                <input type="number" name="entryPrice" class="form-control" id="entryPrice" placeholder="Enter Entry Price" required>
                                            </div>

                                            <div class="mb-2">
                                                <label for="amount" class="form-label">Amount</label>
                                                <input type="number" name="amount" class="form-control" id="amount" placeholder="Enter Trade Amount" required>
                                            </div>

                                            <div class="mb-2">
                                                <label for="stopLoss" class="form-label">Stop-Loss (SL)</label>
                                                <input type="number" name="stopLoss" class="form-control" id="stopLoss" placeholder="Enter SL Price" required>
                                            </div>

                                            <div class="mb-2">
                                                <label for="takeProfit" class="form-label">Take-Profit (TP)</label>
                                                <input type="number" name="takeProfit" class="form-control" id="takeProfit" placeholder="Enter TP Price" required>
                                            </div>

                                            <div class="mb-2">
                                                <label for="orderType" class="form-label">Market Order</label>
                                                <select name="orderType" class="form-select" id="tradingPair">
                                                    <option value="sell">SELL</option>
                                                    <option value="buy">BUY</option>

                                                </select>
                                            </div>

                                            <button type="submit" class="btn btn-primary" name="addExpert">Add Copy Trade</button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>
                    <!-- Basic form end -->
                    <!-- / Content -->





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