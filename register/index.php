<?php include('../server/connection.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <!-- SweetAlert CSS -->
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.5.0/dist/sweetalert2.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.5.0/dist/sweetalert2.min.js"></script>

<!-- SweetAlert JS -->



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

// Check if form is submitted
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Retrieve form data
    $email = trim($_POST['email']);
    $first_name = trim($_POST['firstname']);
    $last_name = trim($_POST['lastname']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm-password'];

    // Validate form data
    if (empty($email) || empty($first_name) || empty($last_name) || empty($password) || empty($confirm_password)) {
        echo '<script>
        Swal.fire({
            title: "Error!",
            text: "All fields are required!",
            icon: "error",
            confirmButtonText: "OK"
        });
      </script>';
        exit;
    }

    if ($password !== $confirm_password) {
        echo '<script>
        Swal.fire({
            title: "Error!",
            text: "Passwords do not match!",
            icon: "error",
            confirmButtonText: "OK"
        });
      </script>';
        exit;
    }

    // Prepare SQL query with placeholders to prevent SQL injection
    $stmt = $connection->prepare("INSERT INTO users (email, user, name, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $email, $first_name, $last_name, $password);

    // Execute the query
    if ($stmt->execute()) {
        echo '<script>
        Swal.fire({
            title: "Success!",
            text: "Registration successful!",
            icon: "success",
            confirmButtonText: "OK"
        }).then(function() {
            window.location.href = "../login/";
        });
      </script>';
    } else {
        echo '<script>
        Swal.fire({
            title: "Error!",
            text: "Error: ' . $stmt->error . '",
            icon: "error",
            confirmButtonText: "OK"
        });
      </script>';
    }
}

?>








    <div class="container">
        <h2>Create Account</h2>
        <form method="POST">
    <div class="input-group">
        <label for="email">Email Address</label>
        <input type="email" name="email" id="email" placeholder="Email Address" required>
    </div>

    <div class="name-fields">
        <div class="input-group">
            <label for="first-name">First Name</label>
            <input type="text" name="firstname" id="first-name" placeholder="First Name" required>
        </div>
        <div class="input-group">
            <label for="last-name">Last Name</label>
            <input type="text" name="lastname" id="last-name" placeholder="Last Name" required>
        </div>
    </div>

    <div class="input-group">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="Password" required>
    </div>

    <div class="input-group">
        <label for="confirm-password">Confirm Password</label>
        <input type="password" name="confirm-password" id="confirm-password" placeholder="Confirm Password" required>
    </div>

    <div class="show-password">
        <input type="checkbox" name="show-password" id="show-password">
        <label for="show-password">Show password?</label>
    </div>

    <button name="reg_btn" type="submit" class="register-btn">Register</button>
</form>


        <p class="login-link">Already have an account? <a href="<?php echo $domain?>login/">Login</a></p>
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