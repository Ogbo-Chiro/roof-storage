<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
                background-image: radial-gradient(circle, #BDF9EC, #9FC6C0, #00101E);

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
                color:#4F6360;

            }
            .links{
                color:#333;
            }

            .links > a{
                color: #eee;
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
            .footer {
                  position: absolute;
                  bottom: 0;
                  width: 100%;
                  /* Set the fixed height of the footer here */
                  height: 60px;
                  line-height: 60px; /* Vertically center the text there */
                  background: rgba(0,0,0,0.3);
                  color: #fff;
                }
                .footer a{
                    text-decoration: none;
                    color: #fff;
                }
                .footer a:hover{
                    color:#9FC6C0;
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
                    Roof Storage
                </div>

                <div class="links">
                   <b>Closer than the cloud...</b>
                </div>
            </div>
        </div>

        <footer class="footer">
            <div class="container">
                <center>    
                    Icons made by <a href="https://www.flaticon.com/authors/freepik" title="Freepik">Freepik</a>, <a href="https://www.flaticon.com/authors/dimitry-miroliubov" title="Dimitry Miroliubov">Dimitry Miroliubov</a>,  <a href="https://www.flaticon.com/authors/smashicons" title="Smashicons">Smashicons</a>,  <a href="https://www.flaticon.com/authors/vitaly-gorbachev" title="Vitaly Gorbachev">Vitaly Gorbachev</a> from <a href="https://www.flaticon.com/"          title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/"          title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a>
                </center>
            </div>
        </footer>

    </body>
</html>
