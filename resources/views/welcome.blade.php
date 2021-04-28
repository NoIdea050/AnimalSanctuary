<!doctype html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Aston Animal Sanctuary</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Karantina:wght@700&display=swap" rel="stylesheet">

    <style>
        html,
        body {
            background-color: rgb(243, 147, 103);
            color: #000000;
            font-family: 'Karantina', cursive;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 100px;
        }

        .mainLinks a {
            text-decoration: none;
            color: #000000;
            font-size: 30px;
            margin: 10px;
        }

        .m-b-md {
            margin-bottom: 25px;
        }

        a:hover {
            background-color: wheat;
            color: rgb(61, 57, 56);
        }

    </style>
</head>

<body>
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                Aston Animal Sanctuary
            </div>
            @if (Route::has('login'))
                <div class="mainLinks">
                    @auth
                        <a href="{{ url('home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

        </div>
    </div>
</body>

</html>
