<?php
session_start();

// Check if user is already logged in, redirect to dashboard if true
if(isset($_SESSION['email'])) {
    header("Location: dashboard.php");
    exit;
}


include './config.php';


// Check if form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Sanitize input to prevent SQL injection
    $email = mysqli_real_escape_string($con, $email);
    $password = mysqli_real_escape_string($con, $password);

    // Hash password (you should use a stronger hashing algorithm like bcrypt)
    $hashed_password = md5($password);

    // Prepare SQL statement to insert new user into database
    $sql = "INSERT INTO users (email, password) VALUES ('$email', '$hashed_password')";

    if ($con->query($sql) === TRUE) {
        // Registration successful, redirect to login page
        header("Location: login.php");
        exit;
    } else {
        // Registration failed, show error message
        $error = "Error: " . $sql . "<br>" . $con->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2 class="text-center text-dark mt-5">Registration Form</h2>
                <div class="text-center mb-5 text-dark">Made with Bootstrap</div>
                <div class="card my-5">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"
                        class="card-body cardbody-color p-lg-5">

                        <div class="mb-3">
                            <input type="text" class="form-control" id="email" name="email"
                                aria-describedby="emailHelp" placeholder="Email">
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Password">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-color px-5 mb-5 w-100">Register</button>
                        </div>
                        <?php if(isset($error)) { ?>
                        <div class="alert alert-danger"><?php echo $error; ?></div>
                        <?php } ?>
                        <div id="emailHelp" class="form-text text-center mb-5 text-dark">Already Registered? <a
                                href="index.php" class="text-dark fw-bold">Login Here</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php
// Close connection
$con->close();
?>
