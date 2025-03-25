<?php
include('../../server/connection.php');
include('../../mailer/index.php');
include('userDetails.php');






$id = $userDetails['id'];









?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="<?php echo $domain ?>app/assets/js/jquery-3.6.0.min.js"></script>
   <script src="<?php echo $domain ?>app/assets/js/sweetalert2.all.min.js"></script>
</head>

<body>

    <?php

    if (isset($_POST['makeInvestment'])) {
        $plan = $_POST['plan'];
        $amount = $_POST['amount'];
        $percentage = $_POST['percent'];
        $duration = $_POST['duration'];
        $email = $_POST['email'];
        $profit = (($amount / 100) * $percentage);
        $referee = $userDetails['referree'];

        $date = date('Y-m-d H:i:s');
        $regD = new DateTime($date);
        $add_maturity = $regD->modify('+1 days');
        $maturity = $add_maturity->format('Y-m-d H:i:s');

        $endD = new DateTime($date);
        $add_end = $endD->modify("+ $duration");
        $ends_on = $add_end->format('Y-m-d H:i:s');

        $url = $domain . 'app/investment.php';

        if (!empty($amount)) {
            $get_cur_user = mysqli_query($connection, "SELECT * FROM `users` WHERE `id` = '$id'");
            $cur_details = mysqli_fetch_assoc($get_cur_user);

            if ($amount <= $cur_details['wallet']) {
                $new_cur_bal = $cur_details['wallet'] - $amount;
                $deduct_invester = mysqli_query($connection, "UPDATE `users` SET `wallet` = '$new_cur_bal' WHERE `id` = '$id'");

                if ($deduct_invester) {
                    $total_profit = $profit * (intval($duration));
                    $invested = mysqli_query($connection, "INSERT INTO `investments`(`id`, `user_id`, `plan`, `amount`, `total`, `email`, `profit`, `date_invested`, `date_to_mature`, `ends_on`, `status`) VALUES ('', '$id', '$plan', '$amount', '$total_profit', '$email', '$profit', '$date', '$maturity', '$ends_on', '0')");

                    if ($invested) {
                        if ($userDetails['paid_ref'] == '0') {
                            $get_ref_user = mysqli_query($connection, "SELECT * FROM `users` WHERE `ref_id` = '$referee'");
                            if (mysqli_num_rows($get_ref_user) > 0) {
                                $ref_details = mysqli_fetch_assoc($get_ref_user);
                                echo $amount   .  ' -  ' .  $ref_details['wallet'] . ' = ' .  $get_ref_user['name'];
                                $new_ref_bal = $ref_details['wallet'] + ($amount / 100 * 5);
                                mysqli_query($connection, "UPDATE `users` SET `wallet` = '$new_ref_bal' WHERE `ref_id` = '$referee'");
                            }
                            mysqli_query($connection, "UPDATE `users` SET `paid_ref` = '1' WHERE `id` = '$id'");
                        }

                        $email = $userDetails['email'];
                        $name = $userDetails['name'];

                        $body = "
                        <html>
                        <body style='margin: 0; padding: 0; font-family: Roboto, sans-serif; background: #131722;'>
                        <section style='width: 100%; background-color: #f1f2f3; color: #333;'>
                        <div style='width: 100%; max-width: 600px; margin: 0 auto;'>
                        <div style='padding: 20px; background-color: #131722; text-align: center;'>
                        <img src='https://ravenassetlimited.com/assets/RALblack.png' alt='$sitename' style='height: 80px; width: auto; max-width: 100%; margin-bottom: 20px;'>
                        <h2 style='color: #fff; font-size: 24px;'>Welcome aboard, $name!</h2>
                        </div>
                        <div style='padding: 20px; background: #fff; border-radius: 0 0 8px 8px;'>
                        <p>Dear $name,</p>
                        <p>We are pleased to inform you that your recent investment transaction has been successfully processed and credited to your $sitename account.</p>
                        <ul>
                            <li><strong>Transaction Type:</strong> Investment</li>
                            <li><strong>Amount:</strong> <span style='color:green'>$$amount</span></li>
                            <li><strong>Date:</strong> $date</li>
                        </ul>
                        <p>Thank you for joining $sitename, your gateway to seamless investment exchange trading. We are delighted to have you as part of our community.</p>
                        <p style='margin-top:20px'>For any inquiries or assistance, feel free to reach out to our support team at <a href='mailto:$siteemail'>$siteemail</a>.</p>
                        <p>Welcome once again to $sitename!</p>
                        <p>Best regards,</p>
                        <p>The $sitename Team</p>
                        </div>
                        <div style='text-align: center; color: #666; margin-top: 20px; font-size: 12px;'>
                        &copy; 2020 $sitename. All rights reserved.
                        </div>
                        </div>
                        </section>
                        </body>
                        </html>";

                        $to = $email;
                        $subj = 'Investment Request';
                        $result = smtpmailer($to, $siteemail, $sitename, $subj, $body);

                        if ($result) {
                            $url = $domain . 'app/investments.php';
                            echo "
                            <script>
                                Swal.fire('Investment Made', 'Your investment has been added successfully', 'success');
                                setTimeout(() => { 
                                    window.open('$url', '_self');
                                }, 5000);
                            </script>";
                        } else {
                            echo "
                            <script>
                                Swal.fire('Investment Failed', 'Your investment request failed', 'error');
                                 setTimeout(() => { 
                                    window.open('$url', '_self');
                                }, 5000);
                            </script>";

                        }
                    } else {
                        echo "
                        <script>
                            Swal.fire('Error', 'An error occurred while processing the investment', 'error');
                             setTimeout(() => { 
                                window.open('$url', '_self');
                            }, 5000);
                        </script>";
                    }
                } else {
                    echo "
                    <script>
                        Swal.fire('Error', 'Amount exceeds wallet balance', 'error');
                         setTimeout(() => { 
                            window.open('$url', '_self');
                        }, 5000);
                    </script>";
                }
            } else {
                echo "
                <script>
                    Swal.fire('Error', 'Insufficient balance to complete this investment. Please deposit additional funds or choose a lower investment amount', 'error');
                     setTimeout(() => { 
                        window.open('$url', '_self');
                    }, 5000);
                </script>";
            }
        }
    }


    ?>

</body>

</html>