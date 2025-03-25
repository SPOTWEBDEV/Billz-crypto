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
?>

<?php 

$sql = mysqli_query($connection,"SELECT sum(amount) AS trading_balance FROM investments where user_id = '$user_identity'");

while($row = mysqli_fetch_array($sql)){
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
        <div class="main-content app-content">
            <div class="container-fluid">
                <!-- Page Header -->
                <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
                    <h1 class="page-title fw-semibold fs-18 mb-0">DAHSBOARD</h1>
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
                <?php if($userDetails['account_warning'] == 'yes'){ ?>
          <div class="alert alert-danger text-center"><span class="spinner-grow text-danger spinner-grow-sm"></span> Account warning, please contact support</div>
        <?php } ?>
                <div class="row">
                    <div class="col-xxl-9">
                        <div class="row justify-content-center">

               

                    <!-- DIS ONE NAH FOR RECENT TRANSACTIONS -->
                            <div class="col-xxl-4 col-xl-5">
                                <div class="card custom-card">
                                    <div class="card-header justify-content-between">
                                        <div class="card-title">Referral link</div>
                                        
                                    </div>
                                    <div class="card-body">
                                        
                                                <ul class="list-unstyled mb-0">
                                                    <li class="mb-3">
                                                        <a href="javascript:void(0);">
                                                            <div class="">
                                                                <div class="">

                                                                    <p>Invite your friend to register with us and earn referral bonuses</p>

                                                                    <div>
                                                                        <input type="text" name="" id="copyText" class="form-control" value="<?php echo $domain ?>app/register.php?ref=<?php echo $userDetails['ref_id'] ?>" readonly><br>

                                                                        <button class="btn btn-primary w-100" onclick="copy_this()">Copy</button>
                                                                    </div>
                                                                    
                                                                </div>
                                                                
                                                            </div>
                                                        </a>
                                                    </li>

                                                </ul>
                                            
                                    </div>
                                </div>
                            </div>
                            <!-- SEE RECENT TRANSACTION DON FINISH -->
                        </div>
                    </div>

                    <script type="text/javascript">
    function copy_this() {
  /* Get the text field */
  var copyText = document.getElementById("copyText");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /* For mobile devices */

   /* Copy the text inside the text field */
  document.execCommand("copy");

  /* Alert the copied text */
  alert("Copied");
}
  </script>


                   
                </div>
                <!--End::row-1 -->

                
            </div>
            <!-- End::app-content -->

            <?php
            include('./includes/hoverfooter.php')
            ?>
            <!-- Footer Start -->
            <!-- <footer class="footer mt-auto py-3 bg-white text-center">
                <div class="container">
                    <span class="text-muted">
                        Copyright © <span id="year"></span>
                        <a href="javascript:void(0);">
                            <span class="fw-semibold text-primary text-decoration-underline">Wealthsomething go enter here remember ooo werey</span>
                        </a>
                        All rights reserved
                    </span>
                </div>
            </footer> -->
            <!-- Footer End -->
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