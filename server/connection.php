<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


function checkUrlProtocol($url)
{
    // Parse the URL to get the scheme
    $parsedUrl = parse_url($url);

    // Check if the scheme exists and if it's http or https
    if (isset($parsedUrl['scheme'])) {
        return $parsedUrl['scheme'];
    } else {
        return 'invalid'; // Invalid URL if no scheme is found
    }
}

// Automatically get the current URL
$currentUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http")
    . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

// Get the protocol from the current URL
$request = checkUrlProtocol($currentUrl);

// Default configurations
define("HOST", "localhost");


// Set configurations based on protocol
if ($request == 'https') {
    $domain = "https://fusionsassets.com/";
    define("USER", "tifkvkth_crypto");
    define("PASSWORD", "tifkvkth_crypto");
    define("DATABASE", "tifkvkth_crypto");
}
elseif ($request == 'http') {
    $domain = "http://localhost/Billz-crypto/";
    define("USER", "root");
    define("PASSWORD", "");
    define("DATABASE", "billz-crypto");
}

// // Database connection
$connection = mysqli_connect(HOST, USER, PASSWORD, DATABASE);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// // Site configurations
$sitename = "Fusions Assets";


// email config 
$siteemail = "support@fusionsassets.com";
$emailpassword  = "support@fusionsassets.com";
$host = 'mail.fusionsassets.com';
$sitephone  = "+44 776 0957 798";
$siteaddress  = "weston newyork";



$apiKey = "1312f57d-3307-4c2b-bd94-9850caf54b40";



session_start();
