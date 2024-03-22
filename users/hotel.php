<?php
// Start the session
session_start();

// Check if the user is logged in and email is set in the session
if (!isset($_SESSION['email'])) {
    // Redirect to the login page or show an error message
    header("Location: ../index.php");
    exit();
}

// Include the database connection file
include_once '../config.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $hotel_name = mysqli_real_escape_string($con, $_POST['hotel_name']);
    $period_from = mysqli_real_escape_string($con, $_POST['period_from']);
    $period_to = mysqli_real_escape_string($con, $_POST['period_to']);
    $daily_rate = mysqli_real_escape_string($con, $_POST['daily_rate']);
    $total_amount_paid = mysqli_real_escape_string($con, $_POST['total_amount_paid']);

    // Get the email from the session
    $email = $_SESSION['email'];

    // Attempt to insert data into the database
    $sql = "INSERT INTO hoteldetails (hotel_name, period_from, period_to, daily_rate, total_amount_paid, email) 
            VALUES ('$hotel_name', '$period_from', '$period_to', '$daily_rate', '$total_amount_paid', '$email')";

    if(mysqli_query($con, $sql)){
        // Redirect to the user dashboard or show a success message
        header("Location: dashboard.php");
        exit();
    } else{
        // Display an error message if the insertion fails
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
    }
     
    // Close connection
    mysqli_close($con);
}
?>
