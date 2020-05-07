<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    
    <link rel="stylesheet" href="{{ asset("css/style.css") }}">
    <link rel="stylesheet" href="{{ asset("css/app.css") }}">
</head>

<body>

    <div id="app">
        @include('dashboard.partials.nav-top-dashboard')

        <div class="wrapper d-flex align-items-stretch">

            @include('dashboard.partials.nav-dashboard')

            <div class="container-fluid">
                <!-- Page Content  -->
                <div id="content" class="p-4 p-md-5 pt-5">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    
    <script src="{{ asset('js/app.js') }}"></script> 
</body>

</html>