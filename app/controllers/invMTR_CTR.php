<?php
// INVESTMENT MATURITY SCRIPT;
// $get_running_investment = mysqli_query($connection, "SELECT * FROM `investments` WHERE `user_id` = '$id' AND `status` = '0'");

// if (mysqli_num_rows($get_running_investment) > 0) {
//     while ($running_investment = mysqli_fetch_assoc($get_running_investment)) {
//         $row_id = $running_investment['id'];
//         $profit = $running_investment['profit'];
//         $maturity_date = $running_investment['date_to_mature'];
//         $ends_on = $running_investment['ends_on'];

//         $inv_c_D = new DateTime();
//         $inv_c_format = $inv_c_D->format('Y-m-d H:i:s');
        
//         if (strtotime($inv_c_format) > strtotime($ends_on)) {
//             // THAT MEANS THE INVESTMENT IS FINISHED
//             mysqli_query($connection, "UPDATE `investments` SET `status` = '1' WHERE `id` = '$row_id'");
//             // add capital
//             $get_user_bal = mysqli_query($connection, "SELECT * FROM `users` WHERE `id` = '$id'");
//             $user_bal_details = mysqli_fetch_assoc($get_user_bal);
//             $user_profits = $user_bal_details['gain_wallet'];
//             $new_gain_balance = $user_profits + $profit;
//             $add_percentage = mysqli_query($connection, "UPDATE `users` SET `gain_wallet` = '$new_gain_balance' WHERE `id` = '$id'");
//         } else {

//             if (strtotime($inv_c_format) > strtotime($maturity_date)) {
                
                 
//                 $d_matured = new DateTime($maturity_date);
//                 $d_matured_mod = $d_matured->modify('+1 days');
//                 $next_to_mature = $d_matured_mod->format("Y-m-d H:i:s");

//                 mysqli_query($connection, "UPDATE `investments` SET `date_to_mature` = '$next_to_mature' WHERE `id` = '$row_id'");
//                 $get_user_bal = mysqli_query($connection, "SELECT * FROM `users` WHERE `id` = '$id'");
//                 $user_bal_details = mysqli_fetch_assoc($get_user_bal);
//                 $user_profits = $user_bal_details['gain_wallet'];
//                 $new_gain_balance = $user_profits + $profit;
                
//                 $add_percentage = mysqli_query($connection, "UPDATE `users` SET `gain_wallet` = '$new_gain_balance' WHERE `id` = '$id'");
//             }


//         }
//     }
// }
?>