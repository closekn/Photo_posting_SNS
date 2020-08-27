<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Photo posting SNS</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- Bootstrap -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/5.1.1/bootstrap-social.css" rel="stylesheet">
        <!-- FontAwesome -->
        <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
        <!-- Service Styles -->
        <link href="/css/style.css" rel="stylesheet" type="text/css">
    </head>

    <body>
        <header>
            <nav>
                <ul>
                    <li><a href="/">Home</a></li>
                    @if (Auth::check())
                        <li>
                            <form action="/logout" method="post" name="logout">
                                {{ csrf_field() }}
                                <a href="javascript:logout.submit()">Logout</a>
                            </form>
                        </li>
                        <li><a href="/">Post</a></li>
                    @else
                        <li><a href="/login">Login</a></li>
                        <li><a href="/login">Post</a></li>
                    @endif
                    
                </ul>
            </nav>
        </header>
        @yield('content')
    </body>

</html>
