<?php
include('../server/connection.php');
include('controllers/authFy.php');
// PREPARE USERS DETAILS;
include('controllers/userDetails.php');

// Log out the mother force;
include('controllers/logOut.php');

$user_identity = $userDetails['id'];

?>


<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">

<head>
    <!-- Meta Data -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>KYC</title>
    <meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template" />
    <meta name="Author" content="Spruko Technologies Private Limited" />
    <meta name="keywords" content="admin,admin dashboard,admin panel,admin template,bootstrap,clean,dashboard,flat,jquery,modern,responsive,premium admin templates,responsive admin,ui,ui kit." />
    <!-- Favicon -->
    <link rel="icon" href="./assets/images/brand-logos/favicon.ico" type="image/x-icon" />
    <!-- Choices JS -->
    <script src="./assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>
    <!-- Main Theme Js -->
    <script src="./assets/js/main.js"></script>
    <!-- Bootstrap Css -->
    <link id="style" href="./assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Style Css -->
    <link href="./assets/css/styles.min.css" rel="stylesheet" />
    <!-- Icons Css -->
    <link href="./assets/css/icons.css" rel="stylesheet" />
    <!-- Node Waves Css -->
    <link href="./assets/libs/node-waves/waves.min.css" rel="stylesheet" />
    <!-- Simplebar Css -->
    <link href="./assets/libs/simplebar/simplebar.min.css" rel="stylesheet" />
    <!-- Color Picker Css -->
    <link rel="stylesheet" href="./assets/libs/flatpickr/flatpickr.min.css" />
    <link rel="stylesheet" href="./assets/libs/@simonwep/pickr/themes/nano.min.css" />
    <!-- Choices Css -->
    <link rel="stylesheet" href="./assets/libs/choices.js/public/assets/styles/choices.min.css" />
    <script src="<?php echo $domain ?>app/assets/js/jquery-3.6.0.min.js"></script>
     <script src="<?php echo $domain ?>app/assets/js/sweetalert2.all.min.js"></script>
</head>





<body>


    <!-- Start Switcher -->
    <?php include('./includes/switcher.php') ?>
    <!-- End Switcher -->
    <div class="page">
        <!-- app-header -->
        <?php include('./includes/header.php') ?>
        <!-- /app-header -->
        <!-- Start::app-sidebar -->
        <?php include('./includes/sidebar.php') ?>

        <!-- End::app-sidebar -->
        <!-- Start::app-content -->
      
        <?php
// Fetch user details
$userQuery = mysqli_query($connection, "SELECT * FROM `users` WHERE `id` = '$user_identity'");
$user = mysqli_fetch_assoc($userQuery);
$main_balance = $user['wallet'];
$copy_balance = $user['copy_balance'];

// Fetch expert details only if user has an assigned expert
$expert = null;
if ($user['copy_expert'] > 0) {
    $expertQuery = mysqli_query($connection, "SELECT * FROM `expert` WHERE `id` = '{$user['copy_expert']}'");
    if ($expertQuery && mysqli_num_rows($expertQuery) > 0) {
        $expert = mysqli_fetch_assoc($expertQuery);
    }
}
?>

<div class="main-content app-content">
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-title fw-semibold fs-18 mb-0">Copy Trading</h1>
            <div class="ms-md-1 ms-0">
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Copy Trading</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Page Header Close -->

        <div class="row">
            <div class="col-xl-6">
                <div class="card custom-card">
                    <div class="card-header">
                        <div class="card-title">Copy Trading Details</div>
                    </div>

                    <div class="card-body">
                        <label class="form-label">Expert Name</label>
                        <input type="text" name="expert_name" class="form-control form-control-sm"
                            value="<?= $expert ? $expert['expert_name'] : 'No Expert Assigned' ?>" readonly>
                    </div>

                    <div class="card-body">
                        <label class="form-label">Expert Image</label><br>
                        <?php if ($expert) { ?>
                            <img src="<?= $domain . 'uploads/expert/' . $expert['expert_image'] ?>" alt="Expert Image"
                                class="img-thumbnail" width="100">
                        <?php } else { ?>
                            <p>No Expert Assigned</p>
                        <?php } ?>
                    </div>

                    <div class="card-body">
                        <label class="form-label">Copy Rise</label>
                        <input type="text" name="copy_rise" class="form-control form-control-sm"
                            value="<?= $user['copy_rise'] ?>" readonly>
                    </div>

                    <div class="card-body">
                        <label class="form-label">Copy Balance</label>
                        <input type="text" name="copy_balance" class="form-control form-control-sm"
                            value="$<?= number_format($copy_balance, 2) ?>" readonly>
                    </div>

                    <div class="card-body">
                        <label class="form-label">Ratio</label>
                        <input type="text" name="ratio" class="form-control form-control-sm"
                            value="<?= $expert ? $expert['ratio'] : 'N/A' ?>" readonly>
                    </div>

                    <div class="card-body">
                        <label class="form-label">Win Rate</label>
                        <input type="text" name="win_rate" class="form-control form-control-sm"
                            value="<?= $expert ? $expert['win_rates'] . '%' : 'N/A' ?>" readonly>
                    </div>

                    <div class="card-body">
                        <label class="form-label">Max Drawdown</label>
                        <input type="text" name="max_drawdown" class="form-control form-control-sm"
                            value="<?= $expert ? $expert['max_drawdown'] . '%' : 'N/A' ?>" readonly>
                    </div>
                </div>
            </div>

            <!-- Start:: Exchange Form -->
            <div class="col-xl-6">
                <?php
                // Handle transfer submission
                if (isset($_POST['exchange_btn'])) {
                    $amount_to_transfer = floatval($_POST['amount_to_transfer']); // Convert input to float

                    if ($amount_to_transfer <= 0) {
                        echo "<script>
                            Swal.fire({
                                title: 'Invalid Amount!',
                                text: 'Please enter a valid amount to transfer.',
                                icon: 'warning',
                                confirmButtonText: 'OK'
                            });
                        </script>";
                    } elseif ($amount_to_transfer > $main_balance) {
                        echo "<script>
                            Swal.fire({
                                title: 'Insufficient Balance!',
                                text: 'You do not have enough funds in your main balance.',
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                        </script>";
                    } else {
                        // Deduct from main balance and add to copy balance
                        $new_main_balance = $main_balance - $amount_to_transfer;
                        $new_copy_balance = $copy_balance + $amount_to_transfer;

                        $updateQuery = mysqli_query($connection, "UPDATE `users` SET `wallet`='$new_main_balance', `copy_balance`='$new_copy_balance' WHERE `id`='$user_identity'");

                        if ($updateQuery) {
                            echo "<script>
                                Swal.fire({
                                    title: 'Transfer Successful!',
                                    text: 'You have successfully transferred $$amount_to_transfer to your Copy Trading Balance.',
                                    icon: 'success',
                                    confirmButtonText: 'OK'
                                }).then(() => {
                                    window.location.href = './copy_trading_setting.php';
                                });
                            </script>";
                        } else {
                            echo "<script>
                                Swal.fire({
                                    title: 'Transaction Failed!',
                                    text: 'Something went wrong. Please try again.',
                                    icon: 'error',
                                    confirmButtonText: 'OK'
                                });
                            </script>";
                        }
                    }
                }
                ?>

                <!-- Exchange Form -->
                <form method="POST" class="card custom-card">
                    <div class="card-header">
                        <div class="card-title">Exchange to Copy Trading Balance</div>
                    </div>

                    <div class="card-body">
                        <label class="form-label">Main Balance</label>
                        <input type="text" class="form-control form-control-sm"
                            value="$<?= number_format($main_balance, 2) ?>" readonly>
                    </div>

                    <div class="card-body">
                        <label class="form-label">Amount to Transfer</label>
                        <input type="number" name="amount_to_transfer" class="form-control form-control-sm"
                            placeholder="Enter amount" required>
                    </div>

                    <div class="card-body">
                        <button class="btn btn-primary" name="exchange_btn" type="submit">Transfer Funds</button>
                    </div>
                </form>
            </div>
            <!-- End:: Exchange Form -->
        </div>
    </div>
</div>






    </div>
    <div class="scrollToTop">
        <span class="arrow"><i class="ri-arrow-up-s-fill fs-20"></i></span>
    </div>
    <div id="responsive-overlay"></div>
   <script src="<?php echo $domain ?>app/assets/js/sweetalert2.all.min.js"></script>


    <script src="./assets/libs/@popperjs/core/umd/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="./assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Defaultmenu JS -->
    <script src="./assets/js/defaultmenu.min.js"></script>
    <!-- Node Waves JS-->
    <script src="./assets/libs/node-waves/waves.min.js"></script>
    <!-- Sticky JS -->
    <script src="./assets/js/sticky.js"></script>
    <!-- Simplebar JS -->
    <script src="./assets/libs/simplebar/simplebar.min.js"></script>
    <script src="./assets/js/simplebar.js"></script>
    <!-- Color Picker JS -->
    <script src="./assets/libs/@simonwep/pickr/pickr.es5.min.js"></script>
    <!-- Apex Charts JS -->
    <script src="./assets/libs/apexcharts/apexcharts.min.js"></script>
    <!-- Crypto-Dashboard JS -->
    <script src="./assets/js/crypto-dashboard.js"></script>
    <!-- Custom-Switcher JS -->
    <script src="./assets/js/custom-switcher.min.js"></script>
    <!-- Custom JS -->
    <script src="./assets/js/custom.js"></script>

</body>

</html>