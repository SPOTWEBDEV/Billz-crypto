<?php



include('../server/connection.php');
include('controllers/authFy.php');
// PREPARE USERS DETAILS;
include('controllers/userDetails.php');
// Log out the mother force;
include('controllers/logOut.php');

$user_identity = $userDetails['id'];
$copy_balance = $userDetails['copy_balance'];




$sql = mysqli_query($connection, "SELECT sum(amount) AS trading_balance FROM investments where user_id = '$user_identity' AND `status` = 0");
// $sql = mysqli_query($connection,"SELECT sum(amount) AS trading_balance FROM investments where user_id = '$user_identity'");

while ($row = mysqli_fetch_array($sql)) {
    $trading_balance = $row['trading_balance'];
}


$querypromo = "SELECT promo_won FROM users WHERE id = '$user_identity'";
$resultpromo = mysqli_query($connection, $querypromo);


if ($resultpromo) {
    $row = mysqli_fetch_assoc($resultpromo);
    $promo_won = $row['promo_won'];
}


function formatNumber($number, $decimals = 2)
{
    // Check if the input is empty or not numeric
    if (empty($number) || !is_numeric($number)) {
        $number = 0;
    }

    // Use number_format to format the number
    return number_format((float)$number, $decimals, '.', ',');
}











?>




<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">

<head>
    <!-- Meta Data -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
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
    <!-- <meta name="theme-color" content="#e7ecef" /> -->


    <meta name="google" content="notranslate">
    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'en',
                includedLanguages: 'en,es,fr,de,it', // Add the languages you want to support
                layout: google.translate.TranslateElement.InlineLayout.SIMPLE
            }, 'google_translate_element');
        }
    </script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>



    <title>Dashboard - Home</title>

</head>

<body>
    <!-- Switcher -->
    <?php include('./includes/switcher.php') ?>
    <!-- End Switcher -->

    <div class="page">
        <!-- app-header -->
        <?php include('./includes/header.php') ?>
        <!-- /app-header -->

        <!-- Nah the app sidebar be this -->
        <!-- Start::app-sidebar -->
        <?php include('./includes/sidebar.php') ?>
        <!-- Start::app-sidebar -->
        <!-- OMOR NAH HERE WHERE SIDEBAR ENDED OOO -->
        <!-- End::app-sidebar -->

        <!-- Start::app-content -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

        <div class="main-content app-content">
            <div class="container-fluid">
                <!-- Page Header -->

                <div class="alert alert-primary text-center alert-dismissible">
                    <button type="button" class="btn-close" data-bs-dismiss="alert">X</button>
                    Welcome <?php echo $userDetails['name'] ?>

                    <?php

                    $statusres = mysqli_query($connection, "SELECT `kycstatus` FROM `users` WHERE  `id`='$id'");

                    $row = mysqli_fetch_assoc($statusres);

                    if ($row['kycstatus'] == 'approved') { ?>
                        <!--<button class="btn btn-success">KYC Verification Approved</button>-->

                    <?php
                    } else if ($row['kycstatus'] == 'null') { ?>
                        <!--<button class="btn btn-secondary">Account Verification Inactive</button>-->
                    <?php  } else if ($row['kycstatus'] == 'pending') { ?>
                        <!--<button class="btn btn-secondary">Kyc Verification Pending</button>-->
                    <?php } else if ($row['kycstatus'] == 'decliend') { ?>
                        <!--<button class="btn btn-secondary">KYC Verification Declined</button>-->
                    <?php }

                    ?>



                </div>
                <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">


                    <h1 class="page-title fw-semibold fs-18 mb-0">Home</h1>
                    <div class="ms-md-1 ms-0">
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Home
                                </li>
                            </ol>
                        </nav>

                    </div>
                </div>
                <!-- Page Header Close -->












                <!-- Start::row-1 -->
                <?php if ($userDetails['account_warning'] == 'yes') { ?>
                    <div class="alert alert-danger text-center"><span class="spinner-grow text-danger spinner-grow-sm"></span> Account warning, please contact support</div>
                <?php } ?>
                <div class="row">
                    <div class="col-xxl-9">
                        <div class="row">

                            <!-- DIS ONE NAH FOR WALLET BALLANCE -->
                            <div class="col-xxl-4 col-xl-4 col-lg-12">
                                <div class="card custom-card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-4">
                                            <div class="d-flex align-items-center">
                                                <div class="me-2">
                                                    <span class="avatar avatar-md avatar-rounded bg-light p-2">
                                                        <!-- <img src="./assets/images/crypto-currencies/regular/Bitcoin.svg" alt="" /> -->
                                                        <img src="https://img.icons8.com/?size=512&id=80382&format=png" alt="" />
                                                    </span>
                                                </div>
                                                <div class="mb-0 fw-semibold">AVAILABLE BALANCE</div>
                                            </div>
                                            <div class="ms-auto">
                                                <div id="btc-chart"></div>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-end">
                                            <div>
                                                <!-- <p class="mb-1">BTC / USD</p> -->
                                                <p class="fs-20 mb-0 fw-semibold lh-1 text-primary">
                                                    $<?php echo number_format($userDetails['wallet']) ?>
                                                </p>
                                            </div>
                                            <div class="ms-auto text-end">
                                                <!-- <p class="mb-0">$0.04</p> -->
                                                <p class="mb-0 text-muted">
                                                    <span class="badge bg-success-transparent ms-2">CURRENT</span>
                                                    <!-- <span class="text-muted">Vol:</span>(+2.33%) -->
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- THIS ONE NOW NAH FOR WITHDRAWALS -->
                            <div class="col-xxl-4 col-xl-4 col-lg-12">
                                <div class="card custom-card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-4">
                                            <div class="d-flex align-items-center">
                                                <div class="me-2">
                                                    <span class="avatar avatar-md avatar-rounded bg-light p-2">
                                                        <!-- <img src="./assets/images/crypto-currencies/regular/Ethereum.svg" alt="" /> -->
                                                        <img width="48" height="48" src="https://img.icons8.com/fluency/48/crowd.png" alt="crowd" />
                                                    </span>
                                                </div>
                                                <div class="mb-0 fw-semibold">EARNING BALANCE</div>
                                            </div>
                                            <div class="ms-auto">
                                                <div id="eth-chart"></div>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-end">
                                            <div>
                                                <!-- <p class="mb-1">ETH / USD</p> -->
                                                <p class="fs-20 mb-0 fw-semibold lh-1 text-primary">
                                                    $<?php echo $userDetails['gain_wallet'] ?>
                                                </p>
                                            </div>
                                            <div class="ms-auto text-end">
                                                <!-- <p class="mb-0">$2.57</p> -->
                                                <p class="mb-0 text-muted">
                                                    <!--<span class="badge bg-success-transparent ms-2">CURRENT</span>-->
                                                    <!-- <span class="text-muted">Vol:</span>(+13.45%) -->
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>




                            <!-- DIS ONE NOW NAH FOR DEPOSITES -->
                            <div class="col-xxl-4 col-xl-4 col-lg-12">
                                <div class="card custom-card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-4">
                                            <div class="d-flex align-items-center">
                                                <div class="me-2">
                                                    <span class="avatar avatar-md avatar-rounded bg-light p-2">
                                                        <!-- <img src="./assets/images/crypto-currencies/regular/Dash.svg" alt="" /> -->
                                                        <img src="https://img.icons8.com/?size=512&id=13013&format=png" alt="" />
                                                    </span>
                                                </div>
                                                <div class="mb-0 fw-semibold">ACTIVE INVESTMENT</div>
                                            </div>
                                            <div class="ms-auto">
                                                <div id="dash-chart"></div>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-end">
                                            <div>
                                                <!-- <p class="mb-1">DASH / USD</p> -->
                                                <p class="fs-20 mb-0 fw-semibold lh-1 text-primary">

                                                    $<?php


                                                        echo formatNumber($trading_balance, 2) ?>
                                                </p>
                                            </div>
                                            <div class="ms-auto text-end">
                                                <!-- <p class="mb-0">$12.32</p> -->
                                                <p class="mb-0 text-muted">
                                                    <span class="badge bg-success-transparent ms-2">CURRENT</span>
                                                    <!-- <span class="text-muted">Vol:</span>(+112.95%) -->
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- THIS ONE NOW NAH FOR WITHDRAWALS -->
                            <div class="col-xxl-4 col-xl-4 col-lg-12">
                                <div class="card custom-card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-4">
                                            <div class="d-flex align-items-center">
                                                <div class="me-2">
                                                    <span class="avatar avatar-md avatar-rounded bg-light p-2">
                                                        <!-- <img src="./assets/images/crypto-currencies/regular/Ethereum.svg" alt="" /> -->
                                                        <img width="48" height="48" src="https://img.icons8.com/color/48/request-money.png" alt="request-money" />
                                                    </span>
                                                </div>
                                                <div class="mb-0 fw-semibold">TOTAL WITHDRAWALS</div>
                                            </div>
                                            <div class="ms-auto">
                                                <div id="eth-chart"></div>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-end">
                                            <div>
                                                <!-- <p class="mb-1">ETH / USD</p> -->
                                                <p class="fs-20 mb-0 fw-semibold lh-1 text-primary">
                                                    $<?php echo number_format($userDetails['total_withdrawal']) ?>
                                                </p>
                                            </div>
                                            <div class="ms-auto text-end">
                                                <!--<p class="mb-0">$2.57</p> -->
                                                <p class="mb-0 text-muted">
                                                    <span class="badge bg-success-transparent ms-2">CURRENT</span>
                                                    <!--<span class="text-muted">Vol:</span>(+13.45%) -->
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- THIS ONE NOW NAH FOR WITHDRAWALS -->
                            <div class="col-xxl-4 col-xl-4 col-lg-12">
                                <div class="card custom-card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-4">
                                            <div class="d-flex align-items-center">
                                                <div class="me-2">
                                                    <span class="avatar avatar-md avatar-rounded bg-light p-2">
                                                        <img src="./assets/images/crypto-currencies/regular/Ethereum.svg" alt="" />
                                                        <img src="https://img.icons8.com/?size=512&id=114497&format=png" alt="" />
                                                    </span>
                                                </div>
                                                <div class="mb-0 fw-semibold">REFERRAL BALANCE</div>
                                            </div>
                                            <div class="ms-auto">
                                                <div id="eth-chart"></div>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-end">
                                            <div>
                                                <!-- <p class="mb-1">ETH / USD</p> -->
                                                <p class="fs-20 mb-0 fw-semibold lh-1 text-primary">
                                                    $<?php echo number_format($userDetails['referral_balance']) ?>
                                                </p>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>





                            <!-- THIS ONE NOW NAH FOR WITHDRAWALS -->
                            <div class="col-xxl-4 col-xl-4 col-lg-12">
                                <div class="card custom-card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-4">
                                            <div class="d-flex align-items-center">
                                                <div class="me-2">
                                                    <span class="avatar avatar-md avatar-rounded bg-light p-2">
                                                        <!-- <img src="./assets/images/crypto-currencies/regular/Ethereum.svg" alt="" /> -->
                                                        <img width="48" height="48" src="https://img.icons8.com/fluency/48/deposit.png" alt="deposit" />
                                                    </span>
                                                </div>
                                                <div class="mb-0 fw-semibold">TOTAL DEPOSIT</div>
                                            </div>
                                            <div class="ms-auto">
                                                <div id="eth-chart"></div>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-end">
                                            <div>
                                                <!-- <p class="mb-1">ETH / USD</p> -->
                                                <p class="fs-20 mb-0 fw-semibold lh-1 text-primary">
                                                    $<?php echo number_format($userDetails['total_deposit']) ?>
                                                </p>
                                            </div>
                                            <div class="ms-auto text-end">
                                                <!-- <p class="mb-0">$2.57</p> -->
                                                <p class="mb-0 text-muted">
                                                    <!--<span class="badge bg-success-transparent ms-2">CURRENT</span>-->
                                                    <!-- <span class="text-muted">Vol:</span>(+13.45%) -->
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>








                            <!-- DIS ONE NAH FOR RECENT TRANSACTIONS -->

                            <!-- SEE RECENT TRANSACTION DON FINISH -->
                            <div class="row">
                                <div class="table-responsive">
                                    <table class="table text-nowrap table-borderless">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">TRANSACTION</th>
                                                <th scope="col">AMOUNT</th>
                                                <th scope="col">DATE</th>
                                                <th scope="col">STATUS</th>
                                            </tr>
                                        </thead>

                                        <tbody>



                                            <?php

                                            $query_withdrawals = "SELECT 'Withdrawals' AS source_table, amount, status, date_withdrawn AS date
                                                              FROM withdrawals 
                                                              WHERE user_id = '$user_identity'";

                                            $select_withdrawals = mysqli_query($connection, $query_withdrawals);

                                            if (!$select_withdrawals) {
                                                die('Error: ' . mysqli_error($connection));
                                            }

                                            $withdrawals = [];
                                            while ($row = mysqli_fetch_assoc($select_withdrawals)) {
                                                $withdrawals[] = $row;
                                            }

                                            // Fetch investments
                                            $query_investments = "SELECT 'Investments' AS source_table, amount, status, date_invested AS date
                                                              FROM investments 
                                                              WHERE user_id = '$user_identity'";

                                            $select_investments = mysqli_query($connection, $query_investments);

                                            if (!$select_investments) {
                                                die('Error: ' . mysqli_error($connection));
                                            }

                                            $investments = [];
                                            while ($row = mysqli_fetch_assoc($select_investments)) {
                                                $investments[] = $row;
                                            }

                                            // Fetch deposits
                                            $query_deposits = "SELECT 'Deposits' AS source_table, amount, status, date_deposited AS date
                                                           FROM deposits 
                                                           WHERE user_id = '$user_identity'";

                                            $select_deposits = mysqli_query($connection, $query_deposits);

                                            if (!$select_deposits) {
                                                die('Error: ' . mysqli_error($connection));
                                            }

                                            $deposits = [];
                                            while ($row = mysqli_fetch_assoc($select_deposits)) {
                                                $deposits[] = $row;
                                            }

                                            // Combine results
                                            $results = array_merge($withdrawals, $investments, $deposits);



                                            // Sort results by date proximity to current date
                                            $currentDate = strtotime(date('Y-m-d')); // Get current date in Unix timestamp

                                            usort($results, function ($a, $b) use ($currentDate) {
                                                // $diffA = abs(strtotime($a['date']) - $currentDate);
                                                // $diffB = abs(strtotime($b['date']) - $currentDate);

                                                // return $diffA + $diffB; // Sort by ascending difference (closest to current date first)
                                                return strtotime($b['date']) - strtotime($a['date']);
                                            });



                                            // Now $results is sorted by date proximity to the current date

                                            $count = 1;
                                            foreach ($results as $row) { ?>
                                                <tr>
                                                    <td><?php echo $count; ?></td>
                                                    <td><?php echo $row['source_table']; ?></td>
                                                    <td><?php echo number_format($row['amount'],2); ?></td>
                                                    <td><?php echo $row['date']; ?></td>
                                                    <td>
                                                        <?php
                                                        if ($row['status'] == 0) { ?>
                                                            <button type="button" class="btn btn-danger text-white">Pending</button>
                                                        <?php } elseif ($row['status'] == 1) { ?>
                                                            <button type="button" class="btn btn-success text-white">Approved</button>
                                                        <?php } elseif ($row['status'] == 2) { ?>
                                                            <button type="button" class="btn btn-warning text-white">Declined</button>
                                                        <?php } else { ?>
                                                            <button type="button" class="btn btn-info text-white">null</button>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                            <?php
                                                $count++;
                                            }





                                            ?>







                                        </tbody>




                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>




                </div>
                <!--End::row-1 -->
                <!-- Start:: row-2 -->

                <div style="height: 70px;">

                </div>
            </div>

            <!-- Smartsupp Live Chat script -->
            <script type="text/javascript">
                var _smartsupp = _smartsupp || {};
                _smartsupp.key = 'dd2e30f3bf4bcfb67fad18366d36476fe3c2419b';
                window.smartsupp || (function(d) {
                    var s, c, o = smartsupp = function() {
                        o._.push(arguments)
                    };
                    o._ = [];
                    s = d.getElementsByTagName('script')[0];
                    c = d.createElement('script');
                    c.type = 'text/javascript';
                    c.charset = 'utf-8';
                    c.async = true;
                    c.src = 'https://www.smartsuppchat.com/loader.js?';
                    s.parentNode.insertBefore(c, s);
                })(document);
            </script>
            <noscript> Powered by <a href=“https://www.smartsupp.com” target=“_blank”>Smartsupp</a></noscript>



            <?php
            include('./includes/hoverfooter.php')
            ?>

        </div>
        <?php include('./includes/popin_with.php') ?>
        <!-- <div class="scrollToTop">
            <span class="arrow"><i class="ri-arrow-up-s-fill fs-20"></i></span>
        </div> -->
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