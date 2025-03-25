<?php
;
include('../../config/db-config.php');
include('./userDetails.php');
if (isset($_POST['upload_doc'])) {
    $targetDirectory = "../../admin/kyc/";
    $imageFileType = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
    $filename = strtotime(date("Y-m-d h:i:s")) . '.' . $imageFileType;
    $targetFile = $targetDirectory . $filename;
    $uploadOk = 1;
    $date = date("Y-m-d h:i:s");

    if ($_FILES['image']['size'] < 100) {
        echo 'PLEASE SELECT AN IMAGE';
        return;
    }

    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG, and GIF files are allowed.";
        $uploadOk = 0;
    } else {
        $validate_user_insertion = mysqli_query($connection, "SELECT * FROM `kyc` WHERE `user_id` = '$id'");
        if (mysqli_num_rows($validate_user_insertion) > 0) {
            // ADD DOCUMNET;
            mysqli_query($connection, "UPDATE `kyc` SET `document` = '$filename' WHERE `user_id` = '$id'");
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
                echo "<script> window.location.href = '../profile.php' </script>";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        } else {
            mysqli_query($connection, "INSERT INTO `kyc`(`id`, `user_id`, `passport`, `document`, `utility`, `date_created`, `status`) 
                                             VALUES ('','$id','','$filename','','$date','0')");
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
                echo "<script> window.location.href = '../profile.php' </script>";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
}
