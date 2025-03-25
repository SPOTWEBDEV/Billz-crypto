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
    <title>ADD INVESTMENT</title>
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
                    <h1 class="page-title fw-semibold fs-18 mb-0">Investment</h1>
                    <div class="ms-md-1 ms-0">
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Investment
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!-- Page Header Close -->
                <!-- Start::row-1 -->

                <div class="row">

                    <form action="./controllers/investCTR.php" method="POST" class="col-xxl-3 col-sm-6">
                        <div class="card custom-card">
                            <div class="card-body">
                                <div class="d-flex align-items-top justify-content-between mb-4">
                                    <div class="flex-fill d-flex align-items-top">
                                        <div class="me-2">
                                            <span class="avatar avatar-md text-secondary border bg-light"><i class="ti ti-user-circle fs-18"></i></span>
                                        </div>
                                        <div class="flex-fill">
                                            <p class="fw-semibold fs-14 mb-0"> STARTER PLAN / STAGE</p>
                                            <p class="mb-0 text-muted fs-12 op-7">5 days</p>
                                        </div>
                                    </div>
                                </div>


                                <input type="hidden" name="plan" value="Starter Plan">
                                <input type="hidden" name="percent" value="10">
                                <input type="hidden" name="duration" value="5 days">
                                <input type="hidden" name="email" value="<?php echo $userDetails['email'] ?>">
                                <label for="input-label" class="form-label">Plan Amount</label>
                                <div class="d-flex align-items-center mb-0">
                                    <p class="mb-0 fs-20 fw-semibold">$50</p>
                                    <span class="text-muted ms-2">
                                        <i class="ti ti-arrow-up align-middle text-success me-1 d-inline-block"></i>$500
                                    </span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="flex-fill">
                                        <div class="progress progress-xs">
                                            <div class="progress-bar bg-secondary" role="progressbar" style="width: 10%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="ms-3"> <span class="fs-12 text-muted">10%</span> </div>
                                </div>
                                <input type="text" name="amount" onkeyup="checkstarter(this)" placeholder="Enter Amount" class="form-control" id="input-label">
                                <p class="text-danger"></p>
                                <div class="form-floating mt-3">
                                    <button class="btn btn-secondary" id="checkbasic_btn" onclick="return confirm('SURE TO ACTIVATE')" style="width: 100%" name="makeInvestment" type="submit" disabled>ACTIVATE</button>
                                </div>
                            </div>
                        </div>
                        <script>
                            const btnchild = document.querySelector('#checkbasic_btn');

                            function checkstarter(amount) {


                                const error = amount.nextElementSibling;
                                if (amount.value >= 50 && amount.value <= 500) {
                                    btnchild.removeAttribute("disabled");
                                    error.innerHTML = '';
                                } else {
                                    btnchild.setAttribute("disabled", "");
                                    error.innerHTML = 'Amount range Missmatch';
                                }
                            }
                        </script>
                    </form>
                    <form action="./controllers/investCTR.php" method="POST" class="col-xxl-3 col-sm-6">
                        <div class="card custom-card">
                            <div class="card-body">
                                <div class="d-flex align-items-top justify-content-between mb-4">
                                    <div class="flex-fill d-flex align-items-top">
                                        <div class="me-2">
                                            <span class="avatar avatar-md text-secondary border bg-light"><i class="ti ti-user-circle fs-18"></i></span>
                                        </div>
                                        <div class="flex-fill">
                                            <p class="fw-semibold fs-14 mb-0">PROFESSIONAL PLAN / STAGE</p>
                                            <p class="mb-0 text-muted fs-12 op-7">7 days</p>
                                        </div>
                                    </div>

                                </div>

                                <input type="hidden" name="plan" value="Professional  Plan">
                                <input type="hidden" name="percent" value="15">
                                <input type="hidden" name="duration" value="7 days">
                                <input type="hidden" name="email" value="<?php echo $userDetails['email'] ?>">
                                <label for="input-label" class="form-label">Plan Amount</label>
                                <div class="d-flex align-items-center mb-0">
                                    <p class="mb-0 fs-20 fw-semibold">$200</p>
                                    <span class="text-muted ms-2">
                                        <i class="ti ti-arrow-up align-middle text-success me-1 d-inline-block"></i>$1000
                                    </span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="flex-fill">
                                        <div class="progress progress-xs">
                                            <div class="progress-bar bg-secondary" role="progressbar" style="width: 15%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="ms-3"> <span class="fs-12 text-muted">15</span> </div>
                                </div>
                                <input type="text" name="amount" onkeyup="standard(this)" class="form-control" id="input-label" placeholder="Enter Amount">
                                <p class="text-danger"></p>
                                <div class="form-floating mt-3">
                                    <button class="btn btn-secondary" id="standard_btn" onclick="return confirm('CONFIRM TO ACTIVATE')" style="width: 100%" name="makeInvestment" type="submit" disabled>ACTIVATE</button>
                                </div>
                            </div>
                        </div>
                        <script>
                            const btnStandard = document.querySelector('#standard_btn');

                            function standard(amount) {


                                const error = amount.nextElementSibling;
                                if (amount.value >= 200 && amount.value <= 1000) {
                                    btnStandard.removeAttribute("disabled");
                                    error.innerHTML = '';
                                } else {
                                    btnStandard.setAttribute("disabled", "");
                                    error.innerHTML = 'Amount range Error';
                                }
                            }
                        </script>
                    </form>
                    <form action="./controllers/investCTR.php" method="POST" class="col-xxl-3 col-sm-6">
                        <div class="card custom-card">
                            <div class="card-body">
                                <div class="d-flex align-items-top justify-content-between mb-4">
                                    <div class="flex-fill d-flex align-items-top">
                                        <div class="me-2">
                                            <span class="avatar avatar-md text-secondary border bg-light"><i class="ti ti-user-circle fs-18"></i></span>
                                        </div>
                                        <div class="flex-fill">
                                            <p class="fw-semibold fs-14 mb-0"> EXECUTIVE PLAN / STAGE</p>
                                            <p class="mb-0 text-muted fs-12 op-7">7 days</p>
                                        </div>
                                    </div>
                                </div>


                                <input type="hidden" name="plan" value="Executive  Plan">
                                <input type="hidden" name="percent" value="40">
                                <input type="hidden" name="duration" value="7 days">
                                <input type="hidden" name="email" value="<?php echo $userDetails['email'] ?>">
                                <label for="input-label" class="form-label">Plan Amount</label>
                                <div class="d-flex align-items-center mb-0">
                                    <p class="mb-0 fs-20 fw-semibold">$1,500</p>
                                    <span class="text-muted ms-2">
                                        <i class="ti ti-arrow-up align-middle text-success me-1 d-inline-block"></i>$5000
                                    </span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="flex-fill">
                                        <div class="progress progress-xs">
                                            <div class="progress-bar bg-secondary" role="progressbar" style="width: 8.3%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="ms-3"> <span class="fs-12 text-muted">40%</span> </div>
                                </div>
                                <input type="text" name="amount" onkeyup="Advance(this)" placeholder="Enter Amount" class="form-control" id="input-label">
                                <p class="text-danger"></p>
                                <div class="form-floating mt-3">
                                    <button class="btn btn-secondary" id="btnSecondary" onclick="return confirm('SURE TO ACTIVATE')" style="width: 100%" name="makeInvestment" type="submit" disabled>ACTIVATE</button>
                                </div>
                            </div>
                        </div>
                        <script>
                            const btnSecondary = document.querySelector('#btnSecondary');

                            function Advance(amount) {
                                const error = amount.nextElementSibling;
                                if (amount.value >= 1500 && amount.value <= 5000) {
                                    btnSecondary.removeAttribute("disabled");
                                    error.innerHTML = '';
                                } else {
                                    btnSecondary.setAttribute("disabled", "");
                                    error.innerHTML = 'Amount range Missmatch';
                                }
                            }
                        </script>
                    </form>
                    <form action="./controllers/investCTR.php" method="POST" class="col-xxl-3 col-sm-6">
                        <div class="card custom-card">
                            <div class="card-body">
                                <div class="d-flex align-items-top justify-content-between mb-4">
                                    <div class="flex-fill d-flex align-items-top">
                                        <div class="me-2">
                                            <span class="avatar avatar-md text-secondary border bg-light"><i class="ti ti-user-circle fs-18"></i></span>
                                        </div>
                                        <div class="flex-fill">
                                            <p class="fw-semibold fs-14 mb-0">PLATINUM PLAN/PACKAGES
                                            </p>
                                            <p class="mb-0 text-muted fs-12 op-7">30 days</p>
                                        </div>
                                    </div>

                                </div>


                                <input type="hidden" name="plan" value="Platinum  Plan">
                                <input type="hidden" name="percent" value="80">
                                <input type="hidden" name="duration" value="14 days">
                                <input type="hidden" name="email" value="<?php echo $userDetails['email'] ?>">
                                <label for="input-label" class="form-label">Plan Amount</label>
                                <div class="d-flex align-items-center mb-0">
                                    <p class="mb-0 fs-20 fw-semibold">$2,500</p>
                                    <span class="text-muted ms-2">
                                        <i class="ti ti-arrow-up align-middle text-success me-1 d-inline-block"></i>
                                    </span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="flex-fill">
                                        <div class="progress progress-xs">
                                            <div class="progress-bar bg-secondary" role="progressbar" style="width: 80%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="ms-3"> <span class="fs-12 text-muted">80%</span> </div>
                                </div>
                                <input type="text" name="amount" onkeyup="Silvers(this)" placeholder="Enter Amount" class="form-control" id="input-label">
                                <p class="text-danger"></p>
                                <div class="form-floating mt-3">
                                    <button class="btn btn-secondary" id="btnAdvanced" onclick="return confirm('SURE TO ACTIVATE')" style="width: 100%" name="makeInvestment" type="submit" disabled>ACTIVATE</button>
                                </div>
                            </div>
                        </div>
                        <script>
                            const btnAdvanced = document.querySelector('#btnAdvanced');

                            function Silvers(amount) {
                                const error = amount.nextElementSibling;
                                console.log(amount.value);
                                console.log('expert');
                                if (amount.value >= 2500) {
                                    btnAdvanced.removeAttribute("disabled");
                                    error.innerHTML = '';
                                } else {
                                    btnAdvanced.setAttribute("disabled", "");
                                    error.innerHTML = 'Amount range Missmatch';
                                }
                            }
                        </script>
                    </form>
                    



                </div>
                <!--End::row-1 -->
            </div>
        </div>
        <!-- End::app-content -->


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