<?php
session_start();

// Include database connection
include('../config.php');

// Check if user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: ../index.php");
    exit;
}

$email = $_SESSION['email'];

// Retrieve user details from the database using the email
$sql = "SELECT * FROM users WHERE email='$email'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Fetch user details
    $email = $row['email'];
    $phone = $row['phone'];
    $address = $row['address'];
    $designation = $row['designation'];
    $pay = $row['pay'];
    $headquarters = $row['headquarters'];
} else {
    // User not found, handle accordingly
    header("Location: ../index.php");
    exit;
}

// Update profile details
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $designation = $_POST['designation'];
    $pay = $_POST['pay'];
    $headquarters = $_POST['headquarters'];

    $update_sql = "UPDATE users SET email='$email', phone='$phone', address='$address', designation='$designation', pay='$pay', headquarters='$headquarters' WHERE username='$username'";

    if ($conn->query($update_sql) === TRUE) {
        echo "Profile updated successfully";
        // Optionally, you can redirect the user to their updated profile page
    } else {
        echo "Error updating profile: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
    <h2>Update Profile</h2>
    <form method="post" action="">
        Email: <input type="email" name="email" value="<?php echo $email; ?>" required><br>
        Phone: <input type="text" name="phone" value="<?php echo $phone; ?>" required><br>
        Address: <input type="text" name="address" value="<?php echo $address; ?>" required><br>
        Designation: <input type="text" name="designation" value="<?php echo $designation; ?>" required><br>
        Pay: <input type="text" name="pay" value="<?php echo $pay; ?>" required><br>
        Headquarters: <input type="text" name="headquarters" value="<?php echo $headquarters; ?>" required><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>
