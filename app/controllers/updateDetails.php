<?php
;
include('../../config/db-config.php');
include('../controllers/userDetails.php');
 if (isset($_POST['update_user'])) {
    $name = $_POST['name'];
    $bio = $_POST['bio'];
    $country = $_POST['country'];
    $mobile = $_POST['mobile'];

    $update_current_user = mysqli_query($connection, "UPDATE `users` SET `name`='$name',`mobile`='$mobile',`bio`='$bio',`country`='$country' WHERE `id` =  $id");
    if ($update_current_user) {
        echo "<script> window.location.href = '../profile.php' </script>";
    } else {
        echo "AN ERROR OCCURED HERE";
    }
 }
?>