<?php 

include('../config.php');

// Get the user ID from the URL
$id = $_GET['id'];

// Fetch the user's data from the database
$query = mysqli_query($con, "SELECT * FROM users WHERE id = '$id'") or die(mysqli_error($con));
$user = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>User Dashboard </h1>
        <h1>Welcome, <?php echo $user['username']?></h1>
        
        <div class="section">
            <h2>Travel Details</h2>
            <form action="submit_travel_details.php" method="post">
                <label for="departure_date">Departure Date:</label>
                <input type="date" id="departure_date" name="departure_date" required><br>
                <label for="origin_location">Origin Location:</label>
                <input type="text" id="origin_location" name="origin_location" required><br>
                <!-- Add more input fields for travel details as needed -->
                <button type="submit">Submit</button>
            </form>
        </div>
        
        <div class="section">
            <h2>Hotel Details</h2>
            <form action="submit_hotel_details.php" method="post">
                <label for="hotel_name">Hotel Name:</label>
                <input type="text" id="hotel_name" name="hotel_name" required><br>
                <label for="check_in_date">Check-in Date:</label>
                <input type="date" id="check_in_date" name="check_in_date" required><br>
                <!-- Add more input fields for hotel details as needed -->
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>
</body>
</html>

