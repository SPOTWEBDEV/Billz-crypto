<?php
;
include('../server/connection.php');
include('controllers/authFy.php');
// PREPARE USERS DETAILS;
include('controllers/userDetails.php');
//  FOR INVESTMENT MATURITY
include('controllers/invMTR_CTR.php');
// Log out the mother force;
include('controllers/logOut.php');


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
<html data-theme-mode='dark'  data-header-styles='dark' data-menu-styles='dark'  >

<head>
    <!-- Meta Data -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>EMPTY PAGE BRUH</title>
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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

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
                    <h1 class="page-title fw-semibold fs-18 mb-0">WITHDRAWALS</h1>
                    <div class="ms-md-1 ms-0">
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Withdrawals
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
                                    <th scope="col">S/N</th>
                                    <th scope="col">ACCOUNT HOLDER</th>
                                    <th scope="col">AMOUNT</th>
                                    <th scope="col">WITHDRAWN TO</th>
                                    <th scope="col">CHANNEL</th>
                                    <th scope="col">WITHDRAWN ON</th>
                                    <th scope="col">STATUS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = mysqli_query($connection, "SELECT * FROM withdrawals,users WHERE withdrawals.user_id = '$id' and users.id = '$id' ");
                                if (mysqli_num_rows($sql)) {
                                    $count = 1;
                                    while ($details = mysqli_fetch_assoc($sql)) {
                                ?>
                                        <tr>
                                            <td><?php echo $count ?></td>
                                            <td>
                                                <span class="avatar avatar-xs me-2 online avatar-rounded">
                                                    <img src="./assets/images/faces/13.jpg" alt="img">
                                                </span><?php  echo $details['name'] ?>
                                                <!-- <th scope="row">Harshrath</th> -->
                                            </td>
                                            <td><span class="badge bg-success-transparent">$<?php echo formatNumber($details['amount']) ?></span></td>
                                            <td>$<?php echo $details['wallet_addr'] ?></td>
                                            <td><?php echo $details['method'] ?></td>
                                            <td><?php echo $details['date_withdrawn'] ?></td>

                                            <td>
                                                <?php
                                                if ($details['status'] == 1) {
                                                    echo '<span class="badge bg-success-transparent ms-2">APPROVED</span>';
                                                } else if ($details['status'] == 2) {
                                                    echo '<span class="badge bg-warning-transparent ms-2">DECLINED</span>';
                                                } else {
                                                    echo '<span class="badge bg-warning-transparent ms-2">PENDING</span>';
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                <?php
                                        $count++;
                                    }
                                } else {
                                    echo "<tr> 
                                    <td colspan='7'> 
                                    <span class='badge bg-danger-transparent'> NO DATA </span>
                                    </td>
                                    </tr>";
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
        <script src="./assets/js/wallet.js"></script>
</body>

</html>