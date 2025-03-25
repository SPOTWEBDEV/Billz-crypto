<?php
include('../server/connection.php');
include('controllers/authFy.php');
// PREPARE USERS DETAILS;
include('controllers/userDetails.php');
//  FOR INVESTMENT MATURITY
include('controllers/invMTR_CTR.php');
// Log out the mother force;
include('controllers/logOut.php');


// server/operations/trade.php

$user_identity = $userDetails['id'];

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
<!-- saved from url=(0014)about:internet -->
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light"
    data-menu-styles="dark" data-toggled="close">

<head>
    <!-- Meta Data -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>EMPTY PAGE BRUH</title>
    <meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template" />
    <meta name="Author" content="Spruko Technologies Private Limited" />
    <meta name="keywords"
        content="admin,admin dashboard,admin panel,admin template,bootstrap,clean,dashboard,flat,jquery,modern,responsive,premium admin templates,responsive admin,ui,ui kit." />
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
                    <h1 class="page-title fw-semibold fs-18 mb-0">Trading History</h1>
                    <div class="ms-md-1 ms-0">
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Trading History
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!-- Page Header Close -->
                <!-- Start::row-1 -->
                <div class="row">
                    <div class="table-responsive">
                        <table class="table text-nowrap table-borderless">
                            <thead>
                                <tr>
                                    <th>S/N</th>

                                    <th>Pair</th>
                                    <th>Order Type</th>
                                    <th>Stop Loss</th>
                                    <th>Take Profit</th>
                                    <th>Entry Price</th>
                                    <th>Risk Reward</th>
                                    <th>Total Profit</th>
                                    <th>Profit</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody id="tradeTableBody">

                            </tbody>
                        </table>
                    </div>
                </div>
                <!--End::row-1 -->
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

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>


    <script>
     function fetchTradeUpdates() {
        $.ajax({
            url: '../server/api/trade.php',
            method: 'POST',
            data: {
                user_id: '<?php echo $user_identity ?>',
                from: 'firstclass'
            },
            success: function(data) {
               console.log(data)
            },
            error: function(xhr, status, error) {
                console.error('Error fetching trade updates:', error);
            }
        });
    }

    // Poll every second (1000ms)
    setInterval(fetchTradeUpdates, 1000);
    fetchTradeUpdates(); // Initial fetch



    function fetchTable() {
        $.ajax({
            url: '../server/api/getTrade.php',
            method: 'POST',
            data: {
                user_id: '<?php echo $user_identity ?>',
                from: 'firstclass'
            },
            success: function(res) {

                let data = JSON.parse(res)
                const tableBody = $('#tradeTableBody');
                tableBody.empty(); // Clear previous data

                if (data.length > 0) {
                    data.forEach(trade => {
                        const {
                            id,
                            pair,
                            order_type,
                            stop_loss,
                            take_profit,
                            entry_price,
                            risk_reward,
                            total_profit,
                            current_price_made,
                            status,
                            error
                        } = trade;

                        const statusBadge = status === 'completed' || status === 'takeprofit' ?
                            `<span class="badge bg-success-transparent ms-2">${status}</span>` :
                            status === 'running' ?
                            `<span class="badge bg-warning-transparent ms-2">${status}</span>` :
                            `<span class="badge bg-danger-transparent ms-2">${status}</span>`;

                        const orderTypeBadge = status === '1' ?
                            `<span class="badge bg-success-transparent ms-2">${order_type}</span>` :
                            `<span class="badge bg-warning-transparent ms-2">${order_type}</span>`;

                        const profitDisplay = total_profit ?
                            `$${parseFloat(total_profit).toFixed(2)}` : '$0.00';
                      

                            const currentProfitDisplay = current_price_made 
    ? `${current_price_made < 0 ? '-' : ''}$${Math.abs(parseFloat(current_price_made)).toFixed(2)}` 
    : '$0.00';



                        const row = $(`
                    <tr>
                        <td>${id}</td>
                        <td>${pair.replace('-','')}</td>
                        <td style="text-transform: capitalize; font-size:16px">${orderTypeBadge}</td>
                        <td>${stop_loss}</td>
                        <td>${take_profit}</td>
                        <td>${entry_price}</td>
                        <td>${risk_reward}</td>
                        <td><span class="badge bg-success-transparent">${profitDisplay}</span></td>
                        <td><span class="badge bg-success-transparent">${currentProfitDisplay}</span></td>
                        <td>${statusBadge}</td>
                    </tr>
                `);


                        tableBody.append(row);
                    });
                } else {
                    tableBody.append('<tr><td colspan="10">No pending trades found.</td></tr>');
                }
            },
            error: function(xhr, status, error) {
                console.error('Error fetching trade updates:', error);
            }
        });

    }

    // Poll every second (1000ms)
    setInterval(fetchTable, 1000);
    fetchTable(); // Initial fetch
    </script>



</body>

</html>