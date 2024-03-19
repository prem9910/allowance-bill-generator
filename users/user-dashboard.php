<?php
session_start();
include('../config.php');

// Get the user ID from the URL
$id = $_GET['emp_id'];

// Fetch the user's data from the database
$query = mysqli_query($con, "SELECT * FROM users WHERE emp_id = '$id'") or die(mysqli_error($con));
$user = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="./includes/styles.css">
</head>

<body>
    <nav><!--Navigation Bar Starts Here-->
        <ul>
            <a href="#">
                <li>
                    <p><span>NSTI</span>, Bengaluru</p>
                </li>
            </a><!--LOGO-->

            <a href="#" class="display-picture"><img src="https://i.pravatar.cc/85" alt=""></a><!--Profile Image-->
        </ul>

        <div class="card hidden"><!--ADD TOGGLE HIDDEN CLASS ATTRIBUTE HERE-->
            <ul><!--MENU-->
                <li><a href="#"><?php echo $user['username'] ?></li></a>
                <li><a href="#">Account</li></a>
                <li><a href="#">Log Out</li></a>
            </ul>
        </div>

    </nav><!--Navigation Bar Starts Here-->
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <?php
                if (isset($_SESSION['status'])) {
                ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Hey!</strong> <?php echo $_SESSION['status']; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php
                    unset($_SESSION['status']);
                }
                ?>

                <div class="card mt-4">
                    <div class="card-header">
                        <h4>Travel Details List
                            <a href="javascript:void(0)" class="add-more-form float-end btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">ADD MORE</a>

                        </h4>
                    </div>




                    <div class="card-body">

                        <form action="submit_travel_information.php" method="post">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>
                                            <label for="departure_date">Departure Date</label>
                                            <input type="date" id="departure_date" name="departure_date" class="form-control" required>
                                        </td>
                                        <td>
                                            <label for="origin_location">Origin Location</label>
                                            <input type="text" id="origin_location" name="origin_location" class="form-control" required placeholder="Enter Origin Location">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="arrival_date">Arrival Date</label>
                                            <input type="date" id="arrival_date" name="arrival_date" class="form-control" required>
                                        </td>
                                        <td>
                                            <label for="destination_location">Destination Location</label>
                                            <input type="text" id="destination_location" name="destination_location" class="form-control" required placeholder="Enter Destination Location">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="mode_of_transportation">Mode of Transportation</label>
                                            <input type="text" id="mode_of_transportation" name="mode_of_transportation" class="form-control" required placeholder="Enter Mode of Transportation">
                                        </td>
                                        <td>
                                            <label for="accommodation_class">Accommodation Class</label>
                                            <input type="text" id="accommodation_class" name="accommodation_class" class="form-control" required placeholder="Enter Accommodation Class">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="fare_amount">Fare Amount</label>
                                            <input type="text" id="fare_amount" name="fare_amount" class="form-control" required placeholder="Enter Fare Amount">
                                        </td>
                                        <td>
                                            <label for="distance_kilometers">Distance in Kilometers</label>
                                            <input type="text" id="distance_kilometers" name="distance_kilometers" class="form-control" required placeholder="Enter Distance in Kilometers">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <label for="travel_duration">Travel Duration</label>
                                            <input type="text" id="travel_duration" name="travel_duration" class="form-control" required placeholder="Enter Travel Duration">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <button type="submit" class="btn btn-primary mt-3">Submit</button>
                        </form>

                    </div>



                </div>

                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Travel Details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="travel-info.php" method="post">
                                    <div class="main-form mt-3 border-bottom">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="form-group mb-2">
                                                    <label for="departure_date">Departure Date</label>
                                                    <input type="date" id="departure_date" name="departure_date" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <div class="form-group mb-2">
                                                    <label for="origin_location">Origin Location</label>
                                                    <input type="text" id="origin_location" name="origin_location" class="form-control" required placeholder="Enter Origin Location">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="form-group mb-2">
                                                    <label for="arrival_date">Arrival Date</label>
                                                    <input type="date" id="arrival_date" name="arrival_date" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <div class="form-group mb-2">
                                                    <label for="destination_location">Destination Location</label>
                                                    <input type="text" id="destination_location" name="destination_location" class="form-control" required placeholder="Enter Destination Location">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group mb-2">
                                                    <label for="fare_amount">Fare Amount</label>
                                                    <input type="text" id="fare_amount" name="fare_amount" class="form-control" required placeholder="Enter Fare Amount">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group mb-2">
                                                    <label for="distance_kilometers">Distance in Kilometers</label>
                                                    <input type="text" id="distance_kilometers" name="distance_kilometers" class="form-control" required placeholder="Enter Distance in Kilometers">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group mb-2">
                                                    <label for="travel_duration">Travel Duration</label>
                                                    <input type="text" id="travel_duration" name="travel_duration" class="form-control" required placeholder="Enter Travel Duration">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group mb-2">
                                                    <label for="mode_of_transportation">Mode of Transportation</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="mode_of_transportation" id="by_air" value="Air" required>
                                                        <label class="form-check-label" for="by_air">
                                                            Air
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="mode_of_transportation" id="by_rail" value="Rail" required>
                                                        <label class="form-check-label" for="by_rail">
                                                            Rail
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="mode_of_transportation" id="by_road" value="Road" required>
                                                        <label class="form-check-label" for="by_road">
                                                            Road
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6" id="accommodation_class_options" style="display: none;">
                                                <div class="form-group mb-2">
                                                    <label for="accommodation_class">Accommodation Class</label>
                                                    <select class="form-select" id="accommodation_class" name="accommodation_class" required>
                                                        <!-- Options will be dynamically added based on the selected mode of transportation -->
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-secondary mt-3" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary mt-3">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Bootstrap JavaScript and jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const modeOfTransportationRadios = document.querySelectorAll('input[name="mode_of_transportation"]');
        const accommodationClassOptions = document.getElementById('accommodation_class_options');
        const accommodationClassSelect = document.getElementById('accommodation_class');

        modeOfTransportationRadios.forEach(radio => {
            radio.addEventListener('change', function() {
                if (this.checked) {
                    accommodationClassOptions.style.display = 'block';
                    if (this.value === 'Air') {
                        populateAccommodationClassOptions(['Economy Class', 'Business Class', 'First Class']);
                    } else if (this.value === 'Rail') {
                        populateAccommodationClassOptions(['Sleeper Class', 'AC 3 Tier', 'AC 2 Tier']);
                    } else if (this.value === 'Road') {
                        populateAccommodationClassOptions(['Standard', 'Deluxe', 'Luxury']);
                    }
                }
            });
        });

        function populateAccommodationClassOptions(options) {
            accommodationClassSelect.innerHTML = ''; // Clear previous options
            options.forEach(option => {
                const optionElement = document.createElement('option');
                optionElement.textContent = option;
                optionElement.value = option;
                accommodationClassSelect.appendChild(optionElement);
            });
        }
    </script>
</body>
<script src="./includes/script.js"></script>

</html>