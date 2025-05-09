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
<html data-theme-mode='dark' data-header-styles='dark' data-menu-styles='dark'>

<head>
    <!-- Meta Data -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>ADD INVESTMENT</title>
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
                                            <span class="avatar avatar-md text-secondary border bg-light"><i
                                                    class="ti ti-user-circle fs-18"></i></span>
                                        </div>
                                        <div class="flex-fill">
                                            <p class="fw-semibold fs-14 mb-0"> BASIC PLAN</p>
                                            <p class="mb-0 text-muted fs-12 op-7">3 days</p>
                                        </div>
                                    </div>
                                </div>


                                <input type="hidden" name="plan" value="basic Plan">
                                <input type="hidden" name="percent" value="50">
                                <input type="hidden" name="duration" value="3 days">
                                <input type="hidden" name="email" value="<?php echo $userDetails['email'] ?>">
                                <label for="input-label" class="form-label">Plan Amount</label>
                                <div class="d-flex align-items-center mb-0">
                                    <span class="text-muted ms-2">
                                        <i class="ti ti-arrow-down align-middle text-danger me-1 d-inline-block"></i>
                                    </span>
                                    <p class="mb-0 fs-20 fw-semibold">$100</p>
                                    <span class="text-muted ms-2">
                                        <i class="ti ti-arrow-up align-middle text-success me-1 d-inline-block"></i>
                                    </span>
                                    <p class="mb-0 fs-20 fw-semibold">$150</p>
                                    

                                </div>
                                <p class="text-success mb-0 fs-14">Total After 3 Days: $250</p>
                                <div class="d-flex align-items-center">
                                    <div class="flex-fill">
                                        <div class="progress progress-xs">
                                            <div class="progress-bar bg-secondary" role="progressbar" style="width: 50%"
                                                aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="ms-3"> <span class="fs-12 text-muted">50%</span> </div>
                                </div>
                                <input type="text" name="amount" onkeyup="checkstarter(this)" placeholder="Enter Amount"
                                    class="form-control" id="input-label">
                                <p class="text-danger"></p>
                                <div class="form-floating mt-3">
                                    <button class="btn btn-secondary" id="checkbasic_btn"
                                        onclick="return confirm('SURE TO ACTIVATE')" style="width: 100%"
                                        name="makeInvestment" type="submit" disabled>ACTIVATE</button>
                                </div>
                            </div>
                        </div>
                        <script>
                        const btnchild = document.querySelector('#checkbasic_btn');

                        function checkstarter(amount) {


                            const error = amount.nextElementSibling;
                            if (amount.value == 100) {
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
                                            <span class="avatar avatar-md text-secondary border bg-light"><i
                                                    class="ti ti-user-circle fs-18"></i></span>
                                        </div>
                                        <div class="flex-fill">
                                            <p class="fw-semibold fs-14 mb-0">SILVER PLAN</p>
                                            <p class="mb-0 text-muted fs-12 op-7">3 days</p>
                                        </div>
                                    </div>

                                </div>

                                <input type="hidden" name="plan" value="silver Plan">
                                <input type="hidden" name="percent" value="50">
                                <input type="hidden" name="duration" value="3 days">
                                <input type="hidden" name="email" value="<?php echo $userDetails['email'] ?>">
                                <label for="input-label" class="form-label">Plan Amount</label>
                                
                                <div class="d-flex align-items-center mb-0">
                                    <span class="text-muted ms-2">
                                        <i class="ti ti-arrow-down align-middle text-danger me-1 d-inline-block"></i>
                                    </span>
                                    <p class="mb-0 fs-20 fw-semibold">$200</p>
                                    <span class="text-muted ms-2">
                                        <i class="ti ti-arrow-up align-middle text-success me-1 d-inline-block"></i>
                                    </span>
                                    <p class="mb-0 fs-20 fw-semibold">$300</p>
                                    

                                </div>
                                <p class="text-success mb-0 fs-14">Total After 3 Days: $500</p>
                                <div class="d-flex align-items-center">
                                    <div class="flex-fill">
                                        <div class="progress progress-xs">
                                            <div class="progress-bar bg-secondary" role="progressbar" style="width: 50%"
                                                aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="ms-3"> <span class="fs-12 text-muted">50%</span> </div>
                                </div>
                                <input type="text" name="amount" onkeyup="standard(this)" class="form-control"
                                    id="input-label" placeholder="Enter Amount">
                                <p class="text-danger"></p>
                                <div class="form-floating mt-3">
                                    <button class="btn btn-secondary" id="standard_btn"
                                        onclick="return confirm('CONFIRM TO ACTIVATE')" style="width: 100%"
                                        name="makeInvestment" type="submit" disabled>ACTIVATE</button>
                                </div>
                            </div>
                        </div>
                        <script>
                        const btnStandard = document.querySelector('#standard_btn');

                        function standard(amount) {


                            const error = amount.nextElementSibling;
                            if (amount.value == 200) {
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
                                            <span class="avatar avatar-md text-secondary border bg-light"><i
                                                    class="ti ti-user-circle fs-18"></i></span>
                                        </div>
                                        <div class="flex-fill">
                                            <p class="fw-semibold fs-14 mb-0"> GOLD PLAN</p>
                                            <p class="mb-0 text-muted fs-12 op-7">3 days</p>
                                        </div>
                                    </div>
                                </div>


                                <input type="hidden" name="plan" value="gold Plan">
                                <input type="hidden" name="percent" value="50">
                                <input type="hidden" name="duration" value="3 days">
                                <input type="hidden" name="email" value="<?php echo $userDetails['email'] ?>">
                                <label for="input-label" class="form-label">Plan Amount</label>
                                <div class="d-flex align-items-center mb-0">
                                    <span class="text-muted ms-2">
                                        <i class="ti ti-arrow-down align-middle text-danger me-1 d-inline-block"></i>
                                    </span>
                                    <p class="mb-0 fs-20 fw-semibold">$500</p>
                                    <span class="text-muted ms-2">
                                        <i class="ti ti-arrow-up align-middle text-success me-1 d-inline-block"></i>
                                    </span>
                                    <p class="mb-0 fs-20 fw-semibold">$750</p>
                                    

                                </div>
                                <p class="text-success mb-0 fs-14">Total After 3 Days: $1,250</p>



                                <div class="d-flex align-items-center">
                                    <div class="flex-fill">
                                        <div class="progress progress-xs">
                                            <div class="progress-bar bg-secondary" role="progressbar" style="width: 50%"
                                                aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="ms-3"> <span class="fs-12 text-muted">50%</span> </div>
                                </div>
                                <input type="text" name="amount" onkeyup="Advance(this)" placeholder="Enter Amount"
                                    class="form-control" id="input-label">
                                <p class="text-danger"></p>
                                <div class="form-floating mt-3">
                                    <button class="btn btn-secondary" id="btnSecondary"
                                        onclick="return confirm('SURE TO ACTIVATE')" style="width: 100%"
                                        name="makeInvestment" type="submit" disabled>ACTIVATE</button>
                                </div>
                            </div>
                        </div>
                        <script>
                        const btnSecondary = document.querySelector('#btnSecondary');

                        function Advance(amount) {
                            const error = amount.nextElementSibling;
                            if (amount.value == 500) {
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
                                            <span class="avatar avatar-md text-secondary border bg-light"><i
                                                    class="ti ti-user-circle fs-18"></i></span>
                                        </div>
                                        <div class="flex-fill">
                                            <p class="fw-semibold fs-14 mb-0">PLATINUM PLAN
                                            </p>
                                            <p class="mb-0 text-muted fs-12 op-7">3 days</p>
                                        </div>
                                    </div>

                                </div>


                                <input type="hidden" name="plan" value="Platinum Plan">
                                <input type="hidden" name="percent" value="50">
                                <input type="hidden" name="duration" value="3 days">
                                <input type="hidden" name="email" value="<?php echo $userDetails['email'] ?>">
                                <label for="input-label" class="form-label">Plan Amount</label>
                                


                                <div class="d-flex align-items-center mb-0">
                                    <span class="text-muted ms-2">
                                        <i class="ti ti-arrow-down align-middle text-danger me-1 d-inline-block"></i>
                                    </span>
                                    <p class="mb-0 fs-20 fw-semibold">$1,000</p>
                                    <span class="text-muted ms-2">
                                        <i class="ti ti-arrow-up align-middle text-success me-1 d-inline-block"></i>
                                    </span>
                                    <p class="mb-0 fs-20 fw-semibold">$1,050</p>
                                    

                                </div>
                                <p class="text-success mb-0 fs-14">Total After 3 Days: $2,050</p>





                                <div class="d-flex align-items-center">
                                    <div class="flex-fill">
                                        <div class="progress progress-xs">
                                            <div class="progress-bar bg-secondary" role="progressbar" style="width: 50%"
                                                aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="ms-3"> <span class="fs-12 text-muted">50%</span> </div>
                                </div>
                                <input type="text" name="amount" onkeyup="Silvers(this)" placeholder="Enter Amount"
                                    class="form-control" id="input-label">
                                <p class="text-danger"></p>
                                <div class="form-floating mt-3">
                                    <button class="btn btn-secondary" id="btnAdvanced"
                                        onclick="return confirm('SURE TO ACTIVATE')" style="width: 100%"
                                        name="makeInvestment" type="submit" disabled>ACTIVATE</button>
                                </div>
                            </div>
                        </div>
                        <script>
                        const btnAdvanced = document.querySelector('#btnAdvanced');

                        function Silvers(amount) {
                            const error = amount.nextElementSibling;
                            console.log(amount.value);
                            console.log('expert');
                            if (amount.value == 1000) {
                                btnAdvanced.removeAttribute("disabled");
                                error.innerHTML = '';
                            } else {
                                btnAdvanced.setAttribute("disabled", "");
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
                                            <span class="avatar avatar-md text-secondary border bg-light"><i
                                                    class="ti ti-user-circle fs-18"></i></span>
                                        </div>
                                        <div class="flex-fill">
                                            <p class="fw-semibold fs-14 mb-0">PRIME PLAN
                                            </p>
                                            <p class="mb-0 text-muted fs-12 op-7">3 days</p>
                                        </div>
                                    </div>

                                </div>


                                <input type="hidden" name="plan" value="Platinum Plan">
                                <input type="hidden" name="percent" value="50">
                                <input type="hidden" name="duration" value="3 days">
                                <input type="hidden" name="email" value="<?php echo $userDetails['email'] ?>">
                                <label for="input-label" class="form-label">Plan Amount</label>
                            


                                <div class="d-flex align-items-center mb-0">
                                    <span class="text-muted ms-2">
                                        <i class="ti ti-arrow-down align-middle text-danger me-1 d-inline-block"></i>
                                    </span>
                                    <p class="mb-0 fs-20 fw-semibold">$5,000</p>
                                    <span class="text-muted ms-2">
                                        <i class="ti ti-arrow-up align-middle text-success me-1 d-inline-block"></i>
                                    </span>
                                    <p class="mb-0 fs-20 fw-semibold">$7,500</p>
                                    

                                </div>
                                <p class="text-success mb-0 fs-14">Total After 3 Days: $12,500</p>




                                <div class="d-flex align-items-center">
                                    <div class="flex-fill">
                                        <div class="progress progress-xs">
                                            <div class="progress-bar bg-secondary" role="progressbar" style="width: 50%"
                                                aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="ms-3"> <span class="fs-12 text-muted">50%</span> </div>
                                </div>
                                <input type="text" name="amount" onkeyup="Silvers(this)" placeholder="Enter Amount"
                                    class="form-control" id="input-label">
                                <p class="text-danger"></p>
                                <div class="form-floating mt-3">
                                    <button class="btn btn-secondary" id="btnAdvanced"
                                        onclick="return confirm('SURE TO ACTIVATE')" style="width: 100%"
                                        name="makeInvestment" type="submit" disabled>ACTIVATE</button>
                                </div>
                            </div>
                        </div>
                        <script>
                        const btnAdvanced = document.querySelector('#btnAdvanced');

                        function Silvers(amount) {
                            const error = amount.nextElementSibling;
                            console.log(amount.value);
                            console.log('expert');
                            if (amount.value == 5000) {
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
        <script src="./assets/js/wallet.js"></script>
</body>

</html>