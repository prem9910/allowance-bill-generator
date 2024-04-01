<?php 
session_start();
include('includes/header.php');
include('includes/navbar.php');
include('../security.php');

$email = $_SESSION['username'];

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
    $email = $_SESSION['username'];



    // Attempt to insert data into the database
    $sql = "INSERT INTO travel_information (departure_date, origin_location, arrival_date, destination_location, fare_amount, distance_kilometers, travel_duration, mode_of_transportation, accommodation_class, email) 
            VALUES ('$departure_date', '$origin_location', '$arrival_date', '$destination_location', '$fare_amount', '$distance_kilometers', '$travel_duration', '$mode_of_transportation', '$accommodation_class', '$email')";

    if (mysqli_query($con, $sql)) {
        // Redirect to the user dashboard or show a success message
        header("Location: add_travel.php");
        exit();
    } else {
        // Display an error message if the insertion fails
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
    }

    // Close connection
    mysqli_close($con);
}

?>

<div class="card-body">
    <div class="table-responsive">
        <?php
        $query = "SELECT * FROM travel_information where email = '$email'" ;
        $query_run = mysqli_query($con, $query);
        ?>

        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Departure Date</th>
                    <th>Origin Location</th>
                    <th>Arrival Date</th>
                    <th>Destination Location</th>
                    <th>Mode of Transportation</th>
                    <th>Accommodation Class</th>
                    <th>Fare Amount</th>
                    <th>Distance (Kilometers)</th>
                    <th>Travel Duration</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($query_run) > 0) {
                    while ($row = mysqli_fetch_assoc($query_run)) {
                ?>
                        <tr>
                            <td><?php echo $row['departure_date']; ?></td>
                            <td><?php echo $row['origin_location']; ?></td>
                            <td><?php echo $row['arrival_date']; ?></td>
                            <td><?php echo $row['destination_location']; ?></td>
                            <td><?php echo $row['mode_of_transportation']; ?></td>
                            <td><?php echo $row['accommodation_class']; ?></td>
                            <td><?php echo $row['fare_amount']; ?></td>
                            <td><?php echo $row['distance_kilometers']; ?></td>
                            <td><?php echo $row['travel_duration']; ?></td>
                            <td>
                                <form action="edit_travel.php" method="post">
                                    <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                                    <button type="submit" name="edit_btn" class="btn btn-success">Edit</button>
                                </form>
                            </td>
                            <td>
                                <form action="delete_travel.php" method="post">
                                    <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                                    <button type="submit" name="delete_btn" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                <?php
                    }
                } else {
                    echo "<tr><td colspan='13'>No Records Found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>


<?php
include('includes/scripts.php');
include('includes/footer.php');
?>