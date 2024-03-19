<?php
include('../config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input data
    $departure_date = mysqli_real_escape_string($con, $_POST['departure_date']);
    $origin_location = mysqli_real_escape_string($con, $_POST['origin_location']);
    $arrival_date = mysqli_real_escape_string($con, $_POST['arrival_date']);
    $destination_location = mysqli_real_escape_string($con, $_POST['destination_location']);
    $mode_of_transportation = mysqli_real_escape_string($con, $_POST['mode_of_transportation']);
    $accommodation_class = mysqli_real_escape_string($con, $_POST['accommodation_class']);
    $fare_amount = mysqli_real_escape_string($con, $_POST['fare_amount']);
    $distance_kilometers = mysqli_real_escape_string($con, $_POST['distance_kilometers']);
    $travel_duration = mysqli_real_escape_string($con, $_POST['travel_duration']);

    // Insert data into the database
    $sql = "INSERT INTO travel_information (departure_date, origin_location, arrival_date, destination_location, mode_of_transportation, accommodation_class, fare_amount, distance_kilometers, travel_duration) VALUES ('$departure_date', '$origin_location', '$arrival_date', '$destination_location', '$mode_of_transportation', '$accommodation_class', '$fare_amount', '$distance_kilometers', '$travel_duration')";

    if (mysqli_query($con, $sql)) {
        // Redirect to a success page or display a success message
        header('Location: user-dashboard.php');
        exit;
    } else {
        // Handle the error, e.g., display an error message or redirect to an error page
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }

    // Close the database connection
    mysqli_close($con);
}
?>