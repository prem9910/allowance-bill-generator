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
        <table class="table table-bordered table-hover">
            <thead style="text-align: center;">
                <tr>
                    <th colspan="2" style="vertical-align: middle;">Period of Expenditure</th>
                    <th rowspan="2" style="vertical-align: middle;">Name of Restaurant</th>
                    <th rowspan="2" style="vertical-align: middle;">Amount Spent (Rs.)</th>
                </tr>
                <tr>
                    <th>From</th>
                    <th>To</th>
                </tr>
            </thead>

            <tbody>
                <!-- PHP code to fetch data from the MySQL table and loop through each row -->
                <?php
                // SQL query to retrieve data from the table
                $sql = "SELECT * FROM `Food` WHERE email = '$email'";
                $result = $con->query($sql);

                // Check if there are any rows in the result
                if ($result->num_rows > 0) {
                    // Output data of each row
                    while ($food = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $food['period_from'] . "</td>";
                        echo "<td>" . $food['period_to'] . "</td>";
                        echo "<td>" . $food['restaurant'] . "</td>";
                        echo "<td>" . $food['amount'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No data found</td></tr>";
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