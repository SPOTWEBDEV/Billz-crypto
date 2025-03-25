<?php

if (!isset($_SESSION['logged_in']) && $_SESSION['logged_in'] != true) {
    echo "<script> window.location.href = '../login' </script>";
}
?>