<?php

;
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.css">
    <script  src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
</head>

<script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script>
        function showToast(message, backgroundColor) {
            Toastify({
                text: message,
                duration: 5000,
                gravity: "top",
                position: "center",
                backgroundColor: backgroundColor,
                stopOnFocus: true,
                className: "custom-toast",
                style: {
                    borderRadius: "10px",
                    boxShadow: "5px 2px 40px -14px black",
                    color: "#fff",
                    fontWeight: "bolder",
                    fontFamily: "calibri"
                }
            }).showToast();
        }
    </script>



<body>
    <?php
if (isset($_POST['kyc_btn'])) {
    
    $firstname = mysqli_real_escape_string($connection, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($connection, $_POST['lastname']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $phonenumber = mysqli_real_escape_string($connection, $_POST['phonenumber']);
    $datebirth = mysqli_real_escape_string($connection, $_POST['datebirth']);
    $city = mysqli_real_escape_string($connection, $_POST['city']);
    $country = mysqli_real_escape_string($connection, $_POST['country']);
    $whoislogin = $_SESSION['id'];

    $check = mysqli_query($connection, "SELECT * FROM `kyc` WHERE `user_id`='$whoislogin' AND (`status`='pending' OR `status`='approved')");

    if (mysqli_num_rows($check)) {
        $message = "You already applied for KYC";
        echo "<script>showToast('$message', 'red');</script>";
    } else {
       
        $target_dir = "../uploads/kyc/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        
        // echo  $firstname . '=>' . $lastname . '=>'. $email .'=>' . $phonenumber . '=>'  .  $datebirth . '=>' . $city . '=>' . $country . '=>' . $whoislogin; ;
        
           
                            
                 if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif" ) {
                        
                         $message = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                         echo "<script>showToast('$message', 'red');</script>";
                        
                }else{
                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                       
                            $image = basename( $_FILES["fileToUpload"]["name"]);
                           

$insert = mysqli_query($connection, "INSERT INTO `kyc`(`user_id`, `firstname`, `lastname`, `email`, `phonenumber`, `datebirth`, `drivinglincense`, `city`, `country`) VALUES ('$whoislogin','$firstname','$lastname','$email','$phonenumber','$datebirth','$image','$city','$country')");
                            if($insert){
                              $message = "Successfully submitted your KYC";
                            echo "<script>showToast('$message', 'green');</script>";
                            }else{
                                echo "<script>alert('fnfnfn');</script>";
                                $message = "Error Occurs .....";
                            echo "<script>showToast('$message', 'red');</script>";
                            }
                        } else {
                            $message = "Sorry, there was an error uploading your file.";
                            echo "<script>showToast('$message', 'red');</script>";
                        }
                }
        
        
    }
}

function showToast($message, $backgroundColor) {
    echo '<script>
            const customToast = Toastify({
                text: "' . $message . '",
                duration: 5000,
                gravity: "top",
                position: "center",
                backgroundColor: "' . $backgroundColor . '",
                stopOnFocus: false,
                className: "custom-toast",
                style: {
                    borderRadius: "10px",
                    boxShadow: "5px 2px 40px -14px black",
                    color: "#fff",
                    fontWeight: "bolder",
                    fontFamily: "calibri"
                }
            }).showToast();
          </script>';
}

    ?>
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
                    <h1 class="page-title fw-semibold fs-18 mb-0">KYC</h1>
                    <div class="ms-md-1 ms-0">
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    kyc
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!-- Page Header Close -->
                <!-- Start::row-1 -->
                <form method="POST" class="row" enctype="multipart/form-data">
                    <div class="col-xl-6">
                        <div  class="card custom-card">
                            <div class="card-header">
                                <div class="card-title">Personal-information</div>
                            </div>

                            <div class="card-body">
                                <label for="formFileSm" class="form-label">Firstname</label>
                                <input type="text" name="firstname" class="form-control form-control-sm" id="" placeholder="john doe">
                            </div>

                            <div class="card-body">
                                <label for="formFileSm" class="form-label">Lastname</label>
                                <input type="text" name="lastname" class="form-control form-control-sm" id="" placeholder="john doe">
                            </div>

                            <div class="card-body">
                                <label for="formFileSm" class="form-label">Email</label>
                                <input type="text" name="email" class="form-control form-control-sm" id="" placeholder="johndoe@gmail.com">
                            </div>

                            <div class="card-body">
                                <label for="formFileSm" class="form-label">Phonenumber</label>
                                <input type="text" name="phonenumber" class="form-control form-control-sm" id="" placeholder="+413 654 765">
                            </div>

                            <div class="card-body">
                                <label for="formFileSm" class="form-label">Date-birth</label>
                                <input type="datetime-local" name="datebirth" class="form-control form-control-sm" id="">
                            </div>

                            <div class="card-body">
                                <label for="formFileSm" class="form-label">Any Valid ID</label>
                                <input type="file" name="fileToUpload" class="form-control form-control-sm" id="formFileSm">
                            </div>



                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div action="./controllers/uploadPassport.php" method="POST" enctype="multipart/form-data" class="card custom-card">
                            <div class="card-header">
                                <div class="card-title">Address-information</div>
                            </div>

                            <div class="card-body">
                                <label for="formFileSm" class="form-label">City</label>
                                <input type="text" name="city" class="form-control form-control-sm" id="" placeholder="cape-town">
                            </div>

                            <div class="card-body">
                                <label for="formFileSm" class="form-label">Country</label>
                                <input type="text" name="country" class="form-control form-control-sm" id="" placeholder="American">
                            </div>

                            <div class="card-body">
                                <button class="btn btn-primary" name="kyc_btn" type="submit">Summit</button>
                            </div>


                            <!-- <div class="card-body">
                                    <span class="badge bg-secondary-transparent px-3 py-3">UPLOADED</span>
                                </div> -->


                            <!-- <div class="card-body">
                                    <span class="badge bg-warning-transparent px-3 py-3">PENDING</span>
                                </div> -->

                        </div>
                    </div>

                </form>

                <!--End::row-1 -->
            </div>
        </div>

        <!-- End::app-content -->
        <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="input-group">
                            <a href="javascript:void(0);" class="input-group-text" id="Search-Grid"><i class="fe fe-search header-link-icon fs-18"></i></a>
                            <input type="search" class="form-control border-0 px-2" placeholder="Search" aria-label="Username" />
                            <a href="javascript:void(0);" class="input-group-text" id="voice-search"><i class="fe fe-mic header-link-icon"></i></a>
                            <a href="javascript:void(0);" class="btn btn-light btn-icon" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fe fe-more-vertical"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider" />
                                </li>
                                <li><a class="dropdown-item" href="#">Separated link</a></li>
                            </ul>
                        </div>
                        <div class="mt-4">
                            <p class="font-weight-semibold text-muted mb-2">
                                Are You Looking For...
                            </p>
                            <span class="search-tags"><i class="fe fe-user me-2"></i>People<a href="javascript:void(0)" class="tag-addon"><i class="fe fe-x"></i></a></span>
                            <span class="search-tags"><i class="fe fe-file-text me-2"></i>Pages<a href="javascript:void(0)" class="tag-addon"><i class="fe fe-x"></i></a></span>
                            <span class="search-tags"><i class="fe fe-align-left me-2"></i>Articles<a href="javascript:void(0)" class="tag-addon"><i class="fe fe-x"></i></a></span>
                            <span class="search-tags"><i class="fe fe-server me-2"></i>Tags<a href="javascript:void(0)" class="tag-addon"><i class="fe fe-x"></i></a></span>
                        </div>
                        <div class="my-4">
                            <p class="font-weight-semibold text-muted mb-2">
                                Recent Search :
                            </p>
                            <div class="p-2 border br-5 d-flex align-items-center text-muted mb-2 alert">
                                <a href="notifications.html"><span>Notifications</span></a>
                                <a class="ms-auto lh-1" href="javascript:void(0);" data-bs-dismiss="alert" aria-label="Close"><i class="fe fe-x text-muted"></i></a>
                            </div>
                            <div class="p-2 border br-5 d-flex align-items-center text-muted mb-2 alert">
                                <a href="alerts.html"><span>Alerts</span></a>
                                <a class="ms-auto lh-1" href="javascript:void(0);" data-bs-dismiss="alert" aria-label="Close"><i class="fe fe-x text-muted"></i></a>
                            </div>
                            <div class="p-2 border br-5 d-flex align-items-center text-muted mb-0 alert">
                                <a href="mail.html"><span>Mail</span></a>
                                <a class="ms-auto lh-1" href="javascript:void(0);" data-bs-dismiss="alert" aria-label="Close"><i class="fe fe-x text-muted"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="btn-group ms-auto">
                            <button class="btn btn-sm btn-primary-light">Search</button>
                            <button class="btn btn-sm btn-primary">Clear Recents</button>
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