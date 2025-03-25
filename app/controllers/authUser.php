<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="<?php echo $domain ?>app/assets/js/jquery-3.6.0.min.js"></script>
   <script src="<?php echo $domain ?>app/assets/js/sweetalert2.all.min.js"></script>
</head>

<body>
    <?php
   
    include('.../server/connection.php');
    
    if (isset($_POST['authUser'])) {
        $email = mysqli_real_escape_string($connection, $_POST['email']);
        $pass = mysqli_real_escape_string($connection, $_POST['pass']);

        if (!empty($email) && !empty($pass)) {

            $query = mysqli_query($connection, "SELECT * FROM `users` WHERE  `email` = '$email' AND `password` = '$pass'");
            if (mysqli_num_rows($query) > 0) {
                $getDetails = mysqli_fetch_assoc($query);
                $_SESSION['logged_in'] = true;
                $_SESSION['id'] = $getDetails['id'];
                $_SESSION['name'] = $getDetails['name'];
                $_SESSION['email'] = $getDetails['email'];
                $_SESSION['password'] = $getDetails['password'];
                $_SESSION['wallet'] = $getDetails['wallet'];
                $_SESSION['ref_id'] = $getDetails['ref_id'];
                $_SESSION['referree'] = $getDetails['referree'];
                
               
                
               
                echo "<script> Swal.fire('Authenticated','Account Login Successfull','success')</script>";
                 
                echo "<script>setTimeout( ()=> { window.open('../../profile/test.php','_self')}, 1000)</script>";
            } else {
                echo "<script>Swal.fire('Warning','Login Error','warning')</script>"; 
                echo "<script> setTimeout(()=> { window.location.href = '../../profile/login.php'},1000) </script>";
            }
        } else {
            echo "<script>Swal.fire('Warning','You have an input error','warning')</script>";
            echo "<script> setTimeout(()=> { window.location.href = '../../profile/login.php'},1000) </script>";
        }
    }


?>
</body>
</html>