<?php
session_start();
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Access other details of the user
        $username = $user['username']; // Replace 'username' with the actual column name in your table
        $email = $user['email']; // Replace 'email' with the actual column name in your table
        // Access other columns as needed

        // Set session variables
        $_SESSION['email'] = $email;
        $_SESSION['username'] = $username;
        // Set other session variables as needed

        // Redirect to the user dashboard
        // echo $_SESSION['email'];
        header("Location: users/dashboard.php");
        exit;
    } else {
        echo "Login failed";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>

<body>
    <h2>Login</h2>
    <form method="post" action="">
        Email: <input type="text" name="email" required><br>
        Password: <input  name="password" required><br>
        <input type="submit" value="Login">
    </form>

    

</body>

</html>