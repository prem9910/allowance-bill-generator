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
        $query = "SELECT * FROM hoteldetails where email = '$email'";
        $query_run = mysqli_query($con, $query);
        ?>

        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Hotel Name</th>
                    <th>Period From</th>
                    <th>Period To</th>
                    <th>Daily Rate</th>
                    <th>Total Amount Paid</th>
                    <th>EDIT</th>
                    <th>DELETE</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($query_run) > 0) {
                    while ($row = mysqli_fetch_assoc($query_run)) {
                ?>
                        <tr>
                            <td><?php echo $row['hotel_name']; ?></td>
                            <td><?php echo $row['period_from']; ?></td>
                            <td><?php echo $row['period_to']; ?></td>
                            <td><?php echo $row['daily_rate']; ?></td>
                            <td><?php echo $row['total_amount_paid']; ?></td>
                            <td>
                                <form action="hotel_edit.php" method="post">
                                    <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                                    <button type="submit" name="edit_btn" class="btn btn-success">EDIT</button>
                                </form>
                            </td>
                            <td>
                                <form action="hotel_code.php" method="post">
                                    <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                                    <button type="submit" name="delete_btn" class="btn btn-danger">DELETE</button>
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