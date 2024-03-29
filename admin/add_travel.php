<?php
// Start the session
session_start();
include('includes/header.php');
include('includes/navbar.php');
include('../security.php');

?>

<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">

            <div class="col-md-12 mt-2">
                <h4 class="text-blue h5 mb-20">Add Travel Details</h4>
            </div>
        </div>


    </div>

    <div class="modal-body col-md center-block">
        <form action="travel_details.php" method="post">
            <div class="main-form mt-3 border-bottom">
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group mb-2">
                            <label for="departure_date">Departure Date</label>
                            <input type="date" id="departure_date" name="departure_date" class="form-control" placeholder="Select Date & Time" required>
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
                            <input type="date" id="arrival_date" name="arrival_date" class="form-control" placeholder="Select Date & Time" required>
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
                <!-- <button type="submit" class="btn btn-secondary mt-3" data-bs-dismiss="modal">Close</button> -->
                <button type="submit" class="btn btn-primary mt-3">Save Changes</button>
            </div>
        </form>
    </div>

</div>

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
    <!-- Flatpicker -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        config = {
            enableTime:true,
            dateformat: "d-m-Y H:i",
            altInput:true,
            altFormat:"F j, Y (h:S K)"
        }
        // Otherwise, selectors are also supported
        flatpickr("input[type=date]", config);
    </script>

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>