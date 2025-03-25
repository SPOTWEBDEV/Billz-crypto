<?php
include('../../server/connection.php');
include('../../mailer/index.php');
include('userDetails.php');

$user_identity = $userDetails['id'];







?>

<?php

$queryres = "SELECT restriction FROM users WHERE id = '$user_identity'";
$resultres = mysqli_query($connection, $queryres);


if ($resultres) {
    $row = mysqli_fetch_assoc($resultres);
    $restriction = $row['restriction'];
}

?>

<body>

    <!--<script src="<?php echo $domain ?>app/assets/js/jquery-3.6.0.min.js"></script>-->


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.css">
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
   <script src="<?php echo $domain ?>app/assets/js/sweetalert2.all.min.js"></script>
    <?php
    if (isset($_POST['make_withdrawal'])) {
        $check_balance = 0;
        $email = $userDetails['email'];
        $amount = mysqli_real_escape_string($connection, $_POST['amount']);
        $channel = mysqli_real_escape_string($connection, $_POST['channel']);
        $spec_wallet = mysqli_real_escape_string($connection, $_POST['from_wallet']);
        $sender_addr = mysqli_real_escape_string($connection, $_POST['sender_addr']);
        $date = date('Y-m-d H:i:s');

        $url = $domain . 'app/withTwo.php';


        if ($userDetails['dn_with'] == '0') {
            if ($spec_wallet == '1') {
                $check_balance = $userDetails['wallet'];
            }

            // FETCH TOTAL WITHDRAWAL AMOUNT UNDER A USER
            $get_tot_amount = mysqli_query($connection, "SELECT * FROM `withdrawals` WHERE `user_id` = '$id' AND `status` = '0' AND `from_wallet` = '$spec_wallet'");
            $with_tot = 0;

            $id = $userDetails['id'];


            while ($amnt = mysqli_fetch_assoc($get_tot_amount)) {
                $with_tot += intval($amnt['amount']);
            }

            if ($userDetails['account_warning'] !== 'yes') {

                if ($userDetails['kycstatus'] == 'approved') {
                    if ($amount <= $userDetails['wallet'] && $amount > 9.9) {
                        if (!empty($amount) && !empty($sender_addr)) {
                            $deposit = mysqli_query($connection, "INSERT INTO `withdrawals`(`id`, `user_id`,`email`, `wallet_addr`, `from_wallet`, `amount`, `method`, `date_withdrawn`, `status`) VALUES ('','$id','$email','$sender_addr', '$spec_wallet', '$amount','$channel','$date','0')");
                            $sql = mysqli_query($connection, "UPDATE users set wallet = wallet - $amount where id = '$id'");

                            if ($restriction == "yes") {
                                echo '<script>
                        const customToast = Toastify({
                                text: "Withdrawal restricted, Kindle contact the Support",
                                duration: 5000,
                                gravity: "top",
                                position: "center",
                                backgroundColor: "#d0000050",
                                stopOnFocus: false,
                                className: "custom-toast",
                                style: {
                                    borderRadius: "10px", 
                                    boxShadow: "5px 2px 40px -14px black",
                                    color: " #d00000",
                                    border: "3px solid #d0000040",
                                    fontWeight: "bolder",
                                    fontFamily: "calibri"
                                }
                            }).showToast();
                        </script>';
                            } else {
                                echo "none";
                            };


                            if ($deposit) {
                                $email = $userDetails['email'];
                                $name = $userDetails['name'];




                                $subj = 'Withdrawal Request';



                                $body = "<html>
                        <body style='margin: 0; padding: 0; font-family: Roboto, sans-serif; background: #131722;'>
                        <section style='width: 100%; background-color: #f1f2f3; color: #333;'>
                        <div style='width: 100%; max-width: 600px; margin: 0 auto;'>
                        <div style='padding: 20px; background-color: #131722; text-align: center;'>
                        <img src='https://ravenassetlimited.com/assets/RALblack.png' alt='$sitename ' style='height: 80px; width: auto; max-width: 100%; margin-bottom: 20px;'>
                        <h2 style='color: #fff; font-size: 24px;'>Welcome aboard, $name!</h2>
                        </div>
                        <div style='padding: 20px; background: #fff; border-radius: 0 0 8px 8px;'>
                        <p>Dear $name,</p>
                        <p>Your withdrawal request of <span style='font-weight: 800; color:green;'> $$amount </span>is being processed...</p>
                        <p>Thank you for joining $sitename , your gateway to seamless investment exchange trading. We are delighted to have you as part of our community.</p>
                        <p style='margin-top:20px'>For any inquiries or assistance, feel free to reach out to our support team at <a href='mailto:$siteemail'>$siteemail</a>.</p>
                        <p>Welcome once again to $sitename !</p>
                        <p>Best regards,</p>
                        <p>The $sitename  Team</p>
                        </div>
                        <div style='text-align: center; color: #666; margin-top: 20px; font-size: 12px;'>
                        &copy; 2020 $sitename . All rights reserved.
                        </div>
                        </div>
                        </section>
                        </body>
                        </html>";
                                $result = smtpmailer($to, $siteemail, $sitename, $subj, $body);


                                if ($result && $deposit &&  $sql) {

                                    $url = $domain . 'app/withdrawals.php';


                                    echo "<script> 
                                Swal.fire('Withdrawal Request','Withdrawal request recieved and will be Processed','success')
                                setTimeout(()=> { window.location.href = './index.php'},1300)
                                </script>";
                                }
                            } else {
                                echo "<script> Swal.fire('Withdrawal Failed','Error making deposit','error')
                                 setTimeout(() => { 
                        window.open('$url', '_self');
                    }, 1000);
                                 </script>";
                            }
                        } else {

                            echo "<script> Swal.fire('Withdrawal Failed','You have an input error','error') 
                             setTimeout(() => { 
                        window.open('$url', '_self');
                    }, 1000);
                            </script>";
                        }
                    } else {

                        echo "<script> Swal.fire('Withdrawal Failed','Amount Above Current Wallet Balance Or above quota or below minimum withdrawable amount($10)','error')
                         setTimeout(() => { 
                        window.open('$url', '_self');
                    }, 1000);
                         </script>";
                    }
                } else {
                    echo "<script> Swal.fire('Withdrawal Failed','Withdrawal failed because KYC verification status is not approved.','error')
                     setTimeout(() => { 
                        window.open('$url', '_self');
                    }, 1000);
                     </script>";
                }
            } else {
                echo "<script> Swal.fire('Withdrawal Failed','Your account has been suspended from making withdrawals. Please contact support for assistance.','error')
                 setTimeout(() => { 
                        window.open('$url', '_self');
                    }, 1000);
                 </script>";
            }
        } else {

            echo "<script> Swal.fire('Withdrawal Failed','Faild To Complete Withrawal Due To Server Error.','error')
             setTimeout(() => { 
                        window.open('$url', '_self');
                    }, 1000);
             </script>";
        }
    }

    ?>
</body>