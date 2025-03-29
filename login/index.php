<?php include('../server/connection.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.5.0/dist/sweetalert2.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.5.0/dist/sweetalert2.min.js"></script>

    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }

    body {
        background-color: #121212;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .container {
        background-color: #1E1E1E;
        padding: 2rem;
        border-radius: 10px;
        width: 90%;
        max-width: 400px;
        text-align: center;
    }

    h2 {
        color: white;
        margin-bottom: 1rem;
    }

    .input-group {
        text-align: left;
        margin-bottom: 1rem;
    }

    .input-group label {
        display: block;
        color: white;
        font-weight: 600;
        margin-bottom: 5px;
        font-size: 12px;
    }

    .input-group input {
        width: 100%;
        padding: 10px;
        background-color: #2A2A2A;
        border: none;
        border-radius: 5px;
        color: white;
    }

    .name-fields {
        display: flex;
        gap: 10px;
    }

    .name-fields input {
        flex: 1;
    }

    .show-password {
        display: flex;
        align-items: center;
        color: white;
        font-size: 12px;
        margin-bottom: 1rem;
    }

    .show-password input {
        margin-right: 5px;
    }

    .register-btn {
        background-color: #4EE1AC;
        color: black;
        font-weight: bold;
        border: none;
        padding: 10px;
        width: 100%;
        border-radius: 5px;
        cursor: pointer;
    }

    .register-btn:hover {
        background-color: #3AD29F;
    }

    .login-link {
        margin-top: 1rem;
        color: white;
        font-size: 12px;
    }

    .login-link a {
        color: #4EE1AC;
        text-decoration: none;
        font-weight: bold;
    }

    .login-link a:hover {
        text-decoration: underline;
    }

    .language-selector {
        position: absolute;
        bottom: 10px;
        right: 10px;
    }
    </style>
</head>

<body>

<?php



// Check if the login form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login_btn'])) {

    // Retrieve form data
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // Validate form data
    if (empty($email) || empty($password)) {
        echo '<script>
        Swal.fire({
            title: "Error!",
            text: "Email and password are required!",
            icon: "error",
            confirmButtonText: "OK"
        });
        </script>';
        exit;
    }

    // Prepare SQL query to check if user exists and get approval status
    $stmt = mysqli_query($connection,"SELECT * FROM users WHERE email ='$email' AND password='$password'");
   

    // Check if the user exists
    if (mysqli_num_rows($stmt)) {
        
        $row = mysqli_fetch_assoc($stmt);

        $is_approved = $row['is_approved'];
        $user_id  = $row['id'];


        // Verify password
      
            // Check if the account is approved by the admin
            if ($is_approved == 1) {
                

                $_SESSION['logged_in'] = $user_id;


                // User is approved, allow login
                echo '<script>
                Swal.fire({
                    title: "Success!",
                    text: "Login successful!",
                    icon: "success",
                    confirmButtonText: "OK"
                }).then(function() {
                    window.location.href = "../app/";
                });
                </script>';
                
            } else {
                // Account is not approved
                echo '<script>
                Swal.fire({
                    title: "Warning!",
                    text: "Your account is not approved yet. Please wait for admin approval.",
                    icon: "warning",
                    confirmButtonText: "OK"
                });
                </script>';
                
            }
       
    } else {
        // User does not exist
        echo '<script>
        Swal.fire({
            title: "Error!",
            text: "Invalid email or password.",
            icon: "error",
            confirmButtonText: "OK"
        });
        </script>';
        
    }

    // Close the statement
    $stmt->close();
    $connection->close();
}
?>



    <div class="container">
        <h2>Create Account</h2>

        <form method="POST">
            <div class="input-group">
                <label for="email">Email Address</label>
                <input type="email" name="email" id="email" placeholder="Email Address">
            </div>



            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Password">
            </div>



            <div class="show-password">
                <input type="checkbox" id="show-password">
                <label for="show-password">Show password?</label>
            </div>

            <button name="login_btn" class="register-btn">Login</button>
        </form>

        <p class="login-link">If you have an account? <a href="<?php echo $domain?>register">Register</a></p>
    </div>

    <div class="language-selector">
        <select>
            <option>Select Language</option>
            <option>English</option>
            <option>Spanish</option>
            <option>French</option>
        </select>
    </div>

</body>

</html>