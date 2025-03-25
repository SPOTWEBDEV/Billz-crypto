<?php
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
    <title>SECURITY</title>
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

        <?php

if (isset($_POST['upd_hash'])) {
    $old = $_POST['old'];
    $new = $_POST['new'];
    $new_rep = $_POST['new_rep'];

    if ($old == $userDetails['password']) {
        if (!empty($old) && !empty($new) && !empty($new_rep) && $new == $new_rep) {
            $update_current_user = mysqli_query($connection, "UPDATE `users` SET `password`='$new' WHERE `id` =  $id");
            if ($update_current_user) {
                echo "<script> window.location.href = './profile.php' </script>";
            } else {
                echo "<script>Swal.fire('Edit Password Error','Smething went wrong on the server','error')</script>";
                echo "<script>setTimeout( ()=> { window.location.href = './update_hash.php' }, 4000)</script>";
            }
        }
    } else {
        
        echo "<script>Swal.fire('Edit Password Error','Password Mismatch','error')</script>";
                echo "<script>setTimeout( ()=> { window.location.href = './update_hash.php' }, 4000)</script>";
    }
}



        ?>

        <!-- End::app-sidebar -->
        <!-- Start::app-content -->
        <div class="main-content app-content">
            <div class="container-fluid">
                <!-- Page Header -->
                <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
                    <h1 class="page-title fw-semibold fs-18 mb-0">SECURITY</h1>
                    <div class="ms-md-1 ms-0">
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Security
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
                                <div class="card-title"> Update Password </div>
                                <div class="prism-toggle">
                                </div>
                            </div>
                            <form method="POST" class="card-body">

                                <div class="form-floating mb-3">
                                    <input type="text" name="old" class="form-control" id="floatingInput" placeholder="amount sent">
                                    <label for="floatingInput">Old Password</label>
                                </div>
                                <div class="form-floating mt-3">
                                    <input type="text" name="new" class="form-control" id="floatingInput" placeholder="Your Wallet Address">
                                    <label for="floatingInput">New Password</label>
                                </div>
                                <div class="form-floating mt-3">
                                    <input type="text" name="new_rep" class="form-control" id="floatingInput" placeholder="Your Wallet Address">
                                    <label for="floatingInput">Repeat New Password</label>
                                </div>

                                <div class="form-floating mt-3">
                                    <button class="btn btn-primary" name="upd_hash" type="submit">CHANGE ACCOUNT PASSWORD</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <?php
                for ($br = 0; $br < 20; $br++) {
                    echo "<br>";
                }
                ?>
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