<?php
;
include('../../server/connection.php');
include('./userDetails.php');
if (isset($_POST['save_profile'])) {
    $targetDirectory = "../../uploads/profile/";
    $imageFileType = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
    $filename = strtotime(date("Y-m-d h:i:s")) . '.' . $imageFileType;
    $targetFile = $targetDirectory . $filename;
    $uploadOk = 1;

    $file_to_remove = '../../uploads/profile/'.$userDetails['profile_image'];
    if (file_exists($file_to_remove)) {
        if (unlink($file_to_remove)) {
            // echo "file replaced";
        } else {
            // echo "file not removed";
        }
    } else {
        // echo "file doesnt exist";
    }

    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        
        echo "<script>Swal.fire('Failed to update profile','Sorry, only JPG, JPEG, PNG, and GIF files are allowed.','error')</script>";
            echo "<script>setTimeout( ()=> { window.location.href = '../profile.php' }, 1000)</script>";
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            $add_profile = mysqli_query($connection, "UPDATE `users` SET `profile_image` = '$filename' WHERE `id` = '$id'");
            echo "<script>Swal.fire('Profile request','Your profile picture was successfully updated.','success')</script>";
            echo "<script> window.location.href = '../profile.php' </script>";
        } else {
            
            echo "<script>Swal.fire('Failed to update profile','Sorry, there was an error uploading your file.','error')</script>";
            echo "<script>setTimeout( ()=> { window.location.href = '../profile.php' }, 1000)</script>";
        }
    }
}
