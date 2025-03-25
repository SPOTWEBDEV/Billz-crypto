<?php
include('../../server/connection.php');
include('../../mailer/index.php');

?>

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
    
    if (isset($_POST['createUser'])) {
        $user = mysqli_real_escape_string($connection, $_POST['user']);
        $name = mysqli_real_escape_string($connection, $_POST['name']);
        $email = mysqli_real_escape_string($connection, $_POST['email']);
        $phone = mysqli_real_escape_string($connection, $_POST['phone']);
        $country = mysqli_real_escape_string($connection, $_POST['country']);
        $pass = mysqli_real_escape_string($connection, $_POST['pass']);
        $rp_pass = mysqli_real_escape_string($connection, $_POST['rp_pass']);
        $ref = mysqli_real_escape_string($connection, $_POST['ref']);
        $ref_id = rand();
        $registered = date('Y-m-d H:i:s');

        if ($pass !== $rp_pass) {
            echo "<script>Swal.fire('Password Mismatch','Passwords do not match','error')</script>";
            echo "<script>setTimeout( ()=> { window.location.href = '../register.php' }, 1000)</script>";
            exit;
        }

        $checkUserQuery = $connection->prepare("SELECT * FROM `users` WHERE `email` = ?");
        $checkUserQuery->bind_param("s", $email);
        $checkUserQuery->execute();
        $checkUser = $checkUserQuery->get_result();

        

        if ($checkUser->num_rows == 0) {
            if (!empty($user) && !empty($name) && !empty($email) && !empty($phone) && !empty($country) && !empty($pass)) {

                if($ref != ''){
                    $check = mysqli_query($connection,"SELECT `id`,`referral_balance` FROM `users` WHERE `ref_id`='$ref'");

                    if (!mysqli_num_rows($check)) {
                        echo "<script>Swal.fire('referral Error', 'The referral link you provided is incorrect. Please check and try again.', 'error');</script>";
                        echo "<script>setTimeout( ()=> { window.location.href = '../register.php' }, 1000)</script>";
                        return;
                    }

                    // GET USER ID
                    $row = mysqli_fetch_assoc($check);
                    $user_id = $row['id'];
                    $referral_balance = $row['referral_balance'];


                    // GETTING THE SUPPOSE REF BAL ASSIGN BY ADMIN TO USER
                    $getref_bal = mysqli_query($connection,"SELECT `ref_bal` FROM `site`"); 
                    $bal = mysqli_fetch_assoc($getref_bal);
                    $the_bal = $bal['ref_bal'];


                    $referral_balance = $referral_balance + $the_bal;
                   
                    $update = mysqli_query($connection , "UPDATE `users` SET `referral_balance`='$referral_balance' WHERE `id`='$user_id'");
                    
                }

                


                $createUserQuery = $connection->prepare("INSERT INTO `users`(`user`, `name`, `email`, `phone`, `profile_image`, `password`, `country`, `wallet`, `ref_wallet`, `gain_wallet`, `ref_id`, `referree`, `date_registered`, `paid_ref`, `dn_with`, `status`) VALUES (?, ?, ?, ?, '--', ?, ?, 0, 0, 0, ?, ?, ?, 0, 0, 0)");
                $createUserQuery->bind_param("sssssssss", $user, $name, $email, $phone, $pass, $country, $ref_id, $ref, $registered);
                $createUser = $createUserQuery->execute();

                if ($createUser) {
                    $body = "
                        <html>
                        <body style='margin: 0; padding: 0; font-family: Roboto, sans-serif; background: #131722;'>
                        <section style='width: 100%; background-color: #f1f2f3; color: #333;'>
                        <div style='width: 100%; max-width: 600px; margin: 0 auto;'>
                        <div style='padding: 20px; background-color: #131722; text-align: center;'>
                        <h2 style='color: #fff; font-size: 24px;'>Welcome aboard, $name!</h2>
                        </div>
                        <div style='padding: 20px; background: #fff; border-radius: 0 0 8px 8px;'>
                        <p>Dear $name,</p>
                        <p>Thank you for joining $sitename , your gateway to seamless investment exchange trading. We are delighted to have you as part of our community.</p>
                        <p>Thank you for choosing to invest with us. Our team of experts is committed to helping you achieve your investment goals, and we are here to support you every step of the way.</p>
                        <p>To begin your journey with us, please make a deposit into your preferred investment plan and start enjoying daily profits with ease.</p>
                        <p>For any inquiries or assistance, feel free to reach out to our support team at <a href='mailto:$siteemail'>$siteemail</a>.</p>
                        <p>Best regards,</p>
                        <p>The $sitename  Team</p>
                        
                        </div>
                        <div style='text-align: center; color: #666; margin-top: 20px; font-size: 12px;'> 
                        &copy; 2020 $sitename  . All rights reserved. 
                        </div>
                        </div>
                        </section>
                        </body>
                        </html>";
                
                    $to = $email;
                    $subj = "Welcome to $sitename  ! ";
                    $result = smtpmailer($to, $siteemail, $sitename, $subj, $body);
                
                    if ($result) {
                        echo "<script>Swal.fire('Account Created', 'Your account has been created successfully', 'success')</script>";
                        $url = $domain . 'app/login.php';
                        echo "<script>setTimeout(() => { 
                            window.open('$url', '_self');
                        }, 1000)</script>";
                    } else {

                        $url = $domain . 'app/register.php';
                        echo "<script>Swal.fire('Mail Error', 'Failed to send confirmation email. You can still proceed to login.', 'error');</script>";
                        echo "<script>setTimeout(() => { 
                            window.open('$url', '_self');
                        }, 1000)</script>";
                    }
                } else {
                    echo "<script>Swal.fire('Account Error', 'Error creating account', 'error')</script>";
                    echo "<script>setTimeout(() => { window.location.href = '../register.php' }, 1000)</script>";
                }


            } else {
                echo "<script>Swal.fire('Input Error','Some of your inputs are empty','error')</script>";
                echo "<script>setTimeout( ()=> { window.location.href = '../register.php' }, 1000)</script>";
            }
        } else {
            echo "<script>Swal.fire('Details Error','The details you provided are already in use','error')</script>";
            echo "<script>setTimeout( ()=> { window.location.href = '../register.php' }, 1000)</script>";
        }
    }
    ?>
</body>

</html>