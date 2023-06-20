<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Car Rental Agreement</title>
</head>

<body>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            width: 60%;
            margin: 0 auto;
        }

        h1 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        .footer {
            text-align: center;
            margin-top: 50px;
        }

        .signature-section {
            display: flex;
            justify-content: space-between;
            margin-top: 30px;



        }

        .signature-box {
            width: 40%;
            padding: 10px;
            border: 1px solid #4b4747c4;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;

        }

        .picture-section {
            text-align: center;
            margin-top: 30px;
        }

        .psin1 {
            top: 0;
        }

        .psin2 {
            top: 0;

        }

        .car-info {
            margin-top: 30px;
        }

        .navbar {
            display: flex;
            height: 70px;
        }

        .title {
            width: 80%;
        }

        .QRC {
            width: 10%;
            border: 1px solid rgb(109, 106, 106);

        }

        .Clogo {
            padding-right: 100px;
            width: 10%;
            justify-content: center;
            padding-top: 10px
        }

        .Clogo img {
            block-size: 50px;

        }

        .signature-box img {
            width: 40%;
            padding-top: 10px;

        }

        .signature-box p {
            padding: 0;
            margin: 0;
            width: max-content;
        }
    </style>
    <div class="container">
        <div class="navbar">
            <div class="Clogo">
                <img src="{{ asset('images/logo.png')}}" class="img-fluid">
            </div>
            <div class="title">
                <h1>Car Rental Agreement</h1>
            </div>
            <div class="QRC">

            </div>
        </div>


        <table>
            <tr>
                <th>Customer Name</th>
                <td>{{$order->fullName??$order->name}}</td>
            </tr>
            <tr>
                <th>Customer CIN</th>
                <td>{{$order->CIN}}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{$order->email}}</td>
            </tr>
            <tr>
                <th>Car Model</th>
                <td>{{$order->model}}</td>
            </tr>
            <tr>
                <th>Rental Start Date</th>
                <td>{{$order->pick_up_date}}</td>
            </tr>
            <tr>
                <th>Rental End Date</th>
                <td>{{$order->drop_off_date}}</td>
            </tr>
            <tr>
                <th>Color</th>
                <td>{{$order->color}}</td>
            </tr>
            <tr>
                <th>Year</th>
                <td>{{$order->year}}</td>
            </tr>
        </table>

        <div class="signature-section">
            <div class="signature-box">
                <p class="psin1">Rental Agency's Signature:</p>
                <img src="{{ asset('images/cache.png')}}" class="img-fluid">
            </div>
            <div class="signature-box">
                <p class="psin2">Rental Agency's Seal:</p>
            </div>
        </div>
        <div class="footer">
            <p>Car Rental Agreement - &copy; 2023 Your Company Name</p>
        </div>
    </div>
</body>

</html>
