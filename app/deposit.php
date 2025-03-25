<?php
include('../server/connection.php');
include('controllers/authFy.php');
// PREPARE USERS DETAILS;
include('controllers/userDetails.php');

//  FOR INVESTMENT MATURITY
// include('controllers/invMTR_CTR.php');
// Log out the mother force;
include('controllers/logOut.php');

// include('controllers/investCTR.php');







?>

<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">

<head>
    <!-- Meta Data -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Deposit</title>
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

    <script src="./jquery-3.6.0.min.js"></script>
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

        <!-- End::app-sidebar -->
        <!-- Start::app-content -->

        <div class="main-content app-content">
            <div class="container-fluid">
                <!-- Page Header -->
                <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
                    <h1 class="page-title fw-semibold fs-18 mb-0">DEPOSIT</h1>
                    <div class="ms-md-1 ms-0">
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Deposit
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!-- Page Header Close -->
                <!-- Start::row-1 -->
                <form action="controllers/depoCTR.php" method="POST" enctype="multipart/form-data" class="row">
                    <input type="hidden" name="user" value="<?php echo $id ?>">

                    <div class="col-xl-6">
                        <div class="card custom-card">
                            <div class="card-header">
                                <div class="card-title">Select Deposit Method</div>
                            </div>
                            <div class="card-body">
                                <select id="deposit_method" name="method" class="js-example-placeholder-single js-states form-control">
                                    <?php
                                    $payment = mysqli_query($connection, "SELECT * FROM payment_accounts");
                                    while ($row_payment = mysqli_fetch_assoc($payment)) { ?>
                                        <option bankname="<?php echo $row_payment['bank_name'] ?>" account_name="<?php echo $row_payment['account_name'] ?>" value="<?php echo $row_payment['payment_type'] ?>" account_number="<?php echo $row_payment['account_number'] ?>">
                                            <?php echo $row_payment['payment_type'] ?>
                                        </option>
                                    <?php }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6">
                        <div class="card custom-card">
                            <div class="card-body">
                                <div class="d-flex align-items-top justify-content-between mb-4">
                                    <div class="flex-fill d-flex align-items-top">
                                        <div class="me-2">
                                            <span class="avatar avatar-md text-secondary border bg-light"><i class="ti ti-user-circle fs-18"></i></span>
                                        </div>
                                        <div class="flex-fill">
                                            <p class="fw-semibold fs-14 mb-0">Payment Address / Account Details</p>
                                        </div>
                                    </div>
                                    <div><a id="copyBtn" class="dropdown-item btn btn-primary">Copy</a></div>
                                </div>

                                <label for="input-label" class="form-label">Payment Details</label>
                                <div id="paymentDetails">
                                </div>

                                <input type="text" id="copyBoard" style="position: absolute; left: -9999px;">
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6">
                        <div class="card custom-card">
                            <div class="card-header justify-content-between">
                                <div class="card-title">Submit Payment</div>
                            </div>
                            <div class="card-body">
                                <div class="form-floating mb-2">
                                    <input type="text" name="amount" class="form-control" id="floatingInput" placeholder="Amount Sent">
                                    <label for="floatingInput">Amount Sent</label>
                                </div>
                                <div id="giftCardFields" style="display:none">
                                    <div class="form-floating mt-2">
                                        <input type="text" name="gift_card_code" class="form-control" id="giftCardCode" placeholder="Gift Card Code" >
                                        <label for="giftCardCode">Gift Card Code</label>
                                    </div>
                                    <div class="form-floating mt-2">
                                        <input type="file" name="gift_card_image" class="form-control" id="giftCardImage" accept="image/*" >
                                        <label for="giftCardImage">Upload Gift Card Image</label>
                                    </div>
                                </div>

                                <div class="form-floating mt-3">
                                    <button class="btn btn-secondary" name="make_depo" type="submit">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <script>
                    const copyBoard = document.querySelector('#copyBoard');
                    const copyBtn = document.querySelector('#copyBtn');
                    let depositMethod = document.querySelector('#deposit_method');
                    let giftCardFields = document.getElementById('giftCardFields'); // Reference to gift card fields

                    // Function to display wallet details
                    function displayWallet(method, accountNumber, accountName, bankName) {
                        const detailsDiv = document.getElementById('paymentDetails');
                        switch (method) {
                            case "Wallet":
                                detailsDiv.innerHTML = `<p><strong>Wallet Address:</strong> ${accountNumber}</p>`;
                                copyBoard.value = `${accountNumber}`;
                                break;
                            case "Bank":
                                detailsDiv.innerHTML = `<p><strong>Bank Name:</strong> ${bankName}</p>`;
                                detailsDiv.innerHTML += `<p><strong>Bank Account Number:</strong> ${accountNumber}</p>`;
                                detailsDiv.innerHTML += `<p><strong>Bank Account Name:</strong> ${accountName}</p>`;
                                copyBoard.value = `${accountNumber}`;
                                break;
                            case "Western Union":
                                detailsDiv.innerHTML = `<p><strong>Wallet Address:</strong> ${accountNumber}</p>`;
                                detailsDiv.innerHTML += `<p><strong>Bank Account Name:</strong> ${accountName}</p>`;
                                copyBoard.value = `${accountNumber}`;
                                break;
                            case "Gift Card": // For Gift card payment type
                                detailsDiv.innerHTML = `<p><strong>Gift Card</strong> selected. Please enter details below.</p>`;
                                copyBoard.value = ''; // No default value for gift card
                                giftCardFields.style.display = 'block'; // Show gift card fields
                                break;
                            default:
                                break;
                        }
                    }

                    // Event listener for when a user changes the deposit method
                    depositMethod.addEventListener('change', (e) => {
                        const selectedOption = e.target.selectedOptions[0];
                        const accountNumber = selectedOption.getAttribute('account_number');
                        const bankName = selectedOption.getAttribute('bankname');
                        const accountName = selectedOption.getAttribute('account_name');
                        const paymentMethod = e.target.value;

                        console.log(paymentMethod, accountNumber); // Debugging

                        displayWallet(paymentMethod, accountNumber, accountName, bankName);
                    });

                    // Automatically trigger change on page load for the selected option
                    window.addEventListener('load', () => {
                        const selectedOption = depositMethod.selectedOptions[0]; // Get the default selected option
                        const accountNumber = selectedOption.getAttribute('account_number');
                        const bankName = selectedOption.getAttribute('bankname');
                        const accountName = selectedOption.getAttribute('account_name');
                        const paymentMethod = depositMethod.value;

                        displayWallet(paymentMethod, accountNumber, accountName, bankName);
                    });

                    // Copy to clipboard functionality
                    (function() {
                        "use strict";

                        function copyToClipboard(elem) {
                            var target = elem;
                            target.focus();
                            target.setSelectionRange(0, target.value.length);

                            try {
                                document.execCommand("copy");
                                alert('Successfully copied payment details');
                            } catch (e) {
                                console.warn(e);
                            }
                        }

                        copyBtn.onclick = function() {
                            copyToClipboard(copyBoard);
                        };
                    })();

                    document.querySelector('form').addEventListener('submit', (e) => {
                        if (depositMethod.value === 'Gift Card') {
                            document.getElementById('giftCardCode').focus();
                            document.getElementById('giftCardImage').focus();
                            const giftCardCode = document.getElementById('giftCardCode').value.trim();
                            const giftCardImage = document.getElementById('giftCardImage').files.length;

                            // Check if the fields are visible and not empty
                            if (!giftCardCode || !giftCardImage) {
                                alert('Please provide both the gift card code and image.');
                                e.preventDefault(); // Prevent form submission
                            }
                        }
                    });
                </script>




            </div>
        </div>

        <?php
        $brs = 0;
        while ($brs < 17) {
            echo '<br>';
            $brs++;
        }
        ?>









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