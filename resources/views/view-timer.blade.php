<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        body,
        html {
            height: 100%;
            margin: 0;
        }

        .bgimg {
            background-image: url('https://www.w3schools.com/w3images/forestbridge.jpg');
            height: 100%;
            background-position: center;
            background-size: cover;
            position: relative;
            color: white;
            font-family: "Courier New", Courier, monospace;
            font-size: 25px;
        }

        .topleft {
            position: absolute;
            top: 0;
            left: 16px;
        }

        .middle {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
        }

        p {
            margin-top: 20px;
            margin-left: 250px;
            margin-bottom: 1rem;
        }

        hr {
            margin: auto;
            width: 40%;
        }
    </style>
</head>

<body>
    <div class="bgimg">
        <div class="topleft">
            <p>Laravel Dynamic Countdown Timer Example-8bityard.com</p>
        </div>
        <div class="middle">
            <h1>COMING SOON</h1>
            <hr>
            <h1><b>Time <span id="timer" style="color: red">0.00</span></b></h1><br>
        </div>
    </div>

</body>

</html>
