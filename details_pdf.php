<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details Pdf</title>
</head>
<style>
    .user-details > table,tr,td,th{
        width: 100%;
        border-collapse: collapse;
        border:none;
    }

    .user-details> td{
        font-weight: 500;
        border: none;
        padding: 10px;
    }

    .travel-details>table{
        margin-top: 30px;
        width: 100%;
        border-collapse: collapse;
    }
    .travel-details > tr,th,td{
        width: 100%;
        padding: 15px;
        border: 1px solid black;

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
        <p style="margin: 20px 0; ">NOTE: This bill should be prepared in duplicate, one for payment and the other as office copy</p>
        
        <p style="text-align: center; margin:40px 0;"><b>PART-A</b></p>
        <div class="user-details">
            <table>
                <tr>
                    <td>1. Name: <?=$user['username']?></td>
                    <td>2. Designation: <?=$user['desig']?></td>
                </tr>
                <tr>
                    <td>3. Pay: <?=$user['pay']?></td>
                    <td>4. Headquaters: <?=$user['hq']?></td>
                </tr>
                <tr>
                    <td>5. Details and purpose of Journey (s) performed: <?=$user['purpose']?></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="travel-details">
        <table>
            <tr>
                <th colspan="2">Departure</th>
                <th colspan="2">Arrival</th>
                <th colspan="2">Mode of travel</th>
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
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>

        </table>
    </div>

</body>
</html>