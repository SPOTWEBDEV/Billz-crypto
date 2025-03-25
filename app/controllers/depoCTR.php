<?php
include('../../server/connection.php');
include('../../mailer/index.php');
include('userDetails.php');

$user_identity = $userDetails['id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="./jquery-3.6.0.min.js"></script>
    <script src="<?php echo $domain ?>app/assets/js/sweetalert2.all.min.js"></script>
</head>

<body>

    <?php
    if (isset($_POST['make_depo'])) {
        $user = mysqli_real_escape_string($connection, $_POST['user']);
        $method = mysqli_real_escape_string($connection, $_POST['method']);
        $amount = mysqli_real_escape_string($connection, $_POST['amount']);

        $gift_card_code = null;
        $gift_card_image_path = null;

        $url = $domain . 'app/deposit.php';

        if ($method === 'Gift Card') {
            $gift_card_code = mysqli_real_escape_string($connection, $_POST['gift_card_code']);

            // Handle gift card image upload
            if (!empty($_FILES['gift_card_image']['name'])) {
                $target_dir = "../../uploads/gift_cards/";
                $target_file = $target_dir . basename($_FILES["gift_card_image"]["name"]);

                // Check if image file is a valid image
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                $valid_extensions = ["jpg", "png", "jpeg"];
                if (in_array($imageFileType, $valid_extensions)) {
                    if (move_uploaded_file($_FILES["gift_card_image"]["tmp_name"], $target_file)) {
                        $gift_card_image_path = $target_file;
                    } else {
                        echo "<script>
                            Swal.fire('Error', 'Error uploading gift card image.', 'error');
                            setTimeout(() => { 
                                window.open('$url', '_self');
                            }, 2000);
                        </script>";
                        exit;
                    }
                } else {
                    echo "<script>
                        Swal.fire('Invalid Format', 'Only JPG, PNG, and JPEG formats are allowed.', 'error');
                        setTimeout(() => { 
                            window.open('$url', '_self');
                        }, 2000);
                    </script>";
                    exit;
                }
            }
        }

        $date = date('Y-m-d H:i:s');
        $query = "INSERT INTO deposits (user_id, method, amount, gift_card_code, gift_card_image, date_deposited, status) 
              VALUES ('$user', '$method', '$amount', '$gift_card_code', '$gift_card_image_path', '$date', '0')";
        if (mysqli_query($connection, $query)) {
            $url = $domain . 'app/deposits.php';
            echo "<script>
                Swal.fire('Deposit Recorded', 'Your deposit has been successfully recorded.', 'success');
                setTimeout(() => { 
                    window.open('$url', '_self');
                }, 2000);
            </script>";
        } else {
            echo "<script>
                Swal.fire('Error', 'An error occurred: " . mysqli_real_escape_string($connection, mysqli_error($connection)) . "', 'error');
                setTimeout(() => { 
                    window.open('$url', '_self');
                }, 2000);
            </script>";
        }
    }
    ?>

</body>

</html>