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
?>

<!DOCTYPE html>
<!-- saved from url=(0014)about:internet -->
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">

<head>
    <!-- Meta Data -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>INVESTMENT HISTORY</title>
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
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.countdown/2.2.0/jquery.countdown.js" integrity="sha512-aWlTsIGUhEq2+LQNA7Wq+OsLaouCcGGaHBWzoU9duKy26ImHe12gRtQnj4688p7QUHG+J4CMb+XwgZ8LYqQ+kQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
                    <h1 class="page-title fw-semibold fs-18 mb-0">INVESTMENTS</h1>
                    <div class="ms-md-1 ms-0">
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Investements
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
                                    <!--<th scope="col">ACCOUNT HOLDER</th>-->
                                    <th scope="col">INVESTMENT PLAN</th>
                                    <th scope="col">INVESTED</th>
                                    <th scope="col">TO BE EARNING DAILY</th>
                                    <th scope="col">ACCUMULATED EARNING</th>
                                    <th scope="col">TOTAL PROFIT</th>
                                    <th scope="col">INVESTED DATE</th>
                                    <th scope="col">END ON</th>
                                    <th scope="col">DATE</th>
                                    <th scope="col">STATUS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = mysqli_query($connection, "SELECT * FROM `investments` WHERE `user_id` = '$id'");
                                if (mysqli_num_rows($sql)) {
                                    $count = 1;
                                    while ($details = mysqli_fetch_assoc($sql)) {
                                ?>
                                        <tr>
                                            <!--<td>-->
                                            <!--    <span class="avatar avatar-xs me-2 online avatar-rounded">-->
                                            <!--        <img src="./assets/images/faces/13.jpg" alt="img">-->
                                            <!--    </span><?php echo $_SESSION['name'] ?>-->
                                                <!-- <th scope="row">Harshrath</th> -->
                                            <!--</td>-->
                                            <td><?php echo $details['plan'] ?></td>
                                            <td>$<?php echo number_format($details['amount']) ?></td>
                                            <td><span class="badge bg-success-transparent">$<?php echo number_format($details['profit'],2) ?></span></td>
                                            <td>
                                                <div>
                                                    <span class="badge bg-success-transparent">$<?php echo $details['profit'] * $details['number_of_day']  ?></span>
                                                    <span class="badge bg-info-transparent"><?php echo $details['number_of_day'] . ' Days' ?></span>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-success-transparent">$<?php echo number_format($details['total'],2) ?></span></td>
                                            <td><?php echo $details['date_invested'] ?></td>
                                            <td><?php echo $details['date_to_mature'] ?></td>
                                            <td><?php echo $details['ends_on'] ?></td>
                                            
                                            <!--<td class="myDiv" data-date="<?php echo $details['ends_on'] ?>"></td>-->

                                            <td>
                                                <?php
                                                if ($details['status'] == 1) {
                                                    echo '<span class="badge bg-success-transparent ms-2">DONE</span>';
                                                } else {
                                                    echo '<span class="badge bg-warning-transparent ms-2">RUNNING</span>';
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
        <?php
        for ($br = 0; $br < 20; $br++) {
            echo "<br>";
        }
        ?>
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
    <script>
    
   $('.myDiv').each(function() {
    var dateAttributeValue = $(this).attr('data-date');

    $(this).countdown(dateAttributeValue, function(event) {
        if (event.elapsed) { 
            $(this).text('Investment period ended');
        } else {
            $(this).text(event.strftime('%D days %H:%M:%S'));
        }
    });
});

    </script>
</body>

</html>