<?php
include '../connection.php';


if(isset($_POST['from'])){
    $id = $_POST['user_id'];
    // Query the database for trades related to the user
    $query = mysqli_query($connection, "SELECT * FROM trade WHERE user_id = '$id' ORDER BY `id` DESC");


    if(mysqli_num_rows($query)){
        $result = [];
        while ($trade = mysqli_fetch_assoc($query)) {
            $result[] = $trade;
        }
    
        // Return the results as JSON
        echo json_encode($result);
    }

    
}


// echo json_encode([
//     'status' => 'error',
//     'message' => 'User ID is missing or invalid.'
// ]);


?>
