<!DOCTYPE html>
<html>
<head>
    <title>404</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <style>
        html, body {
            margin-top: 100px;
            margin-bottom: 100px;
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
            /*vertical-align: middle;*/
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
        .btn {
            display: inline-block;
            padding: 12px 24px;
            margin-bottom: 0;
            font-size: 28px;
            font-weight: normal;
            line-height: 1.42857143;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            -ms-touch-action: manipulation;
            touch-action: manipulation;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            background-image: none;
            border: 1px solid transparent;
            border-radius: 4px;
        }
        .btn-default {
            color: #333;
            background-color: #fff;
            border-color: #ccc;
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="{{ asset('images/404.jpg') }}" width="720px" alt="頁面找不到"><br><br>
        <a href="{{ url()->previous() }}">
            <button class="btn btn-default">Go Back</button>
        </a>
    </div>
</body>
</html>