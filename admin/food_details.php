<?php
session_start();
include('includes/header.php');
include('includes/navbar.php');
include('../security.php');

$email = $_SESSION['username'];

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $restaurant = mysqli_real_escape_string($con, $_POST['restaurant']);
    $period_from = mysqli_real_escape_string($con, $_POST['period_from']);
    $period_to = mysqli_real_escape_string($con, $_POST['period_to']);
    $amount = mysqli_real_escape_string($con, $_POST['amount']);
    // $email = $_SESSION['username'];

    // Attempt to insert data into the database
    $sql = "INSERT INTO Food (restaurant, period_from, period_to, amount, email) 
            VALUES ('$restaurant', '$period_from', '$period_to', '$amount', '$email')";

    if (mysqli_query($con, $sql)) {
        // Redirect to the user dashboard or show a success message
        header("Location: add_food.php");
        // echo "<script type='text/javascript'>alert('Added Successfully');</script>";
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
        $query = "SELECT * FROM food where email = '$email'";
        $query_run = mysqli_query($con, $query);
        ?>
        <table class="table table-bordered table-hover">
            <thead style="text-align: center;">
                <tr>
                    <th colspan="2" style="vertical-align: middle;">Period of Expenditure</th>
                    <th rowspan="2" style="vertical-align: middle;">Name of Restaurant</th>
                    <th rowspan="2" style="vertical-align: middle;">Amount Spent (Rs.)</th>
                    <th rowspan="2" style="vertical-align: middle;">Edit</th>
                    <th rowspan="2" style="vertical-align: middle;">Delete</th>
                </tr>
                <tr>
                    <th>From</th>
                    <th>To</th>
                </tr>
            </thead>

            <tbody>
                
                <?php
                if (mysqli_num_rows($query_run) > 0) {
                    while ($row = mysqli_fetch_assoc($query_run)) {
                ?>
                        <tr>
                            <td><?php echo $row['period_from']; ?></td>
                            <td><?php echo $row['period_to']; ?></td>
                            <td><?php echo $row['restaurant']; ?></td>
                            <td><?php echo $row['amount']; ?></td>
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