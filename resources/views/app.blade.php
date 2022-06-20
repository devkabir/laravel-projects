<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" value="{{ csrf_token() }}" />
    <title> Room Booking API </title>
    <link href="{{ mix('css/app.css') }}" type="text/css" rel="stylesheet" />
    <style type="text/css">
    body {
        padding: 2vw;
        color: white;
        justify-content: center;
        background: #222;
    }

    th {
        color: white;
    }

    td {
        color: white;
    }

    h1 {
        font-size: calc(12px + 5vh);
        line-height: calc(12px + 5vh);
        text-shadow: 0 0 5px #ffa500, 0 0 15px #ffa500, 0 0 20px #ffa500, 0 0 40px #ffa500, 0 0 60px #ff0000, 0 0 10px #ff8d00, 0 0 98px #ff0000;
        color: #fff6a9;
        text-align: center;
        animation: blink 12s infinite;
        -webkit-animation: blink 12s infinite;
    }

    @-webkit-keyframes blink {

        20%,
        24%,
        55% {
            color: #111;
            text-shadow: none;
        }

        0%,
        19%,
        21%,
        23%,
        25%,
        54%,
        56%,
        100% {
            text-shadow: 0 0 5px #ffa500, 0 0 15px #ffa500, 0 0 20px #ffa500, 0 0 40px #ffa500, 0 0 60px #ff0000, 0 0 10px #ff8d00, 0 0 98px #ff0000;
            color: #fff6a9;
        }
    }

    @keyframes blink {

        20%,
        24%,
        55% {
            color: #111;
            text-shadow: none;
        }

        0%,
        19%,
        21%,
        23%,
        25%,
        54%,
        56%,
        100% {
            text-shadow: 0 0 5px #ffa500, 0 0 15px #ffa500, 0 0 20px #ffa500, 0 0 40px #ffa500, 0 0 60px #ff0000, 0 0 10px #ff8d00, 0 0 98px #ff0000;
            color: #fff6a9;
        }
    }

    h3 {
        text-align: center;
        text-shadow: 1px 1px 2px black;
        font-weight: bolder;
    }

    hr:after {
        display: inline-block;
        position: relative;
        top: -15px;
        padding: 0 10px;
        background: #f0f0f0;
        color: #8c8b8b;
        font-size: 18px;
    }

    hr.sub-hr {
        height: 30px;
        border-style: solid;
        border-color: #8c8b8b;
        border-width: 1px 0 0 0;
        border-radius: 20px;
    }

    hr.sub-hr:before {
        display: block;
        height: 30px;
        margin-top: -31px;
        border-style: solid;
        border-color: #8c8b8b;
        border-width: 0 0 1px 0;
        border-radius: 20px;
    }
    </style>
</head>

<body>
    <div id="app">
        <h1 style="">Room Booking API</h1>
        <hr>
        <div class="container">
            <all-rooms></all-rooms>
        </div>
    </div>
    <script src="{{ mix('js/app.js') }}" type="text/javascript"></script>
</body>

</html>