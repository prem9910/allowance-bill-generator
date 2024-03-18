<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details Pdf</title>
    <link rel="stylesheet" href="./includes/style.css">
</head>
<style>
    table,
    tr,
    td,
    th {
        border: 1px solid black;
    }

    /* FOR USER DEATAILS */
    .user-details table {
        width: max-content;
        margin-bottom: 30px;
        /* font-weight: 500; */
        border: none;
        /* text-align: center; */
    }

    .user-details span{
        font-weight: 500;
    }

    .user-details td {
        border: none;
        width: 100%;
        padding: 10px;
    }

    .travel-details table {
        width: 100%;
        border-collapse: collapse;
    }

    .travel-details th,
    .travel-details td {
        padding: 9px;
        text-align: center;
    }

    .travel-details th {
        font-weight: bold;
    }

    .travel-details th {
        width: 30%;
        /* Adjust width as needed */
    }

    .travel-details th[colspan="2"],
    .travel-details th[rowspan="2"] {
        vertical-align: middle;
    }

    .hotel-details table {
        width: 100%;
        border-collapse: collapse;
    }

    .hotel-details th,
    .hotel-details td {
        padding: 8px;
        text-align: center;
    }

    .hotel-details th {
        font-weight: bold;
    }

    .hotel-details th[colspan="2"] {
        width: 30%;
        /* Adjust width as needed */
    }

    .hotel-details th[colspan="2"],
    .hotel-details th[rowspan="2"] {
        vertical-align: middle;
    }

    .hotel-details th[rowspan="2"] {
        width: 20%;
        /* Adjust width as needed */
    }

    .details .title{
        font-weight: 500;
    }
</style>

<body style="margin: 0; width:100%;">
    <div class="header">
        <p style="margin: 5px 0;">TR-25A</p>
        <p style="margin: 5px 0;">GAR-14</p>
        <div style="text-align: center;" class="heading">
            <p><b>NATIONAL SKILL TRAINING INSTITUTE : BENGALURU – 560022</b></p>
            <p>(TRAVELLING ALLOWANCE BILL FOR TOUR)</p>
        </div>
        <p style="margin: 20px 0; ">NOTE: This bill should be prepared in duplicate, one for payment and the other as
            office copy</p>

        <p style="text-align: center; margin:40px 0;"><b>PART-A</b></p>
        <div class="user-details">
            <table>
                <tr>
                    <td><span>1. Name:</span> <?= $user['username'] ?></td>
                    <td><span>2. Designation:</span> <?= $user['desig'] ?></td>
                </tr>
                <tr>
                    <td><span>3. Pay:</span> <?= $user['pay'] ?></td>
                    <td><span>4. Headquaters:</span> <?= $user['hq'] ?></td>
                </tr>
                <tr>
                    <td colspan="2"><span>5. Details and purpose of Journey (s) performed:</span> <?= $user['purpose'] ?></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="travel-details">
        <table>
            <tr>
                <th colspan="2">Departure</th>
                <th colspan="2">Arrival</th>
                <th colspan="2" style="width:30%;">Mode of travel</th>
                <th>Fare paid</th>
                <th rowspan="2">Distance in Kms for road mileage</th>
                <th>Duration of halt</th>
            </tr>
            <tr>
                <th>Date & Time</th>
                <th>From</th>
                <th>Date & Time</th>
                <th>To</th>
                <th>Mode of travel</th>
                <th>class of accommodation</th>
                <th>Rs.</th>
                <th>Days/Hours</th>
            </tr>
            <tr>
                <td><?= $travel['departure_date'] ?></td>
                <td><?= $travel['origin_location'] ?></td>
                <td><?= $travel['arrival_date'] ?></td>
                <td><?= $travel['destination_location'] ?></td>
                <td><?= $travel['mode_of_transportation'] ?></td>
                <td><?= $travel['accommodation_class'] ?></td>
                <td><?= $travel['fare_amount'] ?></td>
                <td><?= $travel['distance_kilometers'] ?></td>
                <td><?= $travel['travel_duration'] ?></td>
            </tr>

        </table>
    </div>
    <div class="details">
        <ol start="6">
            <li class="title">Mode of Journey</li>
            <ol type="i" style="margin: 10px;">
                <li>Air</li>
                <table style="width: 80%;border:none;">
                    <tr style="border: none;">
                        <td style="border: none;">
                            <p>(a) Exchange voucher arranged by office</p>
                            <p>(b) Ticket/Exchange voucher arranged by</p>
                        </td>
                        <td style="border: none;">
                            <p>YES/NO</p>
                        </td>
                    </tr>
                </table>

                <li>Rail</li>
                <table style="width: 95%;border:none;">
                    <tr style="border: none;">
                        <td style="border: none; width:80%;">
                            <p>(a) Whether traveled by mail/express/ordinary train?</p>
                            <p>(b) Whether return ticket available?</p>
                            <p>(c) If available, whether return tickets purchased? If not, state reasons.</p>
                        </td>
                        <td style="border: none;">
                            <p>YES/NO</p>
                        </td>
                    </tr>
                </table>
                <li>Road</li>
                <p>Mode of conveyance used, i.e., by Government transport/by taking a taxi, a single seat in a bus or other public conveyance/by seating with another Government servant in a car belonging to him or to a third person to be specified.</p>
            </ol>
            <li class="title">Dates of absence from place of:</li>
            <p>(a) R.H. and C.L</p>
            <p>(b) Not being actually in camp on Sundays and Holidays.</p>
            <li class="title">Dates of which free board and or lodging provided by the state or any organization financed by state funds.</li>
            <p>(a) Board only</p>
            <p>(b) Lodging only</p>
            <p>(c) Board and lodging</p>
            <li class="title">Particulars to be furnished along with hotel receipts etc. in cases where higher rate D.A. is claimed for stay in hotel/other establishments providing board and or lodging at scheduled tariff</li>

        </ol>


    </div>


    <div class="hotel-details">
        <table>
            <tr>
                <th colspan="2" style="">Period of Stay</th>
                <th rowspan="2">Name of Hotel</th>
                <th rowspan="2">Daily rate of lodging charged Rs.</th>
                <th rowspan="2">Total amount paid Rs.</th>
            </tr>
            <tr>
                <th>From</th>
                <th>To</th>

            </tr>
            <tr>
                <td><?= $hotel['period_from'] ?></td>
                <td><?= $hotel['period_to'] ?></td>
                <td><?= $hotel['hotel_name'] ?></td>
                <td><?= $hotel['daily_rate'] ?></td>
                <td><?= $hotel['total_amount_paid'] ?></td>
            </tr>

        </table>
    </div>

</body>

</html>