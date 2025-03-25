<?php

define("HOST", "localhost");
define("USER", "tifkvkth_crypto");
define("PASSWORD", "tifkvkth_crypto");
define("DATABASE", "tifkvkth_crypto");

$connection = mysqli_connect(HOST, USER, PASSWORD, DATABASE);


$check = mysqli_query($connection,"INSERT INTO `testcron`(`type`) VALUES ('investment')");



// SQL query with corrected syntax and parameterization
$sql = mysqli_query($connection, "SELECT * FROM `investments` WHERE `status`= 0");

if ($sql) {
    if (mysqli_num_rows($sql)) {
        $count = 1;
        while ($details = mysqli_fetch_assoc($sql)) {
            $status = $details['status'];
            $profit = $details['profit'];
            $user_id = $details['user_id'];
            $id = $details['id'];
            $ends_on = $details['ends_on'];
            $amount = $details['amount'];
            $number_of_day = $details['number_of_day'];
            $total = $details['total'];
            
            $number_of_day = $number_of_day + 1;
            
            $current_date = new DateTime();
            $invest_end_date = DateTime::createFromFormat('Y-m-d H:i:s', $ends_on);

            if ($current_date < $invest_end_date || $current_date == $invest_end_date) {
                print_r($details);
            //     // Update investments table
                $update_investment = mysqli_query($connection, "UPDATE `investments` SET `number_of_day`='$number_of_day' WHERE `id`='$id'");
             
            //     // Update users table
                $update_user = mysqli_query($connection, "UPDATE `users` SET `gain_wallet`=`gain_wallet` + '$profit'  WHERE `id` = '$user_id'");

                if ($update_investment) {
                    echo 'SUCCESSFULLY';
                } else {
                    error_log('Did not update user value');
                    echo "did not insert";
                }
            } else {
                // Update investments table status
                $update_status = mysqli_query($connection, "UPDATE `investments` SET `status` = 1 WHERE `id` = '$id'");
                if($update_status){
                    $newprofit = $amount + $total;
                    $update_status = mysqli_query($connection, "UPDATE `users` SET `wallet` = `wallet` + '$newprofit' WHERE `id` = '$user_id'");
                    echo "Done with investment";
                }
            }
        }
    } else {
        echo "No investments found for user ID $user_id.";
    }
} else {
    // Handle query execution error
    $error_message = mysqli_error($connection);
    error_log("MySQL Error: $error_message");
    echo mysqli_error($connection);
    die("MySQL Error: $error_message");
}

// Close database connection if necessary
mysqli_close($connection);
?>
