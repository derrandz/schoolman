<!-- resources/views/auth/login.blade.php -->
<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="//fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
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
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">Login Page</div>
            </div>
            <div class="content">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <!-- resources/views/auth/login.blade.php -->
                <form method="POST" action="/auth/login">
                    {!! csrf_field() !!}

                    <div>
                        Email
                        <input type="email" name="email" value="{{ old('email') }}">
                    </div>

                    <div>
                        Password
                        <input type="password" name="password" id="password">
                    </div>

                    <div>
                        <input type="checkbox" name="remember"> Remember Me
                    </div>

                    <div>
                        <button type="submit">Login</button>
                    </div>
                </form>

            </div>
        </div>
    </body>
</html>


