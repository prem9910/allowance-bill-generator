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
    <div class="modal fade" id="hotelModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Profile Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="update_profile.php" method="post">
                        <div class="main-form mt-3 border-bottom">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label for="username">Username</label>
                                        <input type="text" id="username" name="username" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label for="email">Email</label>
                                        <input type="email" id="email" name="email" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label for="phone">Phone Number</label>
                                        <input type="text" id="phone" name="phone" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label for="password">Password</label>
                                        <input type="password" id="password" name="password" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label for="address">Address</label>
                                        <input type="text" id="address" name="address" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label for="designation">Designation</label>
                                        <input type="text" id="designation" name="designation" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label for="pay">Pay</label>
                                        <input type="text" id="pay" name="pay" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label for="headquarters">Headquarters</label>
                                        <input type="text" id="headquarters" name="headquarters" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-secondary mt-3" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary mt-3">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>