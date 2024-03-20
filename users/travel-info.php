<?php
// Start the session
session_start();

// Check if the user is logged in and emp_id is set in the session
if (!isset($_SESSION['emp_id'])) {
    // Redirect to the login page or show an error message
    header("Location: login.php");
    exit();
}

// Include the database connection file
include_once '../config.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $departure_date = mysqli_real_escape_string($con, $_POST['departure_date']);
    $origin_location = mysqli_real_escape_string($con, $_POST['origin_location']);
    $arrival_date = mysqli_real_escape_string($con, $_POST['arrival_date']);
    $destination_location = mysqli_real_escape_string($con, $_POST['destination_location']);
    $fare_amount = mysqli_real_escape_string($con, $_POST['fare_amount']);
    $distance_kilometers = mysqli_real_escape_string($con, $_POST['distance_kilometers']);
    $travel_duration = mysqli_real_escape_string($con, $_POST['travel_duration']);
    $mode_of_transportation = mysqli_real_escape_string($con, $_POST['mode_of_transportation']);
    $accommodation_class = mysqli_real_escape_string($con, $_POST['accommodation_class']);

    // Get the emp_id from the session
    $emp_id = $_SESSION['emp_id'];

    // Attempt to insert data into the database
    $sql = "INSERT INTO travel_information (departure_date, origin_location, arrival_date, destination_location, fare_amount, distance_kilometers, travel_duration, mode_of_transportation, accommodation_class, emp_id) 
            VALUES ('$departure_date', '$origin_location', '$arrival_date', '$destination_location', '$fare_amount', '$distance_kilometers', '$travel_duration', '$mode_of_transportation', '$accommodation_class', '$emp_id')";
    
    if(mysqli_query($con, $sql)){
        // Redirect to the user dashboard or show a success message
        header("Location: user_dashboard.php");
        exit();
    } else{
        // Display an error message if the insertion fails
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
     
    // Close connection
    mysqli_close($conn);
}
?>
