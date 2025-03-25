<?php
// ;
// include('../config/db-config.php');


// include('controllers/authFy.php');

// // PREPARE USERS DETAILS;
// include('controllers/userDetails.php');
?>
<header class="app-header">
    <!-- Start::main-header-container -->
    <div class="main-header-container container-fluid">
        <!-- Start::header-content-left -->
        <div class="header-content-left">
            <!-- Start::header-element -->
            <div class="header-element">
                <div class="horizontal-logo">
                    <!-- <a href="index.html" class="header-logo">
                        <img src="./assets/images/brand-logos/desktop-logo.png" alt="logo" class="desktop-logo" />
                        <img src="./assets/images/brand-logos/toggle-logo.png" alt="logo" class="toggle-logo" />
                        <img src="./assets/images/brand-logos/desktop-dark.png" alt="logo" class="desktop-dark" />
                        <img src="./assets/images/brand-logos/toggle-dark.png" alt="logo" class="toggle-dark" />
                    </a> -->
                </div>
            </div>
            <!-- End::header-element -->
            <!-- Start::header-element -->
            <div class="header-element">
                <!-- Start::header-link -->
                <a aria-label="Hide Sidebar" class="sidemenu-toggle header-link animated-arrow hor-toggle horizontal-navtoggle" data-bs-toggle="sidebar" href="javascript:void(0);"><span></span></a>
                <!-- End::header-link -->
            </div>
            <!-- End::header-element -->
        </div>
        <!-- End::header-content-left -->
        <!-- Start::header-content-right -->
        
        <div id="google_translate_element"></div>
        
        <style>
                       
                       /* Style the language selector container */
                        #google_translate_element {
                            margin-top: 10px;
                            text-align: center;
                            font-family: Arial, sans-serif;
                            font-size: 16px;
                            color: #333;
                        }
                        
                        /* Hide the original Google Translate toolbar */
                        .goog-te-banner-frame.skiptranslate {
                            display: none !important;
                        }
                        
                        /* Remove the additional margin added by Google Translate */
                        body {
                            top: 0px !important;
                        }
                        
                        /* Customize the dropdown button */
                        .goog-te-gadget-simple {
                            background-color: #f8f9fa; /* Background color */
                            border: 1px solid #ddd; /* Border color */
                            border-radius: 5px; /* Rounded corners */
                            padding: 5px 10px; /* Padding */
                            display: inline-block;
                            cursor: pointer;
                        }
                        
                        /* Customize the text inside the dropdown */
                        .goog-te-gadget-simple .goog-te-menu-value {
                            color: #007bff; /* Text color */
                            font-weight: bold;
                        }
                        
                        /* Hide the Google Translate logo */
                        .goog-te-gadget-simple .goog-te-menu-value span {
                            display: none;
                        }
                        
                        /* Add a custom icon or arrow */
                        .goog-te-gadget-simple .goog-te-menu-value:after {
                            content: '▼'; /* Custom arrow icon */
                            margin-left: 5px;
                            color: #007bff;
                            font-size: 12px;
                        }
                        
                        /* Style the dropdown list */
                        .goog-te-menu-frame {
                            border: none !important;
                            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
                            border-radius: 5px;
                        }
                        
                        /* Customize the list items */
                        .goog-te-menu2 {
                            background-color: #f8f9fa !important;
                            border-radius: 5px !important;
                        }
                        
                        /* Style the list item links */
                        .goog-te-menu2 a {
                            color: #007bff !important;
                            text-decoration: none !important;
                            padding: 5px 10px !important;
                            display: block;
                            font-weight: normal !important;
                        }
                        
                        /* Highlight the hovered list item */
                        .goog-te-menu2 a:hover {
                            background-color: #007bff !important;
                            color: #fff !important;
                            border-radius: 5px !important;
                        }



        </style>

        <div class="header-content-right">
            <div class="header-element header-theme-mode">
                <a class="header-link layout-setting">
                    <span class="light-layout">
                        <i class="bx bx-moon header-link-icon"></i>
                    </span>
                    <span class="dark-layout">
                        <i class="bx bx-sun header-link-icon"></i>
                    </span>
                </a>
            </div>
            <!-- <div class="header-element header-fullscreen">
                <a onclick="openFullscreen()" class="header-link">
                    <i class="bx bx-fullscreen full-screen-open header-link-icon"></i>
                    <i class="bx bx-exit-fullscreen full-screen-close header-link-icon d-none"></i>
                </a>
            </div> -->
            
            

            <!-- Nah Here you go put user details -->
            <!-- Nah Here you go put user details -->
            <!-- Nah Here you go put user details -->
            <div class="header-element">
                <a href="#" class="header-link dropdown-toggle" id="mainHeaderProfile" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                    <div class="d-flex align-items-center">
                        <div class="me-sm-2 me-0">
                            <?php

                            if (strlen($userDetails['profile_image']) > 3) {

                            ?>
                                <img src="<?php echo  $domain . 'uploads/profile/' . $userDetails['profile_image'] ?>" alt="img" width="32" height="32" style="object-fit: cover;" class="rounded-circle" />
                            <?php

                            } else {

                            ?>
                                <img src="./assets/images/faces/9.jpg" alt="img" width="32" height="32" class="rounded-circle" />
                            <?php
                            }
                            ?>
                        </div>
                        <div class="d-sm-block d-none">
                            <p class="fw-semibold mb-0 lh-1"><?php echo $userDetails['name'] ?></p>
                            <span class="op-7 fw-normal d-block fs-11"><?php echo $userDetails['email'] ?></span>
                        </div>
                    </div>
                </a>
                <ul class="main-header-dropdown dropdown-menu pt-0 overflow-hidden header-profile-dropdown dropdown-menu-end" aria-labelledby="mainHeaderProfile">
                    <li>
                        <a class="dropdown-item d-flex" href="profile.php"><i class="ti ti-user-circle fs-18 me-2 op-7"></i>Profile</a>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex border-block-end" href="javascript:void(0);"><i class="ti ti-wallet fs-18 me-2 op-7"></i>Bal: $<?php echo number_format($userDetails['wallet']) ?></a>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex" href="<?php $_SERVER["PHP_SELF"] ?>?logout=true"><i class="ti ti-logout fs-18 me-2 op-7"></i>Log Out</a>
                    </li>
                </ul>
            </div>
            <!-- End::header-element -->
            <!-- Start::header-element -->
            <!-- <div class="header-element">
                <a href="#" class="header-link switcher-icon" data-bs-toggle="offcanvas" data-bs-target="#switcher-canvas">
                    <i class="bx bx-cog header-link-icon"></i>
                </a>
            </div> -->
            <!-- End::header-element -->
        </div>
        <!-- End::header-content-right -->
    </div>
    <!-- End::main-header-container -->
</header>



