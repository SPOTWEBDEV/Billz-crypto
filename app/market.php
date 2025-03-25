<?php

include('../server/connection.php');
include('controllers/authFy.php');
// PREPARE USERS DETAILS;
include('controllers/userDetails.php');
//  FOR INVESTMENT MATURITY
include('controllers/invMTR_CTR.php');
// Log out the mother force;
include('controllers/logOut.php');

$user_identity = $userDetails['id'];
$user_balance = $userDetails['wallet'];


$sql = mysqli_query($connection, "SELECT sum(amount) AS trading_balance FROM investments where user_id = '$user_identity'");

while ($row = mysqli_fetch_array($sql)) {
    $trading_balance = $row['trading_balance'];
}


?>

<!DOCTYPE html>
<!-- saved from url=(0014)about:internet -->
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

    <script src="<?php echo $domain ?>app/assets/js/jquery-3.6.0.min.js"></script>
    <script src="<?php echo $domain ?>app/assets/js/sweetalert2.all.min.js"></script>

    <title>DASHBOARD</title>

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
        <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pair = $_POST['tradingPair'];
    $order_type = $_POST['orderType'];
    $amount = $_POST['amount'];
    $entry_price = $_POST['entryPrice'];
    $stop_loss = $_POST['stopLoss'];
    $take_profit = $_POST['takeProfit'];

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

    if ($user_balance < $amount) {
        echo "<script>
            window.onload = function() {
                Swal.fire('Error!', 'Insufficient balance!', 'error').then(() => {
                    window.location.href='market.php';
                });
            }
        </script>";
        exit;
    }

    // Deduct balance
    $new_balance = $user_balance - $amount;
    mysqli_query($connection, "UPDATE users SET wallet = '$new_balance' WHERE id = '$user_identity'");

    // Calculate Risk-to-Reward Ratio (RRR)
    $risk = abs($entry_price - $stop_loss);
    $reward = abs($take_profit - $entry_price);

    if ($risk == 0) {
        $risk_to_reward = 'N/A'; 
        $rr_ratio = 0;
    } else {
        $rr_ratio = round($reward / $risk, 2);
        $risk_to_reward = "1:$rr_ratio";
    }

    // Calculate Pip Value
    $pip_value = ($amount * 1) / $entry_price;

    // Calculate Total Money Made based on Order Type
    if ($rr_ratio > 0) {
        $total_money_made = $amount * $rr_ratio;
    } else {
        $total_money_made = 0;
    }

    // Insert the order
    $insert_order = mysqli_query($connection, "INSERT INTO trade 
        (user_id, pair, order_type, amount, entry_price, stop_loss, take_profit, status, risk_reward, pip_value, total_profit) 
        VALUES ('$user_identity', '$pair', '$order_type', '$amount', '$entry_price', '$stop_loss', '$take_profit', '$status', '$risk_to_reward', '$pip_value', '$total_money_made')");

    if ($insert_order) {
        echo "<script>
            window.onload = function() {
                Swal.fire('Success!', 'Order placed successfully!', 'success').then(() => {
                    window.location.href='market.php';
                });
            }
        </script>";
    } else {
        echo "<script>
            window.onload = function() {
                Swal.fire('Error!', '" . mysqli_error($connection) . "', 'error');
            }
        </script>";
    }
}
?>



        <div class="main-content app-content">
            <div class="container-fluid">
                <div class="row py-2">
                    <div class="col-9" style="height:650px">
                        <div class="tradingview-widget-container" style="height:100%;width:100%">
                            <div class="tradingview-widget-container__widget" style="height:calc(100% - 32px);width:100%"></div>
                            <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-advanced-chart.js" async>
                                {
                                    "autosize": true,
                                    "symbol": "NASDAQ:AAPL",
                                    "timezone": "Etc/UTC",
                                    "theme": "light",
                                    "style": "1",
                                    "locale": "en",
                                    "withdateranges": true,
                                    "range": "YTD",
                                    "hide_side_toolbar": false,
                                    "allow_symbol_change": true,
                                    "details": true,
                                    "hotlist": true,
                                    "calendar": false,
                                    "support_host": "https://www.tradingview.com"
                                }
                            </script>
                        </div>
                    </div>

                    <!-- Market Order Form -->
                    <form method="POST" class="col-3" id="tradeForm">
                        <div class="card p-3">
                            <h5 class="text-center">Place Market Order</h5>

                            <!-- Select Trading Pair -->
                            <div class="mb-2">
                                <label for="tradingPair" class="form-label">Select Pair</label>
                                <select name="tradingPair" class="form-select" id="tradingPair">
                                    <option value="BTC-USDT">BTC/USDT</option>
                                    <option value="ETH-USDT">ETH/USDT</option>
                                    <option value="BNB-USDT">BNB/USDT</option>
                                </select>
                            </div>

                            <!-- Hidden Input for Order Type -->
                            <input type="hidden" name="orderType" id="orderType">

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

                            <!-- Buy and Sell Buttons -->
                            <div class="d-flex justify-content-between">
                                <button type="button" class="btn btn-success w-50 me-1" onclick="setOrderType('Buy')">Buy</button>
                                <button type="button" class="btn btn-danger w-50 ms-1" onclick="setOrderType('Sell')">Sell</button>
                            </div>
                        </div>
                    </form>

                </div>

                <script>
                    function setOrderType(type) {
                        document.getElementById("orderType").value = type;
                        document.getElementById("tradeForm").submit();
                    }
                </script>
            </div>
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