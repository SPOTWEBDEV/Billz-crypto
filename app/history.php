<?php
;
include('../server/connection.php');
// AUTHIFY PAGE
include('controllers/authFy.php');
// PREPARE USERS DETAILS;
include('controllers/userDetails.php');
//  FOR INVESTMENT MATURITY
include('controllers/invMTR_CTR.php');
// Log out the mother force;
include('controllers/logOut.php');
$user_identity = $userDetails['id'];



function formatNumber($number, $decimals = 2) {
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
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">

<head>
    <!-- Meta Data -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>TRANSACTION PAGE </title>
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
                    <h1 class="page-title fw-semibold fs-18 mb-0">TRANSACTION</h1>
                    <div class="ms-md-1 ms-0">
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Transaction
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

usort($results, function($a, $b) use ($currentDate) {
    return strtotime($b['date']) - strtotime($a['date']);
});

// Now $results is sorted by date proximity to the current date

$count = 1;
foreach ($results as $row) { 
    // Remove any non-numeric characters from the 'amount' field before formatting
    $amount = floatval(preg_replace('/[^0-9.]/', '', $row['amount']));
    ?>
    <tr>
        <td><?php echo $count; ?></td>
        <td><?php echo $row['source_table']; ?></td>
        <td><?php echo formatNumber($amount, 2); ?></td>
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
</body>

</html>