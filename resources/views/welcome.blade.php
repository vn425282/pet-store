<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Springer Nature</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" crossorigin="anonymous">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
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
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            /* Float four columns side by side */
            .column {
                float: left;
                padding: 10px 10px;
            }

            /* Remove extra left and right margins, due to padding */
            .row {margin: 0 -5px;}

            /* Clear floats after the columns */
            .row:after {
                content: "";
                display: table;
                clear: both;
            }

            /* Responsive columns */
            @media screen and (max-width: 600px) {
                .column {
                    width: 100%;
                    display: block;
                    margin-bottom: 20px;
                }
            }

            /* Style the counter cards */
            .card {
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
                padding: 16px;
                text-align: center;
                background-color: #f1f1f1;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Hexagonal Architect Petstore
                </div>
                <div class="row">
                    <div class="column">
                        <div class="card">
                            <h3>Use cases</h3>
                            <p><a class="btn btn-primary" href="{{ route('get_occupancy_report') }}">Occupancy report</a></p>
                            <p><a class="btn btn-primary" href="{{ route('get_pet_by_status', [ 'petStatus' =>  0] ) }}">Show Pets in Showroom</a></p>
                        </div>
                    </div>

                    <div class="column">
                        <div class="card">
                            <h3>Shop Owner Actions</h3>
                            <form method="POST" action="{{ route('create_pet_auto' ) }}">
                                {{ csrf_field() }}
                                <button type="Submit" class="btn btn-primary">Buy new Cat</button>
                                <input type="hidden" class="form-control" name="type" value="0">
                                </form>
                            <br>
                            <form method="POST" action="{{ route('create_pet_auto' ) }}">
                                {{ csrf_field() }}
                                <button type="Submit" class="btn btn-primary">Buy new Dog</button>
                                <input type="hidden" class="form-control" name="type" value="1">
                            </form>
                            <br>
                            <form method="POST" action="{{ route('create_pet_auto' ) }}">
                                {{ csrf_field() }}
                                <button type="Submit" class="btn btn-primary">Buy new Bird</button>
                                <input type="hidden" class="form-control" name="type" value="2">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
