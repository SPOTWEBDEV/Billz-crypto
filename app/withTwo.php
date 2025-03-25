<?php
;
include('../server/connection.php');
include('controllers/authFy.php');
// PREPARE USERS DETAILS;
include('controllers/userDetails.php');

// Log out the mother force;
include('controllers/logOut.php');
?>

<!DOCTYPE html>
<!-- saved from url=(0014)about:internet -->
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">

<head>
    <!-- Meta Data -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>WITHDRAW</title>
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
    <script src="controllers/jquery-3.6.0.min.js"></script>
<script src="controllers/sweetalert2.all.min.js"></script>
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
        <div class="main-content app-content">
            <div class="container-fluid">
                <!-- Page Header -->
                <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
                    <h1 class="page-title fw-semibold fs-18 mb-0">WITHDRAWAL</h1>
                    <div class="ms-md-1 ms-0">
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Withdrawal
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!-- Page Header Close -->
                <!-- Start::row-1 -->
                <div class="row">
                    <div class="col-xl-6">
                        <div class="card custom-card">
                            <div class="card-header justify-content-between">
                                <div class="card-title"> Withdrawal Details </div>
                                <div class="prism-toggle">
                                </div>
                                <div>
                                    <div class="mb-1">
                                        <!-- some emtpy word or text can be here -->
                                        <span class="fs-10 badge bg-success-transparent text-success p-1 ms-2">
                                            <i class="ri-arrow-up-s-line align-middle me-1"></i>
                                            $<?php echo number_format($userDetails['wallet']) ?>
                                        </span>
                                    </div>
                                    <!-- <div class="fs-20 fw-semibold">$132,12933.000</div>
                                            <small class="text-muted fw-semibold">12 BTC</small> -->
                                </div>
                            </div>
                            <form action="./controllers/withCTR.php" method="POST" class="card-body">
                                <select class="form-control py-3 mb-3" name="channel">
                                    <option value="USDT(Trc20)" selected="">USDT(Trc20)</option>
                                    <option value="BNB" >BNB</option>
                                    <option value="Ethereum">Ethereum</option>
                                    <option value="BTC(Bitcoin)">BTC(Bitcoin)</option>
                                    <option value="Litecoin">Litecoin</option>
                                </select>

                                <div class="form-floating mb-3">
                                    <input type="hidden" name="from_wallet" value="2" class="form-control" id="floatingInput">
                                    <input type="text" name="amount" class="form-control" id="floatingInput" placeholder="amount sent">
                                    <label for="floatingInput">Amount to Withdraw</label>
                                </div>

                                <div class="form-floating mt-3">
                                    <input type="text" name="sender_addr" class="form-control" id="floatingInput" placeholder="Your Wallet Address" requried>
                                    <label for="floatingInput">withdrawal Wallet Address</label>
                                </div>

                                <div class="form-floating mt-3">
                                    <button class="btn btn-secondary" name="make_withdrawal" type="submit" style="width: 100%">PLACE WITHDRAWAL</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>

    </div>
    <div class="scrollToTop">
        <span class="arrow"><i class="ri-arrow-up-s-fill fs-20"></i></span>
    </div>
    <div id="responsive-overlay"></div>
    <!-- Popper JS -->
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
    <!-- Custom-Switcher JS -->
    <script src="./assets/js/custom-switcher.min.js"></script>
    <!-- Custom JS -->
    <script src="./assets/js/custom.js"></script>
</body>

</html>