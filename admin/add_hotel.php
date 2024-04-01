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
                <h4 class="text-blue h5 mb-20">Add Hotel Details</h4>
            </div>
        </div>


    </div>

    <div class="modal-body col-md center-block">

        <div class="modal-body">
            <form action="hotel_details.php" method="post">
                <div class="main-form mt-2 mb-3 ">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="hotel_name">Hotel Name</label>
                                <input type="text" id="hotel_name" name="hotel_name" class="form-control" placeholder="Enter Hotel Name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="period_from">Period From</label>
                                <input type="date" id="period_from" name="period_from" class="form-control" placeholder="Select Period From" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="period_to">Period To</label>
                                <input type="date" id="period_to" name="period_to" class="form-control" placeholder="Select Period To" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="daily_rate">Daily Rate</label>
                                <input type="text" id="daily_rate" name="daily_rate" class="form-control" placeholder="Enter Daily Rate" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="total_amount_paid">Total Amount Paid</label>
                                <input type="text" id="total_amount_paid" name="total_amount_paid" class="form-control" placeholder="Enter Total Amount Paid" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary mt-3">Save changes</button>
                </div>
            </form>
        </div>
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
        enableTime: true,
        dateformat: "d-m-Y H:i",
        altInput: true,
        altFormat: "F j, Y (h:S K)"
    }
    // Otherwise, selectors are also supported
    flatpickr("input[type=date]", config);
</script>

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>