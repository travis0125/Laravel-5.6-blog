<!DOCTYPE html>
<html>
<head>
    <title>Be right back.</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <style>
        html, body {
            height: 100%;
        }
        body {
            margin: 0;
            padding: 0;
            width: 100%;
            color: #B0BEC5;
            display: table;
            font-weight: 100;
            font-family: 'Lato';
        }
        .container {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }
        .content {
            text-align: center;
            //display: inline-block;
            margin-left:auto;
            margin-right:auto;
        }
        .title {
            font-size: 72px;
            margin-bottom: 40px;
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="{{ asset('images/error.gif') }}" alt="維修中">
    </div>
</body>
</html>