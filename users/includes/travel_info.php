<?php
session_start();
include('../config.php');

if (isset($_POST['travel_info'])) {
    $departure_date = $_POST['departure_date'];
    $origin_location = $_POST['origin_location'];
    $arrival_date = $_POST['arrival_date'];
    $destination_location = $_POST['destination_location'];
    $mode_of_transportation = $_POST['mode_of_transportation'];
    $accommodation_class = $_POST['accommodation_class'];
    $fare_amount = $_POST['fare_amount'];
    $distance_kilometers = $_POST['distance_kilometers'];
    $travel_duration = $_POST['travel_duration'];

    $query = "INSERT INTO travel_information (departure_date, origin_location, arrival_date, destination_location, mode_of_transportation, accommodation_class, fare_amount, distance_kilometers, travel_duration) VALUES ('$departure_date', '$origin_location', '$arrival_date', '$destination_location', '$mode_of_transportation', '$accommodation_class', '$fare_amount', '$distance_kilometers', '$travel_duration')";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['status'] = "Travel Information Inserted Successfully";
        header("Location: user-dashboard.php");
        exit(0);
    } else {
        $_SESSION['status'] = "Travel Information Not Inserted";
        header("Location: user-dashboard.php");
        exit(0);
    }
}
?>
