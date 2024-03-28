<?php 
session_start();
include('includes/header.php');
include('includes/navbar.php');
include('../security.php');

$email = $_SESSION['username'];

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