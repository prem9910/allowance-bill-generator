<?php
session_start();
include('config.php');

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $email = $_POST['email'];
//     $password = $_POST['password'];

//     $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
//     $result = $con->query($sql);

//     if ($result->num_rows > 0) {
//         $user = $result->fetch_assoc();

//         // Access other details of the user
//         $username = $user['username']; // Replace 'username' with the actual column name in your table
//         $email = $user['email']; // Replace 'email' with the actual column name in your table
//         // Access other columns as needed

//         // Set session variables
//         $_SESSION['email'] = $email;
//         $_SESSION['username'] = $username;
//         // Set other session variables as needed

//         // Redirect to the user dashboard
//         // echo $_SESSION['email'];
//         header("Location: admin/index.php");
//         exit;
//     } else {
//         echo "Login failed";
//     }
// }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>

<body>
    <!-- <h2>Login</h2>
    <form method="post" action="">
        Email: <input type="text" name="email" required><br>
        Password: <input name="password" required><br>
        <input type="submit" value="Login">
    </form> -->
    <div class="login-container">
        <form method="POST" action="code.php" class="login-form">
            <h1>Welcome Back</h1>
            <p>Please login to your account</p>
            <div class="input-group">
                <input type="text" id="email" name="email" placeholder="Email" required>
            </div>
            <div class="input-group">
                <input type="password" id="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit" name="login_btn" class="btn btn-primary"> Login </button>
            <!-- <input type="submit" value="Login"> -->
            <div class="bottom-text">
                <p>Don't have an account? <a href="./register.php">Sign Up</a></p>
                <p><a href="forget_password.php">Forgot password?</a></p>
            </div>
        </form>
    </div>



</body>

</html>