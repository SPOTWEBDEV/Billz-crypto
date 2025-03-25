<?php
    if (isset($_GET['logout']) && $_GET['logout'] == true) {
        unset($_SESSION['id']);
        echo "<script> window.location.href = '../profile/login.php' </script>";
    }
?>